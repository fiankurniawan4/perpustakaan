<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\DetailBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::paginate(5);
        return view('admin.buku.buku', [
            'title' => 'Buku',
            'home' => 'false',
            'book' => 'active',
            'pinjam' => 'false',
            'anggota' => 'false',
            'admin' => 'false',
            'buku' => $buku,
            'kategoris' => 'false',
        ]);
    }

    public function tambah()
    {
        $kategori = Kategori::all();
        if ($kategori == null) {
            return redirect()->route('dashboardKategori')->with('error', config('message.null_kategori'));
        } else {
            return view('admin.buku.tambahbuku', [
                'title' => 'Tambah Buku',
                'kategori' => $kategori,
                'home' => 'false',
                'book' => 'active',
                'pinjam' => 'false',
                'anggota' => 'false',
                'admin' => 'false',
                'kategoris' => 'false',
            ]);
        }
    }

    public function tambahBuku(Request $request)
    {
        if ($request->f_idkategori == null) {
            return redirect()->route('tambah')->with('error', config('message.null_kategori'));
        }
        $validateData = $request->validate(
            [
                'f_judul' => 'required|unique:t_bukus,f_judul',
                'f_deskripsi' => 'required',
                'f_idkategori' => 'required',
                'f_penerbit' => 'required',
                'f_pengarang' => 'required',
            ]
        );
        $buku = Buku::create($validateData);
        $status = new DetailBuku();
        $status->f_idbuku = $buku->f_id;
        $status->f_status = "Tersedia";
        $status->save();
        return redirect()->route('dashboardBuku')->with('success', config('message.create_buku'));
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        return view('admin.buku.editbuku', [
            'title' => 'Edit Buku',
            'kategori' => $kategori,
            'home' => 'false',
            'book' => 'active',
            'pinjam' => 'false',
            'anggota' => 'false',
            'admin' => 'false',
            'buku' => $buku,
            'kategoris' => 'false',
        ]);
    }

    public function editBuku(Request $request, $id)
    {
        $detail = DetailBuku::where('f_idbuku', $id)->first();
        $peminjaman = DetailPeminjaman::where('f_iddetailbuku', $detail->f_id)->first();
        if($peminjaman) {
            return redirect()->route('dashboardBuku')->with('error', config('message.inpeminjaman_buku'));
        }
        $request->validate([
            'f_judul' => 'required|unique:t_bukus,f_judul',
            'f_deskripsi' => 'required',
            'f_idkategori' => 'required',
            'f_penerbit' => 'required',
            'f_pengarang' => 'required',
            'f_status' => 'required',
        ]);
        $buku = Buku::find($id);
        $buku->f_judul = $request->f_judul;
        $buku->f_deskripsi = $request->f_deskripsi;
        $buku->f_idkategori = $request->f_idkategori;
        $buku->f_penerbit = $request->f_penerbit;
        $buku->f_pengarang = $request->f_pengarang;
        $buku->save();
        $status = DetailBuku::where('f_idbuku', $id)->first();
        if (!$status) {
            $status = new DetailBuku();
            $status->f_idbuku = $id;
        }
        $status->f_status = $request->f_status;
        $status->save();
        return redirect()->route('dashboardBuku')->with('success', config('message.edit_buku'));
    }

    public function deleteBuku($id)
    {
        $peminjaman = DetailPeminjaman::where('f_iddetailbuku', $id)->first();
        if ($peminjaman) {
            return redirect()->route('dashboardBuku')->with('error', config('message.inpeminjaman_buku'));
        }
        Buku::where('f_id', $id)->delete();
        DetailBuku::where('f_idbuku', $id)->delete();
        return redirect()->route('dashboardBuku')->with('success', config('message.delete_buku'));
    }
}
