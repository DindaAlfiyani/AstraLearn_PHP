<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiModel;
use App\Models\PelatihanModel;
use Illuminate\Http\Request;

class MengikutiPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $pelatihan = PelatihanModel::all();
        $klasifikasi = KlasifikasiModel::orderBy('nama_klasifikasi', 'asc')->pluck('nama_klasifikasi', 'id_klasifikasi');
         return view ('mengikuti_pelatihan.index',['pelatihan' => $pelatihan, 'klasifikasi' => $klasifikasi]);
     }
}