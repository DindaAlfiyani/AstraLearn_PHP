@extends('layouts.customlayout1')
@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col">
        <div class="pagetitle">
        <h1>Data Pelatihan<h1>
    </div><!-- End Page Title -->
    <br>

    <section class="section">
    <a type="button" class="btn btn-primary" href="{{ route('pelatihan.create') }}" style="background-color: #006CBB;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;+ Add Pelatihan</a><br><br>
      <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body"><br>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <table id = "myTable" class="table datatable"">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Nama Pelatihan</th>
                                <th>Deskripsi Pelatihan</th>
                                <th>Klasifikasi Pelatihan</th>
                                <th>Nilai Minimum</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelatihan as $item)
                            <tr class="text-center">
                                <td>{{$item['nama_pelatihan']}}</td>
                                <td>{{$item['deskripsi_pelatihan']}}</td>
                                <td>{{$item['nama_klasifikasi']}}</td>
                                <td>{{$item['nilai_minimum']}}</td>
                                <td>
                                <a href="{{ route('pelatihan.edit',['id'=> $item->id_pelatihan]) }}"><i class="bi bi-exclamation-triangle"></i></a>
                                <a href="{{ route('pelatihan.delete',['id'=> $item->id_pelatihan]) }}"><i class="bi bi-trash"></i></a>
                                <a href="{{ route('section.index',['id'=> $item->id_pelatihan]) }}"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{$item['id']}}">Buku Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Nama Pelatihan</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['nama_pelatihan']}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Deskripsi Pelatihan</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['deskripsi_pelatihan']}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Klasifikasi Pelatihan</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['nama_klasifikasi->']}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Nilai Minimum</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['nilai_minimum']}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr>
                                <td colspan="4">empty</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection