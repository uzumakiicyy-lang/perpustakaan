@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-title">Tambah Buku</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama"
                                   name="nama" 
                                   value="{{ old('nama') }}" />
                            @error('nama')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Unit --}}
                        <div class="form-group mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" 
                                   class="form-control @error('unit') is-invalid @enderror" 
                                   id="unit"
                                   name="unit" 
                                   value="{{ old('unit') }}" />
                            @error('unit')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image"
                                   name="image" />
                            @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Kode Buku --}}
                        <div class="form-group mb-3">
                            <label for="kode_buku" class="form-label">Kode Buku</label>
                            <input type="text" 
                                   class="form-control @error('kode_buku') is-invalid @enderror" 
                                   id="kode_buku"
                                   name="kode_buku" 
                                   value="{{ old('kode_buku') }}" />
                            @error('kode_buku')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <span class="ti ti-send me-1"></span>
                                Simpan
                            </button>
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
