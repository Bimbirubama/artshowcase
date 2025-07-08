<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Menampilkan daftar semua komentar (opsional, bisa dipakai untuk admin).
     */
    public function index()
    {
        $comments = Comment::with('artwork')->latest()->get();
        return view('comments.index', compact('comments'));
    }

    /**
     * Menyimpan komentar baru ke database.
     */
   
  public function store(Request $request)
{
    $validated = $request->validate([
        'artwork_id' => 'required|exists:bimbi_artworks,id',
        'name'       => 'required|string|max:255',
        'comment'    => 'required|string',
    ]);

    Comment::create($validated);

    return redirect()->route('comments.index')->with('success', 'Komentar berhasil ditambahkan.');
}

    /**
     * Menampilkan detail satu komentar (opsional).
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

 
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}
