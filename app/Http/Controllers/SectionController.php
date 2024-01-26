<?php

namespace App\Http\Controllers;

use App\Models\PelatihanModel;
use App\Models\SectionModel;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
        $id_pelatihan = $request->input('id_pelatihan');
        $id_section = $request->input('id_section');

        $section = SectionModel::where('id_pelatihan', $id_pelatihan)->get();
        $video = SectionModel::where('id_section', $id_section)->get();
        return view('section.index', ['section' => $section, 'id_pelatihan' => $id_pelatihan, 'video' => $video]);
     }
    
    public function create(Request $request)
    {
        $id_pelatihan = $request->input('id_pelatihan'); 

        $id_section = SectionModel::where('id_pelatihan', $id_pelatihan)->first();
        if($id_section) {
        $section = SectionModel::where('id_section', $id_section)->get();
        $video = SectionModel::where('id_section', $id_section)->get();
        }else{
            $section = [];
            $video = [];
        }
        return view ('section.create',['section' => $section, 'id_pelatihan' => $id_pelatihan, 'video' => $video]);
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
            'deskripsi_section' => 'required|string',
            'status' => 'required|int',
        ], [
            'id_pelatihan.required' => 'The id pelatihan field is required.',
            'nama_section.required' => 'The nama section field is required.',
            'video_pembelajaran.required' => 'The video pembelajaran field is required.',
            'modul_pembelajaran.required' => 'The modul pembelajaran field is required.',
            'deskripsi_section.required' => 'The deskripsi section field is required.',
            'status.required' => 'The status field is required.',
        ]);

        $section = SectionModel::create($validatedData);

        if ($request->hasFile('video_pembelajaran')) {
        $request->file('video_pembelajaran')->move('upload/', $request->file('video_pembelajaran')->getClientOriginalName());
        $section->video_pembelajaran = $request->file('video_pembelajaran')->getClientOriginalName();
        $section->save();
        }
        
        if ($request->hasFile('modul_pembelajaran')) {
            $request->file('modul_pembelajaran')->move('upload/', $request->file('modul_pembelajaran')->getClientOriginalName());
            $section->modul_pembelajaran = $request->file('modul_pembelajaran')->getClientOriginalName();
            $section->save();
            }

        $id_pelatihan = $request->input('id_pelatihan');
        $id_section = $request->input('id_section');

        $section = SectionModel::where('id_pelatihan', $id_pelatihan)->get();
        $video = SectionModel::where('id_section', $id_section)->get();
        return view('section.index', ['section' => $section, 'id_pelatihan' => $id_pelatihan, 'video' => $video]);
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
        // Mengambil data section berdasarkan ID
        $section = SectionModel::find($id);
    
        // Mengambil data section terkait dengan pelatihan
        $sections = SectionModel::where('id_pelatihan', $section->id_pelatihan)->get();
    
        // Mengembalikan view edit beserta data section yang akan diedit dan yang terkait dengan pelatihan
        return view('section.edit', compact('section', 'sections'));
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
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama_section' => 'required|string',
            'video_pembelajaran' => 'required',
            'modul_pembelajaran' => 'required|string',
            'deskripsi_section' => 'required|string',
            'status' => 'required|int',
        ]);

        // Mengambil data section berdasarkan ID
        $section = SectionModel::findOrFail($id);

        // Mengupdate data section dengan data yang sudah divalidasi
        $section->update($validatedData);

        // Redirect kembali ke halaman index atau halaman lain yang sesuai
        return view('section.index', ['id_pelatihan' => $section->id_pelatihan])->with('success', 'Section data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $data = SectionModel::findOrFail($id);

        $data->delete();
        
        $id_pelatihan = $request->input('id_pelatihan');
        $id_section = $request->input('id_section');

        $section = SectionModel::where('id_pelatihan', $id_pelatihan)->get();
        $video = SectionModel::where('id_section', $id_section)->get();
        return view('section.index', ['section' => $section, 'id_pelatihan' => $id_pelatihan, 'video' => $video]);
    }
}
