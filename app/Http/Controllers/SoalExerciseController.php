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
        $id_result = Str::random(10);

        $correctCount = 0; // Initialize correct count

        // Calculate correct count
        foreach ($submittedAnswers as $questionId => $answer) {
            $correct_answer = SoalExerciseModel::where("id_exercise", $questionId)->value('kunci_jawaban');
            if ($correct_answer == $answer) {
                $correctCount++;
            }

            // Create DetailSoalExerciseModel record
            DetailSoalExerciseModel::create([
                "id_exercise" => $questionId,
                "id_pengguna" => 1,
                "id_result" => $id_result,
                "jawaban" => $answer,
                "nilai" => ($correct_answer == $answer) ? 1 : 0,
                "status" => 1
            ]);
        }

        // Calculate total questions
        $totalQuestions = count($submittedAnswers);

        // Calculate percentage score
        $percentageScore = ($correctCount / $totalQuestions) * 100;

        // Generate random id_result
        $id_result = Str::random(10);
        $id_section = $request->id_section;
        $tanggal_ambil = now();

        // Check if a record with the same id_result already exists
        $existingResult = ResultExerciseModel::where('id_result', $id_result)->first();

        if (!$existingResult) {
            ResultExerciseModel::create([
                "id_result" => $id_result,
                "id_section" => $id_section,
                "nilai" => $percentageScore,
                "tanggal_ambil" => $tanggal_ambil
            ]);
        }

        // Redirect to the result page
        return redirect()->route('soalexercise.result', ['id_result' => $id_result]);
    }

        
        public function showResult($id_result)
        {
            // Retrieve the result based on the given id_result
            $result = ResultExerciseModel::where('id_result', $id_result)->first();

            // Check if the result exists
            if (!$result) {
                abort(404); // Result not found, return 404 page
            }
            $nilai = $result->nilai;

            // Pass the result data to the view
            return view('soalexercise.result', compact('result', 'nilai'));
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

        return redirect()->route('soalexercise.index')->with('update', 'Soal Exercise Data Updated Successfully');
    }

    public function destroy($id)
    {
        $data = SoalExerciseModel::findOrFail($id);
        $data->delete();

        return redirect()->route('soalexercise.index')->with('delete', 'Soal Exercise Data Deleted Successfully');
    }
}
