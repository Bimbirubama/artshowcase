@extends('layouts.app')

@section('title', 'Tambah Kreator')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">🧑‍🎨 Tambah Kreator</h2>

    {{-- Tampilkan pesan validasi --}}
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

    <div class="card shadow-sm p-4">
        <form method="POST" action="{{ route('creators.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" class="form-control" rows="3">{{ old('bio') }}</textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('creators.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
