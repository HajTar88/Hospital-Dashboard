<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $user = User::where('email',request('email'))->first();
        if (Hash::check(request('password'), $user->getAuthPassword())) {
            return [
                'token'=>$user->createToken(time())->plainTextToken
            ];
        }else{
            return 'false';
        }
    }
}
?>