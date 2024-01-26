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
        <h4 class="card-title">Edit Data Klasifikasi</h4>
    </div><br>
        <div class="card-body">
            <form method="POST" action="{{ route('klasifikasi.update',$klasifikasi_pelatihan->id_klasifikasi) }}">
                @csrf
                @method('PUT')
                    <div class="form-group">
                    <label for="nama_klasifikasi">Nama Klasifikasi</label>
                    <input type="text" id="nama_klasifikasi" name="nama_klasifikasi" value="{{ old('nama_klasifikasi',$klasifikasi_pelatihan->nama_klasifikasi) }}" class="form-control"><br>
                    @error('nama_klasifikasi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_klasifikasi">Deskripsi Klasifikasi</label>
                    <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi',$klasifikasi_pelatihan->deskripsi) }}" class="form-control">
                    @error('deskripsi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="background-color: #006CBB;">Submit</button>
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