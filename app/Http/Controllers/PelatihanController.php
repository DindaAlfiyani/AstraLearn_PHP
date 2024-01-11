<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiModel;
use App\Models\PelatihanModel;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $pelatihan = PelatihanModel::all();
         return view ('pelatihan.index',['pelatihan' => $pelatihan]);
     }
    
     public function create()
     {
         $klasifikasi = KlasifikasiModel::orderBy('nama_klasifikasi', 'asc')->pluck('nama_klasifikasi', 'id_klasifikasi');
         return view('pelatihan.create', ['klasifikasi' => $klasifikasi]);
     }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'id_klasifikasi' => 'required|int',
            'nama_pelatihan' => 'required|string',
            'deskripsi_pelatihan' => 'required|string',
            'nilai_minimum' => 'required|int',
            'status' => 'required|int',
        ], [
            'id_klasifikasi.required' => 'The nama pelatihan field is required.',
            'nama_pelatihan.required' => 'The nama pelatihan field is required.',
            'deskripsi_pelatihan.required' => 'The deskripsi pelatihan field is required.',
            'nilai_minimum.required' => 'The nilai minimum field is required.',
            'status.required' => 'The deskripsi section field is required.',
        ]);

        PelatihanModel::create($validatedData);

        return redirect()->route('pelatihan.index')->with('succes', 'Pelatihan Data Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo 'show pelatihan , dengan parameter id =' .$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = PelatihanModel::findOrFail($id);
        return view('pelatihan.edit',['pelatihan' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'nama_pelatihan' => 'required|string',
            'deskripsi_pelatihan' => 'required|string',
            'klasifikasi_pelatihan' => 'required|string',
            'jumlah_peserta' => 'required|int',
            'nilai_minimum' => 'required|int',
        ], [
            'nama_pelatihan.required' => 'The nama pelatihan field is required.',
            'deskripsi_pelatihan.required' => 'The deskripsi pelatihan field is required.',
            'klasifikasi_pelatihan.required' => 'The klasifiksi pelatihan field is required.',
            'jumlah_peserta.required' => 'The jumlah peserta field is required.',
            'nilai_minimum.required' => 'The jumlah peserta field is required.',
        ]);

        $data = PelatihanModel::findOrFail($id);

        $data->update($validatedData);

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = PelatihanModel::findOrFail($id);

        $data->delete();
        
        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan Deleted Successfully');
    }
}