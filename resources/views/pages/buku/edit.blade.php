@extends('layouts.app')

@section('title', 'Ubah Buku')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3 class="mb-3">Ubah Buku</h3>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('buku.update', $buku->id) }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text"
                               id="nama"
                               name="nama"
                               value="{{ old('nama', $buku->nama) }}"
                               class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Unit --}}
                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text"
                               id="unit"
                               name="unit"
                               value="{{ old('unit', $buku->unit) }}"
                               class="form-control @error('unit') is-invalid @enderror">
                        @error('unit')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kode Buku --}}
                    <div class="mb-3">
                        <label for="kode_buku" class="form-label">Kode Buku</label>
                        <input type="text"
                               id="kode_buku"
                               name="kode_buku"
                               value="{{ old('kode_buku', $buku->kode_buku) }}"
                               class="form-control @error('kode_buku') is-invalid @enderror">
                        @error('kode_buku')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar (opsional)</label>
                        <input type="file"
                               id="image"
                               name="image"
                               class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        {{-- Preview gambar lama --}}
                        @if ($buku->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $buku->image) }}"
                                     alt="Cover Buku"
                                     width="120">
                            </div>
                        @endif
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <span class="ti ti-send me-1"></span> Simpan
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
