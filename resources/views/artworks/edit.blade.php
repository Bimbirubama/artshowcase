@extends('layouts.app')

@section('title', 'Edit Karya Seni')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">✏️ Edit Karya Seni</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Edit --}}
    <form action="{{ route('artworks.update', $artwork->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Karya</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $artwork->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $artwork->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="creator_id" class="form-label">Kreator</label>
            <select name="creator_id" class="form-select" required>
                @foreach ($creators as $creator)
                    <option value="{{ $creator->id }}" {{ $artwork->creator_id == $creator->id ? 'selected' : '' }}>
                        {{ $creator->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $artwork->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (opsional)</label>
            @if($artwork->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $artwork->image) }}" width="150" alt="Current Image">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('artworks.index') }}" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
