<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultExerciseModel extends Model
{
    use HasFactory;

    protected $table = 'result_exercise';
    protected $primaryKey = 'id_result';
    public $timestamps = true;

    public $incrementing = true;

    protected $fillable = [
        'id_result',
        'id_section',
        'nilai',
        'tanggal_ambil'
    ];
}
