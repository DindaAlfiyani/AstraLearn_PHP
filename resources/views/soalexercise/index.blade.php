<!-- resources/views/soal_exercise/index.blade.php -->

@extends('layouts.customlayout1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="pagetitle">
                <h1>Soal Exercise</h1>
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
                                <form method="POST" action="{{ route('soalexercise.submit') }}">
                                @csrf
                                <input type="text" name="id_section" value="1" />
                                @forelse ($soal_exercise as $item)
                                <div class="mb-4">
                                    <p><strong>Soal: </strong> {{ $item->soal }}</p>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban_id[{{ $item->id_exercise }}]" id="pilgan1_{{ $item->id_exercise }}" value="pilgan1">
                                        <label class="form-check-label" for="pilgan1_{{ $item->id_exercise }}">{{ $item->pilgan1 }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban_id[{{ $item->id_exercise }}]" id="pilgan2_{{ $item->id_exercise }}" value="pilgan2">
                                        <label class="form-check-label" for="pilgan2_{{ $item->id_exercise }}">{{ $item->pilgan2 }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban_id[{{ $item->id_exercise }}]" id="pilgan3_{{ $item->id_exercise }}" value="pilgan3">
                                        <label class="form-check-label" for="pilgan3_{{ $item->id_exercise }}">{{ $item->pilgan3 }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban_id[{{ $item->id_exercise }}]" id="pilgan4_{{ $item->id_exercise }}" value="pilgan4">
                                        <label class="form-check-label" for="pilgan4_{{ $item->id_exercise }}">{{ $item->pilgan4 }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban_id[{{ $item->id_exercise }}]" id="pilgan5_{{ $item->id_exercise }}" value="pilgan2">
                                        <label class="form-check-label" for="pilgan5_{{ $item->id_exercise }}">{{ $item->pilgan5 }}</label>
                                    </div>
                                    <br>
                                @empty
                                <p>No soal available</p>
                                @endforelse
                                <button type="submit" class="btn btn-primary">Submit Answers</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

