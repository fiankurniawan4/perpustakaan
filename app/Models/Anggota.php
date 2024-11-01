<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Anggota extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 't_anggotas';
    protected $primaryKey = 'f_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_nama', 'f_username', 'f_password', 'f_tempatlahir', 'f_tanggallahir',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'f_password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array
     */
    protected $casts = [
        'f_tanggallahir' => 'date',
        'f_password' => 'hashed',
    ];

    public function getAuthPassword()
    {
        return $this->f_password;
    }
}
