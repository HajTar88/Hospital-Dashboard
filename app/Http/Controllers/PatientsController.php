<?php

namespace App\Http\Controllers;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Patients;
use Illuminate\Http\Request;
use Hash;
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
        ]
    );
        // $id = IdGenerator::generate(['table' => 'patients', 'field' =>'patient_code', 'length' => 8, 'prefix' => 'PAT-']);
        $config = IdGenerator::generate(['table' => 'patients', 'field' =>'patient_code', 'length' => 8, 'prefix' => 'PAT-']);
        $data = $request->all();
        $check = $this->create($data);
        $patient = Patients::create([
            'patient_code' => $config,
            'patient_name' => $request-> patient_name,
            'address' =>$request->address,
            'case' =>$request->case,
            'diagnosis' =>$request->diagnosis,
            'hospital_id'=>Auth::id(),
        ]);
        return redirect()->route('patients.index')->with('success','تمت الاضافة بنجاح');

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
        return redirect()->route('patients.index')->with('succe','تم التعديل بنجاح');

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
        return redirect()->route('patients.index')->with('succes','تم الحذف بنجاح');

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
      $search_text =$_GET['query'];
      $patients = Patients::where('patient_name','LIKE','%'.$search_text.'%')->get();
      return view('patients.search',compact('patients'));

    }
    
}
?>