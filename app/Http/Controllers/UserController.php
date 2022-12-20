<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\auth\LoginRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\auth\RegisterRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\UserDetails;

class UserController extends Controller
{
    use ResponseTrait;
    public function signUpForm(){
        $roles = Role::all();
        return view('auth.register',compact('roles'));
    }

    public function userRegistrationStore(RegisterRequest $request)
    {
        // dd($request);
        try {
            $store = new User();

            $store->name = $request->userFullName;
            $store->contact_no = $request->userPhoneNumber;
            $store->email = $request->userEmailAddress;
            $store->password =Crypt::encryptString( $request->userPassword);
            $store->role_id = $request->userRoles;
            $store->contact_no = $request->userPhoneNumber;
            $store->save();
            $insertedId = $store->id;
            $details=new UserDetails();
            $details->user_id=$insertedId;
            if ($details->save()) {
                // dd($store);
                return redirect('admin')->with($this->resMessageHtml(true, false, 'User created successfully'));
                return redirect()->back();
            }


        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->with($this->responseMsg(false, 'error', 'Server error'));
            return redirect()->back()->withInput();
        }
    }
    public function userLoginForm()
    {

        return view('auth.login');
    }

    public function userLoginCheck(LoginRequest $request)
    {
        // dd($request);
        try {
            $user = User::where('contact_no', $request->userPhoneNumber)->first();
            if ($user) {
                if ($request->userPassword === Crypt::decryptString($user->password)) {
                    $this->userSessionData($user);
                    return redirect()->route($user->role->identify . '.dashboard')->with($this->resMessageHtml(true, null, 'Successfully login'));
                } else
                    return redirect()->route('userlogin')->with($this->resMessageHtml(false, 'error', 'wrong cradential! Please try Again'));
            } else {
                return redirect()->route('userlogin')->with($this->resMessageHtml(false, 'error', 'wrong cradential!. Or no user found!'));
            }
        } catch (Exception $error) {
            dd($error);
            return redirect()->route('userlogin')->with($this->resMessageHtml(false, 'error', 'wrong cradential!'));
        }
    }
    public function userSessionData($user){
                // get secret text from env. 2nd value is the default value
                $secret = env('APP_SECRET','Our Hospital Ltd');
        return request()->session()->put(
                [
                    'userId'=>$user->id,
                    'userName'=>$user->name,
                    'roleID' =>$user->role->id,
                    'userPhoneNumber'=>$user->contact_no,
                    'userEmail'=>$user->email,
                    'role' => encrypt($user->role->role),
                    'roleIdentity'=>$user->role->identify,
                    'language'=>$user->language,
                    'image'=>$user->profile_pic?$user->profile_pic:'no-image.png'
                ]
            );
    }

    public function logOut()
    {
        // $userId = Crypt::decrypt(session()->get('userId'));
        request()->session()->flush();
        return redirect('/')->with($this->resMessageHtml(false,'error','Successfully Logout!'));
    }
}
