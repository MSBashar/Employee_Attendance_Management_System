<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('welcome');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            "email" => 'required|max:255',
            "password" => 'required|min:3|max:20'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect()->route('admin');
            } else {
                return back()->with('error', 'Password not matches.');
            }
        } else {
            return back()->with('error', 'This email is not registered.');
        };
    }

    public function register()
    {
        return view('auth.register');
    }

    public function userRegister(Request $request)
    {
        $role = 'Employee';
        if (isset($request->role)) {
            $role = $request->role;
        }

        $request->validate([
            "first_name" => 'required|max:255',
            "last_name" => 'required|max:255',
            "email" => 'required|max:255|unique:users,email',
            "password" => 'required|min:3|max:20|confirmed'
        ]);

        $user = User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" =>  Hash::make($request->password),
            "email_verified_at" => now(),
            'remember_token' => Str::random(10),
            'role' => $role,
            'status' => 1,
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'You have registered successfuly');
        } else {
            return back()->with('error', 'Something wrong');
        };

    }
}
