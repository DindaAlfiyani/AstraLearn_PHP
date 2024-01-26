@extends('layouts.customlayout2')
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
                        <h4 class="card-title">Tambah Data Section</h4>
                    </div><br>
                    <div class="card-body">
                <form method="POST" action="{{ route('section.store') }}" enctype="multipart/form-data">
                 @csrf
                <div class="form-group">
                    <input type="hidden" id="id_pelatihan" name="id_pelatihan" value="{{ request('id_pelatihan') }}">
                </div>

                <div class="form-group">
                    <label for="nama_section">Nama Section</label> 
                    <input type="text" id="nama_section" name="nama_section" value="{{ old('nama_section') }}" class="form-control"><br>
                    @error('nama_section')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="video_pembelajaran">Video Pembelajaran</label>
                    <input type="file" id="video_pembelajaran" name="video_pembelajaran" value="{{ old('video_pembelajaran') }}" class="form-control"><br>
                    @error('video_pembelajaran')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="modul_pembelajaran">Modul Pembelajaran</label>
                    <input type="file" id="modul_pembelajaran" name="modul_pembelajaran" value="{{ old('modul_pembelajaran') }}" class="form-control"><br>
                    @error('modul_pembelajaran')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_section">Deskripsi Section</label>
                    <input type="text" id="deskripsi_section" name="deskripsi_section" value="{{ old('deskripsi_section') }}" class="form-control"><br>
                    @error('deskripsi_section')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                <!-- Input hidden untuk status dengan nilai 1 -->
                    <input type="hidden" id="status" name="status" value="1">
                </div>
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"  style="background-color: #006CBB;">Submit</button>
        </div>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script SweetAlert -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection