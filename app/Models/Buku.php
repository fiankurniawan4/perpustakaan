<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 't_bukus';
    protected $primaryKey = 'f_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'f_judul',
        'f_pengarang',
        'f_penerbit',
        'f_idkategori',
        'f_deskripsi'
    ];

    public function details() {
        return $this->hasOne(DetailBuku::class, 'f_idbuku', 'f_id');
    }
}
