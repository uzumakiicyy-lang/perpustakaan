<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Halaman Form Pengunjung</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4 shadow-lg">
        <h4 class="text-center fw-bold mb-4">HALAMAN PENGUNJUNG LITERA SPACE</h4>

        <form action="{{ route('pengunjung.store') }}" method="POST">
          @csrf

          <!-- Nama -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}">
            @error('nama')
              <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
              <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>

          <!-- Telepon -->
          <div class="mb-3">
            <label for="telp" class="form-label">Nomor Telepon</label>
            <input type="text" id="telp" name="telp" class="form-control" value="{{ old('telp') }}">
            @error('telp')
              <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>

          <!-- Pilih Buku -->
          <div class="mb-3">
            <label for="buku_id" class="form-label">Buku yang Dipinjam</label>
            <select name="buku_id" id="buku_id" class="form-select">
              <option value="">Pilih buku</option>
              @foreach ($buku as $item)
                <option value="{{ $item->id }}" {{ old('buku_id') == $item->id ? 'selected' : '' }}>
                  {{ $item->kode_buku }} - {{ $item->judul }}
                </option>
              @endforeach
            </select>
            @error('buku_id')
              <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>

          <!-- Tombol Submit -->
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-send-fill"></i> SUBMIT
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- 🔔 Toast Notifikasi -->
@if(session('success'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
  <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
@endif

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@if(session('success'))
<script>
  const toastEl = document.getElementById('successToast');
  const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
  toast.show();
</script>
@endif

</body>
</html>