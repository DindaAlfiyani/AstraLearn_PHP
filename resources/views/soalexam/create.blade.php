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
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Soal Exam</h4>
                    </div><br>
                    <div class="card-body">
                    <form method="POST" action="{{ route('soalexam.store') }}">
                @csrf
                <!-- Tambahkan input tersembunyi untuk status di sini -->
                <input type="hidden" name="status" value="1">
                
                <div class="form-group">
                    <label for="soal">Soal</label>
                    <input type="text" id="soal" name="soal" value="{{ old('soal') }}" class="form-control"><br>
                    @error('soal')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pilgan1">Pilihan Ganda 1</label>
                    <input type="text" id="pilgan1" name="pilgan1" value="{{ old('pilgan1') }}" class="form-control">
                    @error('pilgan1')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pilgan2">Pilihan Ganda 2</label>
                    <input type="text" id="pilgan2" name="pilgan2" value="{{ old('pilgan2') }}" class="form-control"><br>
                    @error('pilgan2')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pilgan3">Pilihan Ganda 3</label>
                    <input type="text" id="pilgan3" name="pilgan3" value="{{ old('pilgan3') }}" class="form-control"><br>
                    @error('pilgan3')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pilgan4">Pilihan Ganda 4</label>
                    <input type="text" id="pilgan4" name="pilgan4" value="{{ old('pilgan4') }}" class="form-control"><br>
                    @error('pilgan4')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pilgan5">Pilihan Ganda 5</label>
                    <input type="text" id="pilgan5" name="pilgan5" value="{{ old('pilgan5') }}" class="form-control"><br>
                    @error('pilgan5')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="kunci_jawaban">Kunci Jawaban</label>
                    <select id="kunci_jawaban" name="kunci_jawaban" class="form-control">
                         <option value="" selected disabled>Pilih Jawaban</option>
                         <option value="pilgan1" {{ old('kunci_jawaban') == 'pilgan1' ? 'selected' : '' }}>Pilihan 1</option>
                         <option value="pilgan2" {{ old('kunci_jawaban') == 'pilgan2' ? 'selected' : '' }}>Pilihan 2</option>
                         <option value="pilgan3" {{ old('kunci_jawaban') == 'pilgan3' ? 'selected' : '' }}>Pilihan 3</option>
                         <option value="pilgan4" {{ old('kunci_jawaban') == 'pilgan4' ? 'selected' : '' }}>Pilihan 4</option>
                         <option value="pilgan5" {{ old('kunci_jawaban') == 'pilgan5' ? 'selected' : '' }}>Pilihan 5</option>
                    </select>
                    @error('kunci_jawaban')
                    <span class="text-danger">{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-group">
                <!-- Input hidden untuk status dengan nilai 1 -->
                    <input type="hidden" id="status" name="status" value="1">
                </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection