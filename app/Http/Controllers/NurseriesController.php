<?php

namespace App\Http\Controllers;

use App\Models\Nurseries;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Auth;
class NurseriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nurseries = Nurseries::where('hospital_id', Auth::id())->get();
        return view('nurseries.index' , compact('nurseries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nurseries.create');

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
        $id = IdGenerator::generate(['table' => 'nurseries', 'field' =>'nurserie_code', 'length' => 8, 'prefix' => 'NUR-']);
        $nurserie = Nurseries::create([
            'nurserie_code'=>$id,
            'address' =>$request->address,
            'beds' =>$request->beds,
            'hospital_id'=>Auth::id()
        ]);
        return redirect()->route('nurseries.index')->with('success','تمت الاضافة بنجاح');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nurseries  $nurseries
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nurserie = Nurseries::find($id);
        return view('nurseries.show' , compact('nurserie'))->with('Nurseries', $nurserie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nurseries  $nurseries
     * @return \Illuminate\Http\Response
     */
    public function edit(Nurseries $id)
    {
        $nurserie = Nurseries::find($id);
        return view('nurseries.modify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nurseries  $nurseries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nurserie = Nurseries::find($id);
        $nurserie->update($request->all());
        return redirect()->route('nurseries.index')->with('succe','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nurseries  $nurseries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurseries $nurseries)
    {
        //
    }
    public function remove($id)
    {
        $nurserie = Nurseries::find($id);
        $nurserie->delete();
        return redirect()->route('nurseries.index')->with('succes','تم الحذف بنجاح');

    }
    public function modify($id)
    {
        $nurserie = Nurseries::find($id);
        return view('nurseries.modify' , compact('nurserie'));
    }
}
