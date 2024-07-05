<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' =>'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->passes()) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Email atau Password salah!');
            }
        } else {
            return redirect()->route('login')->withInput()->withErrors($validator);
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function proccessRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Horay! Pendaftaran akun berhasil!');
        } else {
            return redirect()->route('register')->withInput()->withErrors($validator);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil keluar!');
    }
}
