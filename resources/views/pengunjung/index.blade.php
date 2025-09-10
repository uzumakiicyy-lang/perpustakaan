@extends('layouts.app')
@section('title', 'Daftar Pengunjung')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Daftar Pengunjung</h3>

        <div class="card card-body">
            <!-- Filter -->
            <div class="row mb-3">
                <div class="col-md-5">
                    <form action="" method="GET" class="d-flex align-items-center gap-2">
                        <label for="filter">Filter:</label>
                        <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Table -->
            <table class="table table-striped table-bordered dataTable">
                        <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>No. Telepon</th>
        <th>Buku</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
</thead>
                <tbody>
                    @foreach ($pengunjung as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>{{ $item->buku->kode_buku ?? '-' }}</td>
                            <td>{{ $item->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                            <td>
                                <a href="{{ route('pengunjung.show', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                   onclick="actionDelete('{{ route('pengunjung.destroy', $item->id) }}')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Form Delete -->
<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/sweetalert2/sweetalert2.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        // Sweetalert delete confirm
        function actionDelete(url) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data ini akan dihapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete').action = url;
                    document.getElementById('form-delete').submit();
                }
            });
        }

        // DataTable init
        document.addEventListener("DOMContentLoaded", function () {
            $('.dataTable').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
                }
            });
        });
    </script>
@endpush