<?php

namespace App\Http\Controllers;

use App\Models\PelatihanModel;
use Illuminate\Http\Request;

class AstraLearnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('AstraLearn.index');
    }

    public function index2()
    {
        return view ('Login.index');
    }

    public function halaman_pelatih()
    {
        return view ('Halaman_Pelatih.index');
    }

    public function create()
    {
        //
        return view('pelatihan.create');
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
            'nilai_minimum.required' => 'The nilai minimum field is required.',
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
            'id_pelatihan' => 'required|int',
            'nama_pelatihan' => 'required|string',
            'deskripsi_pelatihan' => 'required|string',
            'klasifikasi_pelatihan' => 'required|string',
            'jumlah_peserta' => 'required|int',
            'nilai_minimum' => 'required|int',
        ], [
            'id_pelatihan.required' => 'The id pelatihan field is required.',
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