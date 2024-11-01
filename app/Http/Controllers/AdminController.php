<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $admin = Admin::paginate(5);
        return view('admin.admin.home', [
            'title' => "Admin Pustakawan",
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'false',
            'anggota' => 'false',
            'admin' => 'active',
            'admins' => $admin,
            'kategoris' => 'false',
        ]);

    }

    public function tambah()
    {

        return view('admin.admin.tambahadmin', [
            'title' => "Admin Pustakawan",
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'false',
            'anggota' => 'false',
            'admin' => 'active',
            'kategoris' => 'false',
        ]);
    }

    public function create(Request $request)
    {
        if ($request->f_level == null) {
            return redirect()->back()->with('error', config('message.select_role'));
        }
        $validateData = $request->validate([
            'f_nama' => 'required',
            'f_username' => 'required|unique:t_admins,f_username',
            'f_password' => 'required',
            'f_level' => 'required',
        ]);
        Admin::create($validateData);
        return redirect()->route('dashboardAdmin')->with('success', config('message.create_admin'));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::where('f_idadmin', $id)->first();
        if ($peminjaman) {
            return redirect()->route('dashboardAdmin')->with('error', config('message.inpeminjaman_admin'));
        }
        $admin = Admin::find($id);
        if (Auth::guard('admin')->user()->f_username == $admin->f_username) {
            return redirect()->route('dashboardAdmin')->with('error', config('message.delete_self'));
        }
        $admin->delete();
        return redirect()->back()->with('success', config('message.delete_admin'));
    }
}
