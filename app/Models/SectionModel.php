<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SectionModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_section';
    protected $table = 'section';
    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'id_section',
        'id_pelatihan',
        'nama_section',
        'video_pembelajaran',
        'modul_pembelajaran',
        'deskripsi_section',
        'status',
    ];

}
