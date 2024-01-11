<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PenggunaModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pengguna';
    protected $table = 'pengguna';
    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'id_pengguna',
        'username',
        'nama_lengkap',
        'hak_akses',
    ];
}
