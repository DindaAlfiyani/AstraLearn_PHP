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
                            <h4 class="card-title">Tambah Data Klasifikasi</h4>
                        </div><br>
                        <div class="card-body">
                            <form method="POST" action="{{ route('klasifikasi.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_klasifikasi">Nama Klasifikasi</label>
                                    <input type="text" id="nama_klasifikasi" name="nama_klasifikasi" value="{{ old('nama_klasifikasi') }}" class="form-control"><br>
                                    @error('nama_klasifikasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" class="form-control">
                                    @error('deskripsi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <!-- Input hidden untuk status dengan nilai 1 -->
                                    <input type="hidden" id="status" name="status" value="1">
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="background-color: #006CBB;">Submit</button>
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
