<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SectionModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_exam';
    protected $table = 'soal_exam';
    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'id_exam',
        'id_pelatihan',
        'soal',
        'pilgan1',
        'pilgan2',
        'pilgan3',
        'pilgan4',
        'pilgan5',
        'kunci_jawaban',
        'status',
    ];

}
