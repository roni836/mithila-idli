<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'isAdmin'=> 1,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            // Auth::login($user);
            return redirect('/')->with('success', 'Registration successful!');
        }
        else{
            return redirect('auth.login')->with('error', 'Unable to login. Please try again.');
        }
    }

    public function login(Request $req)
    {
        if ($req->isMethod("post")) {
            $credentials = $req->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
        
            if (Auth::attempt($credentials)) {
                $req->session()->regenerate();
        
                if (Auth::user()->isAdmin == 1) {
                    return redirect()->route('admin.manage.order');
                }
            }        
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successfully');
    }
}