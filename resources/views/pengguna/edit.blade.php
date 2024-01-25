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
        <h4 class="card-title">Edit Data Pengguna</h4>
    </div><br>
        <div class="card-body">
            <form method="POST" action="{{ route('pengguna.update',$pengguna->id_pengguna) }}">
                @csrf
                @method('PUT')
                    <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username',$pengguna->username) }}" class="form-control"><br>
                    @error('username')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama',$pengguna->nama) }}" class="form-control"><br>
                    @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" id="role" name="role" value="{{ old('role',$pengguna->role) }}" class="form-control"><br>
                    @error('role')
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

@endsection