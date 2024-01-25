<?php

namespace App\Http\Controllers;

use App\Models\DetailSoalExerciseModel;
use App\Models\SoalExerciseModel;
use App\Models\ResultExerciseModel;
use Illuminate\Support\Str;

use App\Models\SectionModel;
use Illuminate\Http\Request;

class SoalExerciseController extends Controller
{

    public function index()
    {
        $idsection = 1; // Ganti dengan idsection yang diinginkan
        $soalexercise = SoalExerciseModel::with('section')->where('id_section', $idsection)->get();

        return view('soalexercise.index', ['soal_exercise' => $soalexercise]);
    }


    public function create()
    {
        return view('soalexercise.create');
    }

    public function store(Request $request)
    {
        //dd($request);
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

        SoalExerciseModel::create($validatedData);
           
        return redirect()->route('soalexercise.index')->with('success', 'Soal Exercise Data Created Successfully');
    }

    public function submit(Request $request)
    {
        // Retrieve submitted answers
        $submittedAnswers = $request->input('jawaban_id');

        $nilai = 0;
        $id_result = Str::random(10);
        $id_section = $request->id_section;
        $tanggal_ambil = now();

        ResultExerciseModel::create([
            "id_result" => $id_result,
            "id_section" => $id_section,
            "nilai" => 0,
            "tanggal_ambil" => $tanggal_ambil
        ]);

        foreach ($submittedAnswers as $questionId => $answer) {
            // Assuming $questionId is the question ID and $answer is the submitted answer
            $correct_answer = SoalExerciseModel::where("id_exercise", $questionId)->first();
            $is_correct = 0;
            if($correct_answer->kunci_jawaban == $answer) {
                $nilai = $nilai+10;
                $is_correct = 1;
            }

            DetailSoalExerciseModel::create([
                "id_exercise" => $questionId,
                "id_pengguna" => 1,
                "id_result" => $id_result,
                "jawaban" => $answer,
                "nilai" => $is_correct,
                "status" => null
            ]);
        }

        ResultExerciseModel::where("id_result", $id_result)->update([
            "nilai" => $nilai
        ]);
    
        // Add any additional logic you need after processing the answers
    
        // For example, you might redirect the user to a result page
        return redirect()->route('soalexercise.index');
    }
    


    public function show($id)
    {
        echo 'show soal exercise , dengan parameter id =' . $id;
    }

    public function edit($id)
    {
        $data = SoalExerciseModel::findOrFail($id);
        return view('soalexercise.edit', ['soal_exercise' => $data]);
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

        $data = SoalExerciseModel::findOrFail($id);

        $data->update($validatedData);

        return redirect()->route('soalexercise.index')->with('success', 'Soal Exercise Data Updated Successfully');
    }

    public function destroy($id)
    {
        $data = SoalExerciseModel::findOrFail($id);
        $data->delete();

        return redirect()->route('soalexercise.index')->with('success', 'Soal Exercise Data Deleted Successfully');
    }
}
