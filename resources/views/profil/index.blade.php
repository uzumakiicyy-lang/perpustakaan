<form action="{{ route('ubah-profil.update') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
