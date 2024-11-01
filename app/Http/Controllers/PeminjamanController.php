<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailBuku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::paginate(5);
        return view('admin.peminjaman.home', [
            'title' => 'Peminjaman Buku',
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'active',
            'anggota' => 'false',
            'admin' => 'false',
            'peminjaman' => $peminjaman,
            'kategoris' => 'false',

        ]);
    }

    public function peminjamanTambah()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        $detail = DetailBuku::where('f_status', 'Tersedia')->get();
        return view('admin.peminjaman.tambah', [
            'title' => 'Peminjaman Buku',
            'home' => 'false',
            'book' => 'false',
            'pinjam' => 'active',
            'anggota' => 'false',
            'admin' => 'false',
            'anggotas' => $anggota,
            'buku' => $buku,
            'detail' => $detail,
            'kategoris' => 'false',

        ]);
    }

    public function pinjamBuku(Request $request)
    {
        if ($request->f_iddetailbuku == null) {
            return redirect()->back()->with('error', config('message.null_buku'));
        }
        if ($request->f_idanggota == null) {
            return redirect()->back()->with('error', config('message.null_anggota'));
        }
        $idbuku = $request->f_iddetailbuku;
        $idanggota = $request->f_idanggota;
        $tanggalpinjam = Carbon::now('Asia/Jakarta');
        $peminjaman = Peminjaman::create([
            'f_idadmin' => Auth::guard('admin')->user()->f_id,
            'f_idanggota' => $idanggota,
            'f_tanggalpeminjaman' => $tanggalpinjam,
        ]);
        $detail = new DetailPeminjaman();
        $detail->f_idpeminjaman = $peminjaman->f_id;
        $detail->f_iddetailbuku = $idbuku;
        $detail->save();
        return redirect()->route('peminjaman')->with('success', config('message.create_peminjaman'));
    }

    public function kembaliBuku($id)
    {
        $peminjaman = DetailPeminjaman::where('f_idpeminjaman', $id)->first();
        $peminjaman->f_tanggalkembali = Carbon::now('Asia/Jakarta');
        $peminjaman->save();
        $detail = DetailBuku::where('f_id', $peminjaman->f_iddetailbuku)->first();
        $detail->f_status = "Tersedia";
        $detail->save();
        return redirect()->route('peminjaman')->with('success', config('message.kembalikan_buku'));
    }

    public function deletePeminjaman($id)
    {
        $peminjaman = Peminjaman::where('f_id', $id)->first();
        $detail = DetailPeminjaman::where('f_idpeminjaman', $id)->first();
        $peminjaman->delete();
        $detail->delete();
        return redirect()->route('peminjaman')->with('success', config('message.delete_peminjaman'));
    }

    public function cetak_pdf()
    {
        $peminjaman = Peminjaman::all();

        $pdf = FacadePdf::loadview('admin.peminjaman.laporan', ['peminjaman' => $peminjaman]);
        return $pdf->download('peminjaman.pdf');
    }
}
