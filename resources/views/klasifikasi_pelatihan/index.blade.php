@extends('layouts.customlayout1')
@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col">
        <div class="pagetitle">
        <h1>Klasifikasi Pelatihan<h1>
    </div><!-- End Page Title -->
    <br>

    <section class="section">
    <a type="button" class="btn btn-primary" href="{{ route('klasifikasi.create') }}" style="background-color: #006CBB;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;+ Add Klasifikasi</a><br><br>
      <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body"><br>
                               

                    <table id = "myTable" class="table datatable"">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Nama Klasifikasi</th>
                                <th>Deskripsi Klasifikasi</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($klasifikasi_pelatihan as $item)
                            <tr class="text-center">
                                <td>{{$item['nama_klasifikasi']}}</td>
                                <td>{{$item['deskripsi']}}</td>
                                <td>
                                <a href="{{ route('klasifikasi.edit',['id'=> $item->id_klasifikasi]) }}"><i class="bi bi-exclamation-triangle"></i></a>
                                <a href="#" class="delete-btn" data-id="{{ $item->id_klasifikasi }}">
                                    <i class="bi bi-trash"></i>
                                </a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{$item['id']}}">Klasifikasi Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Nama Klasifikasi</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['nama_klasifikasi']}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label>Deskripsi Klasifikasi</label>
                                                </div>
                                                <div class="col-10">
                                                    <label>: {{$item['deskripsi']}}</label>
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

                                @if(session('delete'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Data berhasil dihapus.',
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

<!-- Script SweetAlert -->
<script>
    $(document).ready(function () {
    $('.delete-btn').on('click', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
            title: 'Yakin data ingin dihapus?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete route with the correct parameter
                window.location.href = "{{ url('klasifikasi/delete') }}/" + id;
            }
        });
    });
});
</script>

@endsection