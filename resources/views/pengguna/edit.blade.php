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
            <form method="POST" action="{{ route('pengguna.update', $pengguna->id_pengguna) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $pengguna->username) }}" class="form-control readonly-input" readonly onfocus="this.blur()"><br>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $pengguna->nama) }}" class="form-control readonly-input" readonly onfocus="this.blur()"><br>
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="custom-select form-control">
                        <option value="admin" {{ (old('role', $pengguna->role) == 'admin') ? 'selected' : '' }}>Admin</option>
                        <option value="pelatih" {{ (old('role', $pengguna->role) == 'pelatih') ? 'selected' : '' }}>Pelatih</option>
                        <option value="peserta" {{ (old('role', $pengguna->role) == 'peserta') ? 'selected' : '' }}>Peserta</option>
                    </select>
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

<!-- Script SweetAlert -->
@if(session('update'))
    <div class="alert alert-success">
        {{ session('update') }}
    </div>
@endif

<style>
    .readonly-input {
        background-color: #f0f0f0; /* Warna abu-abu */
        color: #777; /* Warna teks abu-abu yang lebih gelap */
    }
</style>

@endsection
