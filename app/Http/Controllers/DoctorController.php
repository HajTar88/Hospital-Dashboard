<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Doctors;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $doctors = Doctors::where('hospital_id', Auth::id())->get();
        return view('doctors.index' , compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
            'doctor_name' => 'required|unique:doctors',
            'weekly_schedule' => 'required',
            'email' => 'required',
            'specialization' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'photo' =>'required',
        ],
        [
            'doctor_name' => 'اسم الطبيب مطلوب',
            'doctor_name.unique'=>'هذا الاسم موجود مسبقا',
            'weekly_schedule' => 'الجدول الاسبوعي مطلوب',
            'email' => 'الايميل مطلوب',
            'specialization' => 'الرجاء ادخال التخصص',
            'address' => 'ادخل العنوان',
            'phone' => 'الرجاء ادخال رقم الهاتف',
            'photo.required'=>'الصورة مطلوبة',
  
  
        ]
    );
   $photo = request('photo')->store('uploads/Doc', 'public');
    // $config = IdGenerator::generate(['table' => 'doctors', 'field' =>'doctor_name', 'length' => 8, 'prefix' => 'DOC-']);
        $data = $request->all();
        $check = $this->create($data);
        $doctor = Doctors::create([
            'doctor_name'=>$request->doctor_name,
            'weekly_schedule'=>$request->weekly_schedule,
            'email'=>$request->email,
            'specialization'=>$request->specialization,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'photo' =>$photo,
            'hospital_id'=>Auth::id(),
            'password' =>Hash::make($data['password'])
        ]);
        return redirect()->route('doctors.index')->with('success','تمت الاضافة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctors::find($id);
        return view('Doctors.show' , compact('doctor'))->with('Doctors', $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctors $doctors)
    {
        $doctor = Doctors::find($id);
        return view('doctors.modify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_name' => 'required',
            'weekly_schedule' => 'required',
            'email' => 'required',
            'specialization' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'photo' =>'required',
        ],
        [
            'doctor_name' => 'اسم الطبيب مطلوب',
            // 'doctor_name.unique'=>'هذا الاسم موجود مسبقا',
            'weekly_schedule' => 'الجدول الاسبوعي مطلوب',
            'email' => 'الايميل مطلوب',
            'specialization' => 'الرجاء ادخال التخصص',
            'address' => 'ادخل العنوان',
            'phone' => 'الرجاء ادخال رقم الهاتف',
            'photo.required'=>'الصورة مطلوبة',

            
        ]
    );
        $photo = request('photo')->store('uploads/Doc', 'public');
        $doctor = Doctors::find($id);
        $data = $request->all();
        $check = $this->create($data);
        $doctor->update([           
        'doctor_name'=>$request->doctor_name,
        'weekly_schedule'=>$request->weekly_schedule,
        'email'=>$request->email,
        'specialization'=>$request->specialization,
        'address'=>$request->address,
        'phone'=>$request->phone,
        'photo' =>$photo,
        'hospital_id'=>Auth::id(),
        'password' =>Hash::make($data['password'])] );
        return redirect()->route('doctors.index')->with('succe','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctors $doctors)
    {
       // $doctor->delete();
        //return redirect()->route('Doctors.index')->with('success','doctors delete Successfully');
    }
    public function remove($id)
    {
        $doctor = Doctors::find($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('succes','تم الحذف بنجاح');

    }
    public function modify($id)
    {
        $doctor = Doctors::find($id);
        return view('doctors.modify' , compact('doctor'));
    }
    public function dr()
    {
        $doctors = Doctors::latest()->paginate(4);
        return view('reports.doctorsr' , compact('doctors'));
    }
    
    public function search()
    {
      $search_text =$_GET['query'];
      $doctors = Doctors::where('doctor_name','LIKE','%'.$search_text.'%')->get();
      return view('doctors.search',compact('doctors'));

    }
}
?>