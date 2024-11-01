<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login', [
            "title" => "Login Page"
        ]);
    }

    public function admin() {
        return view('admin.login', [
            "title" => "Login Page"
        ]);
    }

    public function login(Request $request) {
        $username = $request->f_username;
        $password = $request->f_password;

        if(Auth::guard('anggota')->attempt(['f_username' => $username,'password'=> $password])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error','Tidak berhasil login');
        }
    }

    public function loginAdmin(Request $request) {
        $username = $request->f_username;
        $password = $request->f_password;

        if(Auth::guard('admin')->attempt(['f_username' => $username,'password'=> $password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error','Tidak berhasil login');
        }
    }
}
