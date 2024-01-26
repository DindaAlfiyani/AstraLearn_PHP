<?php

namespace App\Http\Controllers;

use App\Models\SoalExamModel;
use Illuminate\Http\Request;

class SoalExamController extends Controller
{
    public function index(Request $request)
    {
        $id_pelatihan = $request->input('id_pelatihan'); 
        $soalexam = SoalExamModel::where('id_pelatihan', $id_pelatihan)->get();
        return view('soalexam.index', ['soal_exam' => $soalexam, 'id_pelatihan' => $id_pelatihan]);
    }

    public function create(Request $request)
    {
        $id_pelatihan = $request->input('id_pelatihan'); 
        $exam = SoalExamModel::where('id_pelatihan', $id_pelatihan)->first();
        return view('soalexam.create',['id_pelatihan' => $id_pelatihan, 'exam' => $exam]);
    }
   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'soal' => 'required|string',
            'id_pelatihan' => 'required|int',
            'pilgan1' => 'required|string',
            'pilgan2' => 'required|string',
            'pilgan3' => 'required|string',
            'pilgan4' => 'required|string',
            'pilgan5' => 'required|string',
            'kunci_jawaban' => 'required|string',
            'status' => 'required|int',
        ], [
            'soal.required' => 'The soal field is required.',
            'id_pelatihan.required' => 'The pilgan1 field is required.',
            'pilgan1.required' => 'The pilgan1 field is required.',
            'pilgan2.required' => 'The pilgan2 field is required.',
            'pilgan3.required' => 'The pilgan3 field is required.',
            'pilgan4.required' => 'The pilgan4 field is required.',
            'pilgan5.required' => 'The pilgan5 field is required.',
            'kunci_jawaban.required' => 'The kunci jawaban peserta field is required.',
            'status.required' => 'The kunci jawaban peserta field is required.',
        ]);

        SoalExamModel::create($validatedData);

        return redirect()->route('soalexam.index')->with('success', 'Soal Exam Data Created Successfully');
    }

    public function show($id)
    {
        echo 'show soal exam , dengan parameter id =' . $id;
    }

    public function edit($id)
    {
        $data = SoalExamModel::findOrFail($id);
        return view('soalexam.edit', ['soal_exam' => $data]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'soal' => 'required|string',
            'pilgan1' => 'required|string',
            'pilgan2' => 'required|string',
            'pilgan3' => 'required|string',
            'pilgan4' => 'required|string',
            'pilgan5' => 'required|string',
            'kunci_jawaban' => 'required|string',
            'status' => 'required|int',
        ], [
            'soal.required' => 'The soal field is required.',
            'pilgan1.required' => 'The pilgan1 field is required.',
            'pilgan2.required' => 'The pilgan2 field is required.',
            'pilgan3.required' => 'The pilgan3 field is required.',
            'pilgan4.required' => 'The pilgan4 field is required.',
            'pilgan5.required' => 'The pilgan5 field is required.',
            'kunci_jawaban.required' => 'The kunci jawaban peserta field is required.',
            'status.required' => 'The kunci jawaban peserta field is required.',
        ]);

        $data = SoalExamModel::findOrFail($id);

        $data->update($validatedData);

        return redirect()->route('soalexam.index')->with('update', 'Soal Exam Data Updated Successfully');
    }

    public function destroy($id)
    {
        $data = SoalExamModel::findOrFail($id);
        $data->delete();

        return redirect()->route('soalexam.index')->with('delete', 'Soal Exam Data Deleted Successfully');
    }
}
