<?php

namespace App\Http\Controllers;

use App\Models\Cares;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Auth;
class CaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cares = Cares::where('hospital_id', Auth::id())->get();
        return view('cares.index' , compact('cares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cares.create');
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
        $id = IdGenerator::generate(['table' => 'cares', 'field' =>'care_code', 'length' => 8, 'prefix' => 'CAR-']);
        $care = Cares::create([
            'care_code'=>$id,
            'address' =>$request->address,
            'beds' =>$request->beds,
            'hospital_id'=>Auth::id()
        ]);
        return redirect()->route('cares.index')->with('success','cares add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cares  $cares
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $care = Cares::find($id);
        return view('cares.show' , compact('care'))->with('Cares', $care);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cares  $cares
     * @return \Illuminate\Http\Response
     */
    public function edit(Cares $cares)
    {
        $care = Cares::find($id);
        return view('cares.modify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cares  $cares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $care = Cares::find($id);
        $care->update($request->all());
        return redirect()->route('cares.index')->with('success','cares update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cares  $cares
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cares $cares)
    {
        //
    }
    public function remove($id)
    {
        $care = Cares::find($id);
        $care->delete();
        return redirect()->route('cares.index')->with('success','cares delete Successfully');
    }
    public function modify($id)
    {
        $care = Cares::find($id);
        return view('cares.modify' , compact('care'));
    }
}
