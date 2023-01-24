<?php

namespace App\Http\Controllers;

use App\Models\Wards;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Auth;
class WardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wards = Wards::where('hospital_id', Auth::id())->get();
        return view('wards.index' , compact('wards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wards.create');
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
            'beds' =>'required',
        ],
        [
          'beds.required'=>'الرجاء ادخال عدد الاسرة',
          'address.required'=>'العنوان مطلوب',
        ]
    );
        $id = IdGenerator::generate(['table' => 'wards', 'field' =>'ward_code', 'length' => 8, 'prefix' => 'WAR-']);
        $ward = Wards::create([
            'ward_code'=>$id,
            'address' =>$request->address,
            'beds' =>$request->beds,
            'hospital_id'=>Auth::id()
        ]);
        return redirect()->route('wards.index')->with('success','wards add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wards  $wards
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ward = Wards::find($id);
        return view('wards.show' , compact('ward'))->with('Wards', $ward);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wards  $wards
     * @return \Illuminate\Http\Response
     */
    public function edit(Wards $id)
    {
        $ward = Wards::find($id);
        return view('wards.modify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wards  $wards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ward = Wards::find($id);
        $ward->update($request->all());
        return redirect()->route('wards.index')->with('success','wards update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wards  $wards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wards $wards)
    {
        //
    }
    public function remove($id)
    {
        $ward = Wards::find($id);
        $ward->delete();
        return redirect()->route('wards.index')->with('success','ward delete Successfully');
    }
    public function modify($id)
    {
        $ward = Wards::find($id);
        return view('wards.modify' , compact('ward'));
    }
}
