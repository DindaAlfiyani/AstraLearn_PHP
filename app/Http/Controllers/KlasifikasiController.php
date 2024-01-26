<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiModel;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $klasifikasi = KlasifikasiModel::all();
         return view ('klasifikasi_pelatihan.index',['klasifikasi_pelatihan' => $klasifikasi]);
     }
    
    public function create()
    {
        //
        return view('klasifikasi_pelatihan.create');
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
            'nama_klasifikasi' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|int',
        ], [
            'nama_klasifikasi.required' => 'The nama klasifikasi field is required.',
            'deskripsi.required' => 'The deskripsi klasifikasi field is required.',
            'status.required' => 'The status field is required.',
        ]);

        KlasifikasiModel::create($validatedData);

        return redirect()->route('klasifikasi.index')->with('success', 'Data berhasil ditambahkan.');


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
        echo 'show klasifikasi , dengan klasifikasi id =' .$id;
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
        $data = KlasifikasiModel::findOrFail($id);
        return view('klasifikasi_pelatihan.edit',['klasifikasi_pelatihan' => $data]);
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
            'nama_klasifikasi' => 'required|string',
            'deskripsi' => 'required|string',
        ], [
            'nama_klasifikasi.required' => 'The nama klasifikasi field is required.',
            'deskripsi.required' => 'The deskripsi klasifikasi field is required.',
        ]);


        $data = KlasifikasiModel::findOrFail($id);

        $data->update($validatedData);

        return redirect()->route('klasifikasi.index')->with('update', 'Klasifikasi data Updated Successfully');
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
        $data = KlasifikasiModel::findOrFail($id);

        $data->delete();
        
        return redirect()->route('klasifikasi.index')->with('delete', 'Klasifikasi Deleted Successfully');
    }
}