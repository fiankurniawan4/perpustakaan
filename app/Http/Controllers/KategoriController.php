<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::paginate(5);
        return view('admin.kategori.home', [
            'title' => 'Tambah Kategori',
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'false',
            'anggota' => 'false',
            'admin' => 'false',
            'kategori' => $kategori,
            'kategoris' => 'active',
        ]);
    }

    public function tambah()
    {
        return view('admin.kategori.tambahkategori', [
            'title' => 'Tambah Kategori',
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'false',
            'anggota' => 'false',
            'admin' => 'false',
            'kategoris' => 'active',
        ]);
    }

    public function tambahKategori(Request $request)
    {
        $validateData = $request->validate(
            [
                'f_kategori' => 'required|unique:t_kategoris,f_kategori',
            ]
        );
        $buku = Kategori::create($validateData);
        return redirect()->route('dashboardKategori')->with('success', config('message.create_kategori'));
    }

    public function destroy($id)
    {
        $buku = Buku::where('f_idkategori', $id)->first();
        if ($buku) {
            return redirect()->back()->with('error', config('message.buku_use'));
        }
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->back()->with('success', config('message.delete_kategori'));
    }
}
