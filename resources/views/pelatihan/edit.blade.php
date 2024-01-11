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
        <h4 class="card-title">Edit Data Pelatihan</h4>
    </div><br>
        <div class="card-body">
            <form method="POST" action="{{ route('pelatihan.update',$pelatihan->id_pelatihan) }}">
                @csrf
                @method('PUT')
                    <div class="form-group">
                    <label for="nama_pelatihan">Nama Pelatihan</label>
                    <input type="text" id="nama_pelatihan" name="nama_pelatihan" value="{{ old('nama_pelatihan',$pelatihan->nama_pelatihan) }}" class="form-control"><br>
                    @error('nama_pelatihan')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_pelatihan">Deskripsi Pelatihan</label>
                    <input type="text" id="deskripsi_pelatihan" name="deskripsi_pelatihan" value="{{ old('deskripsi_pelatihan',$pelatihan->deskripsi_pelatihan) }}" class="form-control">
                    @error('deskripsi_pelatihan')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="klasifikasi_pelatihan">Klasifikasi Pelatihan</label>
                    <input type="text" id="klasifikasi_pelatihan" name="klasifikasi_pelatihan" value="{{ old('klasifikasi_pelatihan',$pelatihan->klasifikasi_pelatihan) }}" class="form-control"><br>
                    @error('klasifikasi_pelatihan')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_peserta">Jumlah Peserta</label>
                    <input type="text" id="jumlah_peserta" name="jumlah_peserta" value="{{ old('jumlah_peserta',$pelatihan->jumlah_peserta) }}" class="form-control"><br>
                    @error('jumlah_peserta')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai_minimum">Nilai Minimum</label>
                    <input type="text" id="nilai_minimum" name="nilai_minimum" value="{{ old('nilai_minimum',$pelatihan->nilai_minimum) }}" class="form-control"><br>
                    @error('nilai_minimum')
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