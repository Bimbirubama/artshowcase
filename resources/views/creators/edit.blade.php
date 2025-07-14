@extends('layouts.app')

@section('title', 'Edit Kreator')

@section('content')
<style>
    .edit-card {
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        padding: 40px 30px;
        animation: slideFade 0.5s ease;
    }

    @keyframes slideFade {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-label {
        font-weight: 500;
        color: #2d3436;
    }

    .form-control:focus {
        border-color: #6c5ce7;
        box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.2);
    }

    .btn-primary {
        background-color: #6c5ce7;
        border-color: #6c5ce7;
    }

    .btn-primary:hover {
        background-color: #5a4fcf;
    }

    .btn-back {
        margin-top: 20px;
    }

    .card-title {
        font-weight: 600;
        color: #2d3436;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="edit-card">

                <h4 class="card-title mb-4 text-center">
                    <i class="bi bi-pencil-square text-primary me-2"></i> Edit Data Kreator
                </h4>

                {{-- Tampilkan error validasi jika ada --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('creators.update', $creator->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $creator->name) }}"
                            required
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $creator->email) }}"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Biografi --}}
                    <div class="mb-3">
                        <label for="bio" class="form-label">Biografi</label>
                        <textarea
                            id="bio"
                            name="bio"
                            class="form-control @error('bio') is-invalid @enderror"
                            rows="4"
                            placeholder="Ceritakan tentang kreator..."
                        >{{ old('bio', $creator->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Simpan --}}
                    <button type="submit" class="btn btn-primary w-100 fw-semibold">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </form>

                {{-- Tombol Kembali --}}
                <a href="{{ route('creators.index') }}" class="btn btn-outline-secondary w-100 btn-back">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Daftar Kreator
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
