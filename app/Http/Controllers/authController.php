<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function signin() {
        return view('auth.signin', [
            'title' => 'Sign In'
        ]);
    }

    public function signup() {
        return view('auth.signup', [
            'title' => 'Sign Up'
        ]);
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required|min:4|max:30|alpha_spaces',
            'username' => 'required|min:6|max:12|unique:users|alpha_num',
            'email' => 'nullable|email|unique:users',
            'number' => 'nullable|numeric|digits_between:11,12|unique:users',
            'password' => 'required|min:5|max:20'
        ]);

        $data['authorization'] = 3;
        $data['password'] = bcrypt($data['password']);
        $data['foto'] = 'foto-user/default.png';

        User::create($data);

        return redirect('/signin')->with('registrasiBerhasil', 'Registrasi Berhasil.');
    }

    public function auth() {

        $credentials = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {

            request()->session()->regenerate();

            return redirect()->intended('/')->with('loginBerhasil', 'Login berhasil.');
        }

        
        return back()->with('loginGagal', 'Login Gagal!');
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
