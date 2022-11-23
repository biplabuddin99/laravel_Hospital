<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\RoomList;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomlist=RoomList::paginate(10);
        return view('roomlst.index',compact('roomlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bl = RoomCategory::all();
        return view('roomlst.create',compact('bl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $roomlist=new RoomList;
            $roomlist->room_category_id=$request->room_cat_name;
            $roomlist->room_no=$request->roomListNo;
            $roomlist->floor_no=$request->roomfloorNo;
            $roomlist->description=$request->rmdescripton;
            $roomlist->capacity=$request->Capacity;
            $roomlist->price=$request->roomPrice;
            $roomlist->status=$request->status;
            $roomlist->save();
            return redirect(route('roomList.index'));
        }catch(Exception $e){
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomList  $roomList
     * @return \Illuminate\Http\Response
     */
    public function show(RoomList $roomList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomList  $roomList
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomList $roomList)
    {
        $bl = RoomCategory::all();
        return view('roomlst.edit',compact(['roomList','bl']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomList  $roomList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomList $roomList)
    {
        try{
            $room=$roomList;
            $room->room_category_id=$request->room_cat_name;
            $room->room_no=$request->roomListNo;
            $room->floor_no=$request->roomfloorNo;
            $room->description=$request->rmdescripton;
            $room->capacity=$request->Capacity;
            $room->price=$request->roomPrice;
            $room->status=$request->status;
            $room->save();
            return redirect(route('roomList.index'));
        }catch(Exception $e){
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomList  $roomList
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomList $roomList)
    {
        $roomList->delete();
        return redirect()->back();
    }
}
