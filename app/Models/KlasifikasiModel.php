<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KlasifikasiModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_klasifikasi';
    protected $table = 'klasifikasi_pelatihan';
    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'id_klasifikasi',
        'nama_klasifikasi',
        'deskripsi',
        'status',
    ];
}
