<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DetailSoalExerciseModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_exercise';
    protected $table = 'detail_exercise';
    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id_exercise',
        'id_pengguna',
        'id_result',
        'jawaban',
        'nilai',
        'status',
    ];
}