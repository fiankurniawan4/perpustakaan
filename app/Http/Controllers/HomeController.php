<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        }
        if(Auth::guard('anggota')->check()) {
            return redirect()->route('home');
        }
        $title = "Landing Page";
        return view('welcome', [
            'title' => $title
        ]);
    }

    public function home() {
        $title = "Home";
        $peminjaman = Peminjaman::where('f_idanggota', Auth::guard('anggota')->user()->f_id)->paginate(5);
        return view('home.home', [
            'title' => $title,
            'buku' => $peminjaman
        ]);
    }
}
