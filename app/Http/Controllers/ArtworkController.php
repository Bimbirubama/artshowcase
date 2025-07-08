<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use App\Models\Creator;
use Dom\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    /**
     * Menampilkan daftar semua artwork.
     */
   public function index(Request $request)
{
    $query = Artwork::with(['creator','category'])->latest();

    if ($request->has('search') && $request->search != '') {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $artworks = $query->get();

    return view('artworks.index', compact('artworks'));
}


    /**
     * Menampilkan form untuk membuat artwork baru.
     */
    public function create()
    {
        $categories = Category::all();
        $creators = Creator::all();
        return view('artworks.create', compact('categories', 'creators'));
    }

    /**
     * Menyimpan data artwork yang baru dibuat.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'creator_id' => 'required|exists:bimbi_creators,id',
            'category_id' => 'required|exists:bimbi_categories,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/artworks', 'public');
        }

        Artwork::create($data);

        return redirect()->route('artworks.index')->with('success', 'Artwork berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail dari satu artwork.
     */
    public function show(Artwork $artwork)
    {
        // Pastikan eager loading untuk creator dan category agar tidak terjadi lazy load
        $artwork->load(['creator', 'category', 'comments']);
        return view('artworks.show', compact('artwork'));
    }

        /**
     * Menampilkan form edit artwork.
     */
    public function edit(Artwork $artwork)
    {
        $categories = Category::all();
        $creators = Creator::all();
        return view('artworks.edit', compact('artwork', 'categories', 'creators'));
    }

    /**
     * Memperbarui data artwork yang sudah ada.
     */
    public function update(Request $request, Artwork $artwork)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'creator_id' => 'required|exists:bimbi_creators,id',
            'category_id' => 'required|exists:bimbi_categories,id',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($artwork->image && Storage::disk('public')->exists($artwork->image)) {
                Storage::disk('public')->delete($artwork->image);
            }

            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('images/artworks', 'public');
        }

        $artwork->update($data);

        return redirect()->route('artworks.index')->with('success', 'Artwork berhasil diperbarui.');
    }

     /**
     * Menghapus data artwork dari database.
     */
    public function destroy(Artwork $artwork)
    {
        // Hapus file gambar jika ada
        if ($artwork->image && Storage::disk('public')->exists($artwork->image)) {
            Storage::disk('public')->delete($artwork->image);
        }

        // Hapus data artwork dari database
        $artwork->delete();

        return redirect()->route('artworks.index')->with('success', 'Artwork berhasil dihapus.');
    }

}
