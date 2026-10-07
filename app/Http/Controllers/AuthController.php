<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller
{
    public function loginview()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials =$request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('students.index');
        }
                    return back()->withErrors([
                'email' => "Email or Password doesn't match"
            ]);
    }

    public function registerview()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $validatedRequest = $request->validate([
            'name'=>['required','string'],
            'email'=>['required','string','email','unique:users,email'],
            'password'=>['required','min:8','confirmed']
            
        ]);
        User::create([
            'name'=>$validatedRequest['name'],
            'email'=>$validatedRequest['email'],
            'password'=>$validatedRequest['password'],
            'role'=>'student'
        ]);
        

        return redirect()->route('login-view');
    }

    public function logoutPost(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect()->route('login-view');
    }
    
}
