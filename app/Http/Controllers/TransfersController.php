<?php

namespace App\Http\Controllers;

use App\Models\Transfers;
use App\Models\Transfersreq;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Hospital;
use Auth;
use DB;
class TransfersController extends Controller
{
    
    // public function getAutocompleteData(Request $request){
    //     if($request->has('term')){
    //         return Product::where('name','like','%'.$request->input('term').'%')->get();
    //     }
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfers::where('hospital_id', Auth::id())->get();
        return view('transfers.index' , compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transfer = Hospital::select('hospital_name')->get();
        $transfe = Patients::where('hospital_id', Auth::id())->get();
        return view('transfers.create',compact('transfer','transfe'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function()  use ($request) {
             $hospital_referred = $request->hospital_referred;
            // $patient_name = $request->patient_name;
             $ed = Hospital::where('hospital_name', $hospital_referred)->first()->id;
            // $ac = Patients::where('patient_name', $patient_name)->update(['hospital_id'=>$ed]);
            Transfers::create([
                'patient_code' => 10245,
                'patient_name' => $request-> patient_name,
                'address' =>$request->address,
                'case' =>$request->case,
                'diagnosis' =>$request->diagnosis,
                'current_hospital' =>$request->current_hospital,
                'reason' =>$request->reason,
                'hospital_referred' =>$request->hospital_referred,
                'hospital_id'=>Auth::id()
            ]);
            Transfersreq::create([
                'patient_code' => 10245,
                'patient_name' => $request-> patient_name,
                'address' =>$request->address,
                'case' =>$request->case,
                'diagnosis' =>$request->diagnosis,
                'current_hospital' =>$request->current_hospital,
                'reason' =>$request->reason,
                'hospital_referred' =>$request->hospital_referred,
                'hospital_id'=> $ed
            ]);
            // Patients::update([
            //     'hospital_id' => $ed,
            // ]);
        }
    );

        return redirect()->route('transfers.index')->with('success','تمت الاضافة بنجاح');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transfers  $transfers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transfer = Transfers::find($id);
        return view('transfers.show' , compact('transfer'))->with('Transfers', $transfer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transfers  $transfers
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfers $id)
    {
        $transfer = Transfers::find($id);
        return view('transfers.modify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transfers  $transfers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transfer = Transfers::find($id);
        $transfer->update($request->all());
        return redirect()->route('transfers.index')->with('succe','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transfers  $transfers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfers $transfers)
    {
        //
    }
    public function remove($id)
    {
        $transfer = Transfers::find($id);
        $transfer->delete();
        return redirect()->route('transfers.index')->with('succes','تم الحذف بنجاح');

    }
    public function modify($id)
    {
        $transfer = Transfers::find($id);
        return view('transfers.modify' , compact('transfer'));
    }

    public function tr()
    {
        $transfers = Transfers::latest()->paginate(4);
        return view('reports.transfersr' , compact('transfers'));
    }
    public function REQ()
    {
        $transfers = Transfersreq::where('hospital_id', Auth::id())->get();
        return view('transfers.Request' , compact('transfers'));   
    }

    public function search()
    {
      $search_text =$_GET['query'];
      $transfers = Transfers::where('patient_name','LIKE','%'.$search_text.'%')->get();
      return view('transfers.search',compact('transfers'));

    }
    public function acc(Request $request , $id )
    {
        DB::transaction(function()  use ($request ,$id) {
        $transfer = Transfersreq::find($id);
        $bb = Transfersreq::where('id', $id)->first()->patient_name;
        $aa = Transfersreq::where('id', $id)->first()->hospital_referred;
        $ed = Hospital::where('hospital_name', $aa)->first()->id;
        $ac = Patients::where('patient_name', $bb)->update(['hospital_id'=>$ed]);
        $dd = Transfers::where('status', 'قيد الانتظار')->update(['status'=>'تم قبول الطلب']);
        $transfer = Transfersreq::find($id);
        $transfer->delete();
       }
   );
       return redirect()->route('transfers.index')->with('success','تمت الاضافة بنجاح');
    }
    
    public function rej($id)
    {
        $dd = Transfers::where('status', 'قيد الانتظار')->update(['status'=>'تم رفض الطلب']);
        $transfer = Transfersreq::find($id);
        $transfer->delete();
        return redirect()->route('transfers.index')->with('success','تمت الاضافة بنجاح');
    }
}
