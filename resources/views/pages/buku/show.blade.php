@extends('layouts.app')
@section('title', 'Detail Buku')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail Buku</h3>
            <div class="card card-body p-0">
                <table class="table table-striped mb-0">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="10px">:</th>
                        <td>{{ $buku->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <td>{{ $buku->nama }}</td>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <th>:</th>
                        <td>{{ $buku->unit }}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <th>:</th>
                        <td>
                            @if ($buku->image)
                                <img src="{{ asset('storage/' . $buku->image) }}" 
                                     alt="cover buku" width="120">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Kode Buku</th>
                        <th>:</th>
                        <td>{{ $buku->kode_buku }}</td>
                    </tr>
                    <tr>
                        <th>Terdaftar Pada</th>
                        <th>:</th>
                        <td>{{ $buku->created_at->isoFormat('DD MMMM YYYY HH:mm') }}</td>
                    </tr>
                    <tr>
                        <th>Diperbarui Pada</th>
                        <th>:</th>
                        <td>{{ $buku->updated_at->isoFormat('DD MMMM YYYY HH:mm') }}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span>
                    Kembali
                </a>
                <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary">
                    <span class="ti ti-pencil me-1"></span>
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection
