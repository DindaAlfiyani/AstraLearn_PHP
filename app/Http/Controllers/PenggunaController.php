<?php

namespace App\Http\Controllers;

use App\Models\PenggunaModel;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = PenggunaModel::all();
        return view('pengguna.index', ['pengguna' => $pengguna]);
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hak_akses' => 'required|string',
        ], [
            'hak_akses.required' => 'The hak akses field is required.',
        ]);

        PenggunaModel::create($validatedData);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna Data Created Successfully');
    }

    public function show($id)
    {
        echo 'show pengguna , dengan parameter id =' . $id;
    }

    public function edit($id)
    {
        $data = PenggunaModel::findOrFail($id);
        return view('pengguna.edit', ['pengguna' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = PenggunaModel::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pengguna.index')->with('update', 'Pengguna data Updated Successfully');
    }

    public function destroy($id)
    {
        $data = PenggunaModel::findOrFail($id);
        $data->delete();

        return redirect()->route('pengguna.index')->with('delete', 'Pengguna Deleted Successfully');
    }
}
