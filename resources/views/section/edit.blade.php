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
    <div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Data Section</h4>
    </div><br>
        <div class="card-body">
            <form method="POST" action="{{ route('section.update',$section->id_section) }}">
                @csrf
                @method('PUT')
                <!-- Input hidden untuk id_pelatihan -->
                <input type="hidden" id="id_pelatihan" name="id_pelatihan" value="{{ old('id_pelatihan', $defaultPelatihanId) }}">
                <!-- Form group untuk label dan pesan error -->
                <div class="form-group">
                    <label for="id_pelatihan">ID Pelatihan</label>
                    <input type="text" id="id_pelatihan" name="id_pelatihan" value="{{ old('id_pelatihan', $defaultPelatihanId) }}" class="form-control" disabled>
                    <!-- Optional: Menambahkan field disabled untuk menampilkan nilai yang tidak dapat diubah oleh pengguna -->
                    <br>
                    @error('id_pelatihan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_section">Nama Section</label>
                    <input type="text" id="nama_section" name="nama_section" value="{{ old('nama_section',$section->nama_section) }}" class="form-control">
                    @error('nama_section')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="video_pembelajaran">Video Pembelajaran</label>
                    <input type="file" id="video_pembelajaran" name="video_pembelajaran" value="{{ old('video_pembelajaran',$section->video_pembelajaran) }}" class="form-control-file">
                    @error('video_pembelajaran')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_section">Deskripsi Section</label>
                    <input type="text" id="deskripsi_section" name="deskripsi_section" value="{{ old('deskripsi_section',$section->deskripsi_section) }}" class="form-control"><br>
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
            <button type="submit" class="btn btn-primary" style="background-color: #006CBB;">Submit</button>
        </div>
        </form>
    </div>
</div>

@endsection