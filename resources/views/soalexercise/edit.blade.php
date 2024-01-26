@extends('layouts.customlayout1')
@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Data Exercise</h4>
    </div><br>
        <div class="card-body">
            <form method="POST" action="{{ route('soalexercise.update',$soal_exercise->id_exercise) }}">
                @csrf
                @method('PUT')
                    <div class="form-group">
                    <label for="Soal">Soal</label>
                    <input type="text" id="soal" name="soal" value="{{ old('soal',$soal_exercise->soal) }}" class="form-control"><br>
                    @error('soal')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pilgan1">Pilihan Ganda 1</label>
                    <input type="text" id="pilgan1" name="pilgan1" value="{{ old('pilgan1',$soal_exercise->pilgan1) }}" class="form-control">
                    @error('pilgan1')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label for="pilgan2">Pilihan Ganda 2</label>
                    <input type="text" id="pilgan2" name="pilgan2" value="{{ old('pilgan2',$soal_exercise->pilgan2) }}" class="form-control">
                    @error('pilgan2')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label for="pilgan3">Pilihan Ganda 3</label>
                    <input type="text" id="pilgan3" name="pilgan3" value="{{ old('pilgan3',$soal_exercise->pilgan3) }}" class="form-control">
                    @error('pilgan3')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label for="pilgan4">Pilihan Ganda 4</label>
                    <input type="text" id="pilgan4" name="pilgan4" value="{{ old('pilgan4',$soal_exercise->pilgan4) }}" class="form-control">
                    @error('pilgan4')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label for="pilgan5">Pilihan Ganda 5</label>
                    <input type="text"id="pilgan5" name="pilgan5" value="{{ old('pilgan5',$soal_exercise->pilgan5) }}" class="form-control">
                    @error('pilgan5')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label for="kunci_jawaban">Kunci Jawaban</label>
                    <input type="text" id="kunci_jawaban" name="kunci_jawaban" value="{{ old('kunci_jawaban',$soal_exercise->kunci_jawaban) }}" class="form-control">
                    @error('kunci_jawaban')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
    </div>
</div>

<!-- Script SweetAlert -->
@if(session('update'))
    <div class="alert alert-success">
        {{ session('update') }}
    </div>
@endif

@endsection