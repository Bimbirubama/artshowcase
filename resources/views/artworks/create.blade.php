@extends('layouts.app')

@section('title', 'Tambah Karya Seni')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/c.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Poppins', sans-serif;
    }

    .card-form {
        border: none;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .btn {
        border-radius: 8px;
        padding: 8px 16px;
    }

    .btn-primary {
        background-color: #3498db;
        border: none;
    }

    .btn-secondary {
        background-color: #7f8c8d;
        border: none;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>

<div class="container mt-5">
    <div class="card card-form p-4">
        <h3 class="text-primary text-center mb-4">🖌️ Tambah Karya Seni</h3>

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

        <form action="{{ route('artworks.store') }}" method="POST" enctype="multipart/form-data">
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
</div>
@endsection
