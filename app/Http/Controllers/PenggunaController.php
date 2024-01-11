<?php

namespace App\Http\Controllers;

use App\Models\PenggunaModel;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $pengguna = PenggunaModel::all();
         return view ('pengguna.index',['pengguna' => $pengguna]);
     }
    
    public function create()
    {
        //
        return view('pengguna.create');
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
            'username' => 'required|string',
            'nama_lengkap' => 'required|string',
            'hak_akses' => 'required|string',
        ], [
            'username.required' => 'The usernmae field is required.',
            'nama_lengkap.required' => 'The nama lengkap field is required.',
            'hak_akses.required' => 'The hak akses field is required.',
        ]);

        PenggunaModel::create($validatedData);

        return redirect()->route('pengguna.index')->with('succes', 'Pengguna Data Created Successfully');

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
        echo 'show pengguna , dengan parameter id =' .$id;
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
        $data = PenggunaModel::findOrFail($id);
        return view('pengguna.edit',['pengguna' => $data]);
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
            'username' => 'required|string',
            'nama_lengkap' => 'required|string',
            'hak_akses' => 'required|string',
        ], [
            'username.required' => 'The usernmae field is required.',
            'nama_lengkap.required' => 'The nama lengkap field is required.',
            'hak_akses.required' => 'The hak akses field is required.',
        ]);

        $data = PenggunaModel::findOrFail($id);

        $data->update($validatedData);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna data Updated Successfully');
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
        $data = PenggunaModel::findOrFail($id);

        $data->delete();
        
        return redirect()->route('pengguna.index')->with('success', 'Pengguna Deleted Successfully');
    }
}