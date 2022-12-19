<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;

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
            $store->save();
            $insertedId = $store->id;
            $details=UserDetails::findOrFail($id);
            $details->user_id=$insertedId;
            $details->name = $request->userFullName;
            $details->email = $request->userEmailAddress;
            $details->address = $request->FullAddress;

            if ($details->save()) {
                // dd($store);
                return redirect('/')->with($this->resMessageHtml(true, false, 'User created successfully'));
                return redirect()->back();
            }


        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->with($this->responseMsg(false, 'error', 'Server error'));
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
