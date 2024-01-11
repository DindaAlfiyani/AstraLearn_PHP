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
                        <h4 class="card-title">Tambah Data Pengguna</h4>
                    </div><br>
                    <div class="card-body">
                    <form method="POST" action="{{ route('pengguna.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control" disabled><br>
                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control" disabled><br>
                            @error('nama_lengkap')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="hak_akses">Hak Akses</label>
                            <input type="text" id="hak_akses" name="hak_akses" value="{{ old('hak_akses') }}" class="form-control"><br>
                            @error('hak_akses')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
@endsection