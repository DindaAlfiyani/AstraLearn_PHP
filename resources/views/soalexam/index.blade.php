<!-- resources/views/soal_exercise/index.blade.php -->

@extends('layouts.customlayout4')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="pagetitle">
                <h1>Soal Exam</h1>
            </div>
            <br>
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body"><br>
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                                @endif
                                @forelse ($soal_exam as $item)
                                <div class="mb-4">
                                    <p><strong>Soal:</strong> {{ $item->soal }}</p>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $item->id_exam }}" id="pilgan1_{{ $item->id_exam }}"
                                            value="pilgan1">
                                        <label class="form-check-label"
                                            for="pilgan1_{{ $item->id_exam }}">{{ $item->pilgan1 }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $item->id_exam }}" id="pilgan2_{{ $item->id_exam }}"
                                            value="pilgan2">
                                        <label class="form-check-label"
                                            for="pilgan2_{{ $item->id_exam }}">{{ $item->pilgan2 }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $item->id_exam }}" id="pilgan3_{{ $item->id_exam }}"
                                            value="pilgan3">
                                        <label class="form-check-label"
                                            for="pilgan3_{{ $item->id_exam }}">{{ $item->id_exam }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $item->id_exam }}" id="pilgan4_{{ $item->id_exam }}"
                                            value="pilgan4">
                                        <label class="form-check-label"
                                            for="pilgan4_{{ $item->id_exam }}">{{ $item->pilgan4 }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $item->id_exam }}" id="pilgan5_{{ $item->id_exam }}"
                                            value="pilgan5">
                                        <label class="form-check-label"
                                            for="pilgan5_{{ $item->id_exam }}">{{ $item->pilgan5 }}</label>
                                    </div><br>
                                @empty
                                <p>No soal available</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
