@extends('layouts.customlayout1')
@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col">
        <div class="pagetitle">
        <h1>Data Pengguna<h1>
    </div><!-- End Page Title -->
    <br>

    <section class="section">
    <a type="button" class="btn btn-primary" href="{{ route('pengguna.create') }}" style="background-color: #006CBB;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;+ Add Pengguna</a><br><br>
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
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Hak Akses</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengguna as $item)
                            <tr class="text-center">
                                <td>{{$item['username']}}</td>
                                <td>{{$item['nama_lengkap']}}</td>
                                <td>{{$item['hak_akses']}}</td>
                                <td>
                                <a href="{{ route('pengguna.edit',['id'=> $item->id_pengguna]) }}"><i class="bi bi-exclamation-triangle"></i></a>
                                <a href="{{ route('pengguna.delete',['id'=> $item->id_pengguna]) }}"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{$item['id']}}">Pengguna Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Username</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['username']}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Nama Lengkap</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['nama_lengkap']}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Hak Akses</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['hak_akses']}}</label>
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