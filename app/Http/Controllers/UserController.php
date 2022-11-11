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

class UserController extends Controller
{
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
            $store->email = $request->userEmailAddress;
            $store->password =Crypt::encryptString( $request->userPassword);
            $store->role_id = $request->userRoles;
            $store->contact_no = $request->userPhoneNumber;

            if ($store->save()) {
                // dd($store);
                // return redirect('/')->with($this->resMessageHtml(true, false, 'User created successfully'));
                return redirect()->back();
            }
        } catch (Exception $e) {
            dd($e);
            // return redirect()->back()->with($this->responseMsg(false, 'error', 'Server error'));
            return redirect()->back()->withInput();
        }
    }
    public function userLoginForm()
    {

        return view('auth.login');
    }

    public function userLoginCheck(LoginRequest $request)
    {


        try {
            $user = User::where('email', $request->userEmailAddress)->first();
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
}
