<?php

namespace App\Http\Controllers;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Patients;
use Illuminate\Http\Request;
use Auth;
class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::where('hospital_id', Auth::id())->get();
        return view('patients.index' , compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
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
            'password' => 'required|confirmed|min:6',
            'patient_name' =>'required|max:255',
            'address' =>'required',
            'case' =>'required',
            'diagnosis' =>'required',
        ],
        [
          'patient_name.required'=>'اسم المستشفي مطلوب',
          'address.required'=>'العنوان مطلوب',
          'phone.required'=>'رقم الهاتف مطلوب',
          'password.required'=>'الرجاء ادخال كلمة السر',
          'password.min'=>' كلمة السر قصيرة جدا',
          'password.confirmed'=>' كلمة السر غير متطابقة',
        ]
    );
        $id = IdGenerator::generate(['table' => 'patients', 'field' =>'patient_code', 'length' => 8, 'prefix' => 'PAT-']);
        $patient = Patients::create([
            'patient_code' => $id,
            'patient_name' => $request-> patient_name,
            'address' =>$request->address,
            'case' =>$request->case,
            'diagnosis' =>$request->diagnosis,
            'hospital_id'=>Auth::id(),
            'password' => bcrypt('password')   
        ]);
        return redirect()->route('patients.index')->with('success','patients add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patients::find($id);
        return view('patients.show' , compact('patient'))->with('Patients', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patients $patients)
    {
        $patient = Patients::find($id);
        return view('patients.modify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patients::find($id);
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success','patients update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patients $patients)
    {
        $patients->delete();
        return redirect()->route('Patients.index')->with('success','patients delete Successfully');
    }
    public function remove($id)
    {
        $patient = Patients::find($id);
        $patient->delete();
        return redirect()->route('patients.index')->with('success','patients delete Successfully');
    }
    public function modify($id)
    {
        $patient = Patients::find($id);
        return view('patients.modify' , compact('patient'));
    }

    public function pr()
    {
        $patients = Patients::latest()->paginate(4);
        return view('reports.patientsr' , compact('patients'));
    }

    public function search()
    {
      $search_text =$_GET['search'];
      $patients = Patients::where('patient_code','LIKE','%'.$search_text.'%')->get();
      return view('patients.search',compact('patient'));

    }
    
}
