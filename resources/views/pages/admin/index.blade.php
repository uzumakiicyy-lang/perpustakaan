@extends("layouts.app")

@section('title', 'Halaman Admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Halaman Admin</h3>
            <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">
                <span class="ti ti-plus me-1"></span>Tambah
            </a>

            <div class="card card-body">
                <table class="table table-striped dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <a href="{{ route('admin.show', $admin->id) }}"
                                        class="btn btn-sm btn-secondary">
                                        <span class="ti ti-eye"></span>
                                    </a>

                                    <a href="{{ route('admin.edit', $admin->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <span class="ti ti-pencil"></span>
                                    </a>

                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger"
                                        onclick="actionDelete('{{ route('admin.destroy', $admin->id) }}')">
                                        <span class="ti ti-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form id="form-delete" action="" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}"/>
@endpush

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.js') }}"></script>
    <script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            $('.dataTable').DataTable();
        });

        function actionDelete(url) {
            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                cancelButtonColor: "#343a40",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-delete').attr('action', url);
                    $('#form-delete').submit();
                }
            });
        }
    </script>
@endpush
