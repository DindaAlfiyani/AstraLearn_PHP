<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //mereturn kata hello world
    function index (){
        return "Hello World";
    }

    // menampilkan view
    function index2 (){
        return view ("hello");
    }

    // menampilkan data
    function data (){
        $data = [
            'nama' => 'Dinda',
            'umur' => 21,
            'pekerjaan' => 'Mahasiswa',
            // tambahkan data lain sesuai kebutuhan
        ];
        return $data;
    }
}
