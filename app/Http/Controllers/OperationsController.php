<?php

namespace App\Http\Controllers;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Operations;
use Illuminate\Http\Request;
use Auth;
class OperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = Operations::where('hospital_id', Auth::id())->get();
        return view('operations.index' , compact('operations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operations.create');
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
        $id = IdGenerator::generate(['table' => 'operations', 'field' =>'operation_code', 'length' => 8, 'prefix' => 'OPE-']);
        $operation = Operations::create([
            'operation_code'=>$id,
            'address' =>$request->address,
            'beds' =>$request->beds,
            'hospital_id'=>Auth::id()

        ]);
        return redirect()->route('operations.index')->with('success','تمت الاضافة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operations  $operations
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation = Operations::find($id);
        return view('operations.show' , compact('operation'))->with('Operations', $operation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operations  $operations
     * @return \Illuminate\Http\Response
     */
    public function edit(Operations $operations)
    {
        $operation = Operations::find($id);
        return view('operations.modify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operations  $operations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $operation = Operations::find($id);
        $operation->update($request->all());
        return redirect()->route('operations.index')->with('succe','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operations  $operations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operations $operations)
    {
        //
    }
    public function remove($id)
    {
        $operation = Operations::find($id);
        $operation->delete();
        return redirect()->route('operations.index')->with('succes','تم الحذف بنجاح');

        
    }
    public function modify($id)
    {
        $operation = Operations::find($id);
        return view('operations.modify' , compact('operation'));
    }
}
