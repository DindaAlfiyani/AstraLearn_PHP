<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SoalExamModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_exam';
    protected $table = 'soal_exam';
    public $timestamps = false;
    public $incrementing = true;

    public function pelatihan()
    {
        return $this->belongsTo(PelatihanModel::class, 'id_pelatihan');
    }

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

     // Definisi relasi belongsTo dengan tabel section
     //public function section()
     //{
      //  return $this->belongsTo(SoalExerciseModel::class, 'id_section', 'id_section');
     //} 
}