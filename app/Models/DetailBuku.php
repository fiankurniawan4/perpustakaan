<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBuku extends Model
{
    use HasFactory;
    protected $table = 't_detailbukus';
    protected $primaryKey = 'f_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'f_status',
        'f_idbuku'
    ];

    public $timestamps = false;

    public function buku() {
        return $this->belongsTo(Buku::class, 'f_idbuku', 'f_id');
    }
}
