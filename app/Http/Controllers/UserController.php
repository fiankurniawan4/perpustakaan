<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function index() {
        $anggota = Anggota::paginate(5);
        return view('admin.user.home', [
            'title' => "User",
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'false',
            'anggota' => 'active',
            'admin' => 'false',
            'anggotas' => $anggota,
            'kategoris' => 'false'
        ]);
    }

    public function tambahAnggota() {
        return view('admin.user.tambahanggota', [
            'title' => 'Tambah Anggota',
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'false',
            'anggota' => 'active',
            'admin' => 'false',
            'kategoris' => 'false'
        ]);
    }

    public function anggotaTambah(Request $request) {
        $validateData = $request->validate([
            'f_nama' => 'required',
            'f_username' => 'required|unique:t_anggotas,f_username',
            'f_password' => 'required'
        ]);
        Anggota::create($validateData);
        return redirect()->route('dashboardUser')->with('success', config('message.create_anggota'));
    }

    public function destroy($id) {
        $peminjaman = Peminjaman::where('f_idanggota', $id)->first();
        if ($peminjaman) {
            return redirect()->route('dashboardUser')->with('error', config('message.inpeminjaman_anggota'));
        }
        $anggota = Anggota::where('f_id', $id)->first();
        $anggota->delete();
        return redirect()->route('dashboardUser')->with('success', config('message.delete_anggota'));
    }

    public function edit($id) {
        $anggota = Anggota::where('f_id', $id)->first();
        return view('admin.user.editanggota', [
            'title' => 'Edit Anggota',
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'false',
            'anggota' => 'active',
            'admin' => 'false',
            'anggota' => $anggota
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'f_nama' => 'required',
            'f_username' => 'required|unique:t_anggotas,f_username,' . $id . ',f_id',
            'f_password' => 'required',
            'f_password_confirmation' => 'required|same:f_password'
        ]);
        $anggota = Anggota::where('f_id', $id)->first();
        $anggota->f_nama = $validateData['f_nama'];
        $anggota->f_username = $validateData['f_username'];
        $anggota->f_password = $validateData['f_password'];
        $anggota->save();
        return redirect()->route('dashboardUser')->with('success', config('message.edit_anggota'));
    }
}