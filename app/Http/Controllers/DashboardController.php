<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\DetailBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $title = "Dashboard";
        return view('admin.dashboard', [
            'title' => $title,
            'home' => 'active',
            'book' => 'false',
            'pinjam' => 'false',
            'anggota' => 'false',
            'admin' => 'false',
            'kategoris' => 'false'
        ]);
    }

}
