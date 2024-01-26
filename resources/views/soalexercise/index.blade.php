<!-- resources/views/soal_exercise/index.blade.php -->

@extends('layouts.customlayout1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="pagetitle">
                <h1>Soal Exercise</h1>
            </div>
            <br>
            <section class="section">
                <a type="button" class="btn btn-primary" href="{{ route('soalexam.create') }}" style="background-color: #006CBB;">
                   <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;+ Add Soal Exercise
                </a><br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body"><br>
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                                @endif
                                <table class="table">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th>Soal</th>
                                            <th>Kunci Jawaban</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($soal_exercise as $item)
                                        <tr class="text-center">
                                            <td>{{$item->soal}}</td>
                                            <td>{{$item->kunci_jawaban}}</td>
                                            <td>
                                                <a href="{{ route('soalexercise.edit',['id'=> $item->id_exercise]) }}">
                                                    <button type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></button>
                                                </a>
                                                <a href="#" class="delete-btn" data-id="{{ $item->id_exercise }}">
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->id_exam}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <!-- ... your existing modal code ... -->
                                        </div>
                                        @empty
                                        <tr>
                                            <td colspan="4">No soal available</td>
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
            </section>
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
                window.location.href = "{{ url('pelatihan/delete') }}/" + id;
            }
        });
    });
});
</script>
@endsection
