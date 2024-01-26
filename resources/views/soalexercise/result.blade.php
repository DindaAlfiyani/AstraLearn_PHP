@extends('layouts.customlayout1')

@section('content')
<br><br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6"> <!-- Mengubah lebar kolom menjadi 6 -->
                <div class="card p-5"> <!-- Menambahkan padding untuk memperbesar card -->
                    <h4 class="text-center">Nilai</h4><br>
                    <h1 class="text-center">{{ $result->nilai }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
