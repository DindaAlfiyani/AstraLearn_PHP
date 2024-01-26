@extends('layouts.customlayout4')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="pagetitle">
                <h1>Data Pelatihan</h1>
            </div><!-- End Page Title -->
            <br>

            <section class="section">
                <a type="button" class="btn btn-primary" href="{{ route('pelatihan.create') }}" style="background-color: #006CBB;">
                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;+ Add Pelatihan
                </a><br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body"><br>
                                @if(session('success'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Data berhasil ditambahkan.',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                </script>
                                @endif

                                <table id="myTable" class="table datatable">
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
                                            <td>{{ $item->klasifikasi->nama_klasifikasi}}</td>
                                            <td>{{$item['nilai_minimum']}}</td>
                                            <td>
                                            <a href="{{ route('pelatihan.edit',['id'=> $item->id_pelatihan]) }}">
                                                <button type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></button>
                                            </a>
                                            <a href="{{ route('pelatihan.delete',['id'=> $item->id_pelatihan]) }}">
                                                <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                            </a>
                                            <a href="{{ route('section.index',['id_pelatihan'=> $item->id_pelatihan]) }}">
                                                <button type="button" class="btn btn-primary">Section</button>
                                            </a>
                                            <a href="{{ route('soalexam.create',['id_pelatihan'=> $item->id_pelatihan]) }}">
                                                <button type="button" class="btn btn-info">Exam</button>
                                            </a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <!-- ... your existing modal code ... -->
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
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
