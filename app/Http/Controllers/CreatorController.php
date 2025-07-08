<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    /**
     * Menampilkan daftar semua kreator.
     */
    public function index()
    {
        $creators = Creator::latest()->get();
        return view('creators.index', compact('creators'));
    }

    /**
     * Menampilkan form untuk menambahkan kreator baru.
     */
    public function create()
    {
        return view('creators.create');
    }

    /**
     * Menyimpan kreator baru ke database.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:bimbi_creators,email', // ✅ diubah
        'bio' => 'nullable|string',
    ]);

    Creator::create($validated);

    return redirect()->route('creators.index')->with('success', 'Kreator berhasil ditambahkan.');
}

    /**
     * Menampilkan detail kreator (jika dibutuhkan).
     */
    public function show(Creator $creator)
    {
        return view('creators.show', compact('creator'));
    }

    /**
     * Menampilkan form untuk mengedit data kreator.
     */
    public function edit(Creator $creator)
    {
        return view('creators.edit', compact('creator'));
    }

    /**
     * Memperbarui data kreator yang sudah ada.
     */
    public function update(Request $request, Creator $creator)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:creators,email,' . $creator->id,
            'bio' => 'nullable|string',
        ]);

        $creator->update($validated);

        return redirect()->route('creators.index')->with('success', 'Kreator berhasil diperbarui.');
    }

    /**
     * Menghapus data kreator.
     */
    public function destroy(Creator $creator)
    {
        $creator->delete();

        return redirect()->route('creators.index')->with('success', 'Kreator berhasil dihapus.');
    }
}
