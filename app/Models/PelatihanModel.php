<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PelatihanModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pelatihan';
    protected $table = 'pelatihan';
    public $timestamps = false;

    public $incrementing = true;

    public function klasifikasi(){
        return $this->belongsTo(KlasifikasiModel::class, 'id_klasifikasi');
    }

    protected $fillable = [
        'id_pelatihan',
        'id_pengguna',
        'id_klasifikasi',
        'id_sertifikat',
        'nama_pelatihan',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi_pelatihan',
        'klasifikasi_pelatihan',
        'jumlah_peserta',
        'nilai_minimum',
        'status',
    ];
}
