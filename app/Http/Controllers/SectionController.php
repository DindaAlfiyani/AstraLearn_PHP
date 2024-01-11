<?php

namespace App\Http\Controllers;

use App\Models\SectionModel;
use App\Models\PelatihanModel;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $section = SectionModel::all();
         return view ('section.index',['section' => $section]);
     }
    
    public function create($id)
    {
        // Misalnya, ambil id_pelatihan dari record pertama sebagai nilai default
        $data = PelatihanModel::findOrFail($id);
        $section = SectionModel::where('id_pelatihan', $id)->get();

        return view('section.create', ['pelatihan' => $data, 'section' => $section]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pelatihan' => 'required|int',
            'nama_section' => 'required',
            'video_pembelajaran' => 'required',
            'modul_pembelajaran' => 'required',
            'deskripsi_section' => 'required',
            'status' => 'required|int',
        ], [
            'id_pelatihan.required' => 'The nama section field is required.',
            'nama_section.required' => 'The nama section field is required.',
            'video_pembelajaran.required' => 'The video pembelajaran field is required.',
            'modul_pembelajaran.required' => 'The modul pembelajaran field is required.',
            'deskripsi_section.required' => 'The deskripsi section field is required.',
            'status.required' => 'The deskripsi section field is required.',
        ]);

        // Simpan file video
        //$videoPath = $request->file('video_pembelajaran')->store('videos', 'public');

        // Tambahkan path video ke dalam $validatedData
        //$validatedData['video_pembelajaran'] = $videoPath;

        // Simpan data ke dalam tabel "section"
        SectionModel::create($validatedData);

        $namaSection = $request->input('nama_section');

        return redirect()->route('section.index')->with('namaSection', $namaSection)->with('success', 'Section Data Created Successfully');
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
        echo 'show section , dengan parameter id =' .$id;
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
        $data = SectionModel::findOrFail($id);
        return view('section.edit',['section' => $data]);
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
            'nama_section' => 'required|string',
            'video_pembelajaran' => 'required',
            'modul_pembelajaran' => 'required|string',
            'deskripsi_section' => 'required|string',
            'status' => 'required|int',
        ], [
            'id_pelatihan.required' => 'The nama section field is required.',
            'nama_section.required' => 'The nama section field is required.',
            'video_pembelajaran.required' => 'The video pembelajaran field is required.',
            'modul_pembelajaran.required' => 'The modul pembelajaran field is required.',
            'deskripsi_section.required' => 'The deskripsi section field is required.',
            'status.required' => 'The deskripsi section field is required.',
        ]);

        // Simpan file video
        //$videoPath = $request->file('video_pembelajaran')->store('videos', 'public');

        // Tambahkan path video ke dalam $validatedData
        //$validatedData['video_pembelajaran'] = $videoPath;

        // Simpan data ke dalam tabel "section"
        SectionModel::create($validatedData);

        $namaSection = $request->input('nama_section');

        return redirect()->route('section.index')->with('namaSection', $namaSection)->with('success', 'Section Data Created Successfully');
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
        $data = SectionModel::findOrFail($id);

        $data->delete();
        
        return redirect()->route('section.index')->with('success', 'Section Deleted Successfully');
    }
}