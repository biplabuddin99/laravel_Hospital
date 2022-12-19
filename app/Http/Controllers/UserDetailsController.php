<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Blood;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details=UserDetails::findOrFail($id);
        return view('user.show',compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blood=Blood::all();
        $useredit=UserDetails::findOrFail($id);
        return view('user.edit',compact('useredit','blood'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $store =User::findOrFail($id);
            $store->name = $request->FullName;
            $store->email = $request->userEmailAddress;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/useredit'), $imageName);
                $store->profile_pic=$imageName;
            }
            $store->save();
            $insertedId = $store->id;
            $details=UserDetails::findOrFail($id);
            $details->user_id=$insertedId;
            $details->name = $request->FullName;
            $details->email = $request->userEmailAddress;
            $details->address = $request->FullAddress;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/useredit'), $imageName);
                $details->picture=$imageName;
            }
            $details->birth_date = $request->birthdate;
            $details->gender = $request->gender;
            $details->blood_id = $request->blood;
            $details->status = $request->status;

            if ($details->save()) {
                // dd($store);
                Toastr::success('Profile Updated Successfully!');
                return redirect()->back();
            }

        } catch (Exception $error) {
            dd($error);
            // return redirect()->back()->with($this->responseMsg(false, 'error', 'Server error'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetails $userDetails)
    {
        //
    }
}
