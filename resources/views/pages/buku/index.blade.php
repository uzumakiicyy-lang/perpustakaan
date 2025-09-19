@extends('layouts.app')
@section('title', 'Data Buku')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Daftar Buku</h3>
        <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">
            <span class="ti ti-plus me-1"></span> Tambah
        </a>

        <div class="row">
            @foreach ($buku as $item)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        {{-- Gambar cover buku --}}
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" 
                                 class="card-img-top" 
                                 alt="cover buku" 
                                 style="height: 250px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light" 
                                 style="height: 250px;">
                                <span class="text-muted">No Image</span>
                            </div>
                        @endif

                        {{-- Informasi buku --}}
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <small class="text-muted d-block">Kode: {{ $item->kode_buku }}</small>
                            <small class="text-muted d-block">Unit: {{ $item->unit }}</small>
                        </div>

                        {{-- Tombol aksi --}}
                        <div class="card-footer text-center">
                            <a href="{{ route('buku.show', $item->id) }}" 
                               class="btn btn-sm btn-info" 
                               title="Lihat Detail">
                                <span class="ti ti-eye"></span>
                            </a>
                            <a href="{{ route('buku.edit', $item->id) }}" 
                               class="btn btn-sm btn-warning" 
                               title="Edit">
                                <span class="ti ti-pencil"></span>
                            </a>
                            <a href="javascript:;" class="btn btn-sm btn-danger"
                               onclick="actionDelete('{{ route('buku.destroy', $item->id) }}')" 
                               title="Hapus">
                                <span class="ti ti-trash"></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/libs/sweetalert2/sweetalert2.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <script>
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
                    $('#form-delete').attr('action', url);
                    $('#form-delete').submit();
                }
            });
        }
    </script>

    {{-- Notifikasi SweetAlert --}}
    @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ Session::get('success') }}'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: '{!! implode('<br>', $errors->all()) !!}'
            });
        </script>
    @endif
@endpush
