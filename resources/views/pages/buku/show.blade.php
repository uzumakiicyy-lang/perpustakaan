@extends('layouts.app')
@section('title', 'title-buku')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail buku</h3>
            <div class="card card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="10px">:</th>
                        <td>{{ $buku->id }}</td>
                    </tr>
                    <tr>
                        <th width="25%">nama</th>
                        <th width="10px">:</th>
                        <td>{{ $buku->nama }}</td>
                    </tr>
                    <tr>
                        <th width="25%">unit</th>
                        <th width="10px">:</th>
                        <td>{{ $buku->unit }}</td>
                    </tr>
                    <tr>
                        <th width="25%">image</th>
                        <th width="10px">:</th>
                        <td>{{ $buku->image }}</td>
                    </tr>
                     <tr>
                        <th width="25%">kode buku</th>
                        <th width="10px">:</th>
                        <td>{{ $buku->kode_buku }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Terdaftar Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $buku->created_at->isoFormat('DD MM Y HH:mm') }}</td>
                    </tr>
                     <tr>
                        <th width="25%">Diperbarui Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $buku->updated_at->isoFormat('DD MM Y HH:mm') }}</td>
                    </tr>
                </table>
                </div>
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                        <span class="ti ti-arrow-left me-1"></span>
                        Kembali
                    </a>
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary">
                        <span class="ti ti-pencil-left me-1"></span>
                        Edit
                    </a>
            </div>
        </div>
    </div>
@endsection