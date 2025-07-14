@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/c.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .card {
        border: none;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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
    <div class="card p-4">
        <h3 class="text-primary mb-3">✏️ Edit Kategori</h3>

        {{-- Tampilkan error validasi jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Ada kesalahan pada input:<br><br>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form edit --}}
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $category->name) }}"
                    class="form-control" placeholder="Masukkan nama kategori" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">← Kembali</a>
                <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
