@extends('layouts.app')

@section('title', 'Tambah Karya Seni')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">🖌️ Tambah Karya Seni</h2>

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

    <form action="{{ route('artworks.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" placeholder="Judul karya seni" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Deskripsi karya">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="creator_id" class="form-label">Kreator</label>
            <select name="creator_id" class="form-select" required>
                <option value="">-- Pilih Kreator --</option>
                @foreach($creators as $creator)
                    <option value="{{ $creator->id }}" {{ old('creator_id') == $creator->id ? 'selected' : '' }}>
                        {{ $creator->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('artworks.index') }}" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-primary">💾 Simpan</button>
        </div>
    </form>
</div>
@endsection
