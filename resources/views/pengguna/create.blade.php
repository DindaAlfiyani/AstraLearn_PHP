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
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="form-control" disabled><br>
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" id="role" name="role" value="{{ old('role') }}" class="form-control"><br>
                            @error('role')
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