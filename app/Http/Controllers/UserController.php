<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Hospital;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller 
{
    public function home()
    {
        return view('info');
    } 
 
    public function index()
    {
        return view('info');
    }
    //         public function login(Request $request)
    // {
    //     $request->validate([
    //         'hospital_name' => 'required',
    //         'password' => 'required',
    //     ]);
    
    //     $credentials = $request->only('hospital_name', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('db')
    //                     ->with('message', 'Signed in!');
    //     }
   
    //     return redirect('/login')->with('message', 'Login details are not valid!');
    // }  
    // public function login(Request $request)
    // {
    //     DB::transaction(function()  use ($request) {
    //         $request->validate([
    //             'hospital_name' => 'required',
    //             'password' => 'required',
    //     ]);
    //     $hospital_name = $request->hospital_name;
    //     $password = $request->password;
    //     // $hospital = Hospital::all('hospital_name','password');
    //     $aa = Hospital::select('hospital_name')->where('hospital_name', $hospital_name)->get();
    //     $bb = Hospital::select('password')->where('password', $password)->get();
    //     if ($aa == 'MTK' && $bb == '123456789' ) {
    //         return redirect('/register');
    //     }else {
    //         return redirect('/register');
    //     }
    //     });
    // }

    public function login(Request $request)
    {
        $request->validate([
            'hospital_name' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('hospital_name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('db')
                        ->with('message', 'Signed in!');
        }
   
        return redirect('/register')->with('message', 'Login details are not valid!');
    }
 
    public function signup()
    {
        return view('registration');
    }
       
    public function signupsave(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'hospital_name' => 'required|hospital_name|unique:users',
            'password' => 'required|min:6',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("db");
    }
 
    public function create(array $data)
    {
      return Hospital::create([
        'name' => $data['name'],
        'hospital_name' => $data['hospital_name'],
        'password' => Hash::make($data['password'])
      ]);
    }    
     
    public function info()
    {
        if(Auth::check()){
            return view('info');
        }
        return redirect('/login');
    }
     
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('login');
    }
}