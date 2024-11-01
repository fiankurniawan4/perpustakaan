<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;
    protected $table = 't_detailpeminjamans';
    protected $primaryKey = 'f_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'f_iddetailbuku',
        'f_idpeminjaman',
        'f_tanggalkembali'
    ];

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'f_idpeminjaman', 'f_id');
    }

    public function buku() {
        return $this->belongsTo(DetailBuku::class, 'f_iddetailbuku', 'f_id');
    }
}
