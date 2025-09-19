<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Tampilkan form ubah profil admin yang sedang login.
     */
    public function index()
    {
        // Ambil data user yang sedang login
        $user = auth()->user();

        return view('profil.index', compact('user'));
    }

    /**
     * Proses penyimpanan perubahan profil admin.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validasi input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8', // password boleh kosong
        ]);

        // Update data user
        $user->name  = $validated['name'];
        $user->email = $validated['email'];

        // Jika password diisi, update juga
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        // Kembali ke halaman form dengan pesan sukses
        return redirect()->route('ubah-profil')
                         ->with('success', 'Profil berhasil diperbarui.');
    }
}
