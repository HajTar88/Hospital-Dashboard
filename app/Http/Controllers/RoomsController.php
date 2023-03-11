<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Auth;
class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Rooms::where('hospital_id', Auth::id())->get();
        return view('rooms.index' , compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' =>'required',
            'room_size' =>'required',
        ],
        [
          'room_size.required'=>'الرجاء ادخال عدد الاسرة',
          'address.required'=>'العنوان مطلوب',
        ]
    );
        $id = IdGenerator::generate(['table' => 'rooms', 'field' =>'room_code', 'length' => 8, 'prefix' => 'ROO-']);
        $room = Rooms::create([
            'room_code'=>$id,
            'address' =>$request->address,
            'room_size' =>$request->room_size,
            'hospital_id'=>Auth::id()
        ]);
        return redirect()->route('rooms.index')->with('success','تمت الاضافة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Rooms::find($id);
        return view('rooms.show' , compact('room'))->with('Rooms', $room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function edit(Rooms $id)
    {
        $room = Rooms::find($id);
        return view('rooms.modify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Rooms::find($id);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('succe','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rooms $rooms)
    {
        //
    }
    public function remove($id)
    {
        $room = Rooms::find($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('succes','تم الحذف بنجاح');

    }
    public function modify($id)
    {
        $room = Rooms::find($id);
        return view('rooms.modify' , compact('room'));
    }
}
