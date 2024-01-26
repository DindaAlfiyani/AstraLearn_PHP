<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SoalExerciseModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_detail';
    protected $table = 'soal_exercise';
    public $timestamps = false;

    public $incrementing = true;

    // Move the relationship method inside the model class
    public function section()
    {
        return $this->belongsTo(SectionModel::class, 'id_section');
    }
    protected $fillable = [
        'id_detail',
       'id_exercise',
       'id_section',
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