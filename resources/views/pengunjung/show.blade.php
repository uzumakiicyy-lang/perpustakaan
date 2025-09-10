@extends('layouts.app')
@section('title', 'title-pengunjung')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail pengunjung</h3>
            <div class="card card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="10px">:</th>
                        <td>{{ $pengunjung->id }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Nama</th>
                        <th width="10px">:</th>
                        <td>{{ $pengunjung->nama }}</td>
                    </tr>
                     <tr>
                        <th width="25%">Nomor telpon</th>
                        <th width="10px">:</th>
                        <td>{{ $pengunjung->telp }}</td>
                    </tr>
                     <tr>
                        <th width="25%">Email</th>
                        <th width="10px">:</th>
                        <td>{{ $pengunjung->email }}</td>
                    </tr>
                    <tr>
                        <th width="25%">buku yang dipinjam</th>
                        <th width="10px">:</th>
                        <td>{{$pengunjung->$buku->kode_buku }}</td>
                    </tr>
                    <tr>
                        <th width="25%">berkunjung pada</th>
                        <th width="10px">:</th>
                        <td>{{ $pengunjung->created_at->isoFormat('DD MM Y HH:mm') }}</td>
                    </tr>
                </table>
                </div>
                    <a href="{{ route('pengunjung.index') }}" class="btn btn-secondary">
                        <span class="ti ti-arrow-left me-1"></span>
                        Kembali
                    </a>
            </div>
        </div>
    </div>
@endsection