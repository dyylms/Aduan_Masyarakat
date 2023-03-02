<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_masyarakat(){
        return view('auth.login_masyarakat');
    }

    public function handleLoginMasyarakat(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('masyarakat')->attempt(['username' => $request->username,'password' => $request->password ])){
            return redirect('masyarakat/dashboard');
        }else{
            return redirect()->back()->with('danger', 'Username atau Password Anda Salah');
        }
    }

    public function login_petugas()
    {
        return view('auth.login_petugas');
    }

    public function handleLoginPetugas(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::guard('petugas')->attempt(['username' => $request->username,'password' => $request->password])){
            return redirect('petugas/dashboard');
        }else{
            return redirect()->back()->with('danger', 'Username atau Password anda Salah');
        }
    }

    public function register_masyarakat(Request $request)
    {
        return view('auth.register_masyarakat');
    }

    public function handleRegisterMasyarakat(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:masyarakat',
            'nik' => 'required|size:16',
            'nama' => 'required',
            'password' => 'required',
            'password_confirmation' => 'same:password',
            'telp' => 'required|max:13'
        ]);
        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp
        ]);
        return redirect('masyarakat/login')->with('status', 'Registrasi berhasil, Siliahkan login');
    }

    public function logout_masyarakat()
    {
        Auth::guard('masyarakat')->logout();
        return redirect('/')->with('status', 'Logout Berhasil');
    }

    public function logout_petugas()
    {
        Auth::guard('petugas')->logout();
        return redirect('/')->with('status', 'Logout Berhasil');
    }
}
