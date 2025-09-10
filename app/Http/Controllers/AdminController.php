<?php

namespace App\Http\Controllers;

use App\Models\User; // perbaiki namespace
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::orderBy('name', 'ASC')->get();
        return view('pages.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // perbaikan disini
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = User::findOrFail($id);
        return view('pages.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::findOrFail($id);
        return view('pages.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $id, // perbaikan disini
            'password' => 'nullable|min:8|confirmed',
        ]);

        $admin = User::findOrFail($id);
        $admin->name  = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.index');
    }
}