@extends('layouts.customlayout1')
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body"><br>

                                <table id="myTable" class="table datatable">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th>Nama Pelatihan</th>
                                            <th>Deskripsi Pelatihan</th>
                                            <th>Klasifikasi Pelatihan</th>
                                            <th>Nilai Minimum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pelatihan as $item)
                                        <tr class="text-center">
                                            <td>{{$item['nama_pelatihan']}}</td>
                                            <td>{{$item['deskripsi_pelatihan']}}</td>
                                            <td>{{ $item->klasifikasi->nama_klasifikasi}}</td>
                                            <td>{{$item['nilai_minimum']}}</td>
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

                                @if(session('update'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Data berhasil diubah.',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                </script>
                                @endif

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
