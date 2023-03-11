<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Hospital;
use Illuminate\Support\Facades\Auth;
 
class UserController extends Controller 
{
    public function home()
    {
        return view('homepage');
    } 
 
    public function index()
    {
        return view('login');
    }  
       
    public function login(Request $request)
    {
        $request->validate([
            'hospital_code' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('hospital_code', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('db')
                        ->with('message', 'Signed in!');
        }
   
        return redirect('/login')->with('message', 'Login details are not valid!');
    }
 
    public function signup()
    {
        return view('registration');
    }
       
    public function signupsave(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'hospital_code' => 'required|unique:users',
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
        'hospital_name' => $data['hospital_code'],
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
?>