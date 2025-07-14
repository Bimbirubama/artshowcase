@extends('layouts.app')

@section('title', 'Galeri Karya Seni')

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

    .card-gallery {
        background: rgba(241, 241, 241, 0.95);
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-gallery:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
    }

    .card-title {
        font-weight: 600;
        font-size: 1.3rem;
        margin-bottom: 0.6rem;
        color: #222;
    }

    .card-text {
        font-size: 0.9rem;
        line-height: 1.3;
        color: #555;
    }

    .btn-dark-custom {
        background-color: #272829;
        border-color: #272829;
        color: #fff;
        transition: background-color 0.3s ease, border-color 0.3s ease;
        font-weight: 600;
    }

    .btn-dark-custom:hover {
        background-color: #1a252f;
        border-color: #1a252f;
        color: #fff;
    }

    .btn-outline-secondary {
        color: #444;
        border-color: #444;
        font-weight: 600;
        transition: color 0.3s ease, border-color 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background-color: #444;
        color: #fff;
        border-color: #444;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .card-header-gallery {
        background-color: #171718;
        border-radius: 12px;
        color: #ffffff;
        font-weight: 600;
        font-size: 1rem;
    }

    .card-img-top {
        height: 220px;
        object-fit: cover;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    /* Animasi fade in up */
    .animate-fade-up {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease-out forwards;
        animation-fill-mode: both;
    }

    .animate-fade-up:nth-child(3n+1) {
        animation-delay: 0.1s;
    }

    .animate-fade-up:nth-child(3n+2) {
        animation-delay: 0.3s;
    }

    .animate-fade-up:nth-child(3n+3) {
        animation-delay: 0.5s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

{{-- Header Card --}}
<div class="card shadow-sm border-0 mb-4 card-header-gallery">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-start mb-2 mb-md-0">
                <a href="{{ route('artworks.create') }}" class="btn btn-dark btn-sm">
                    <i class="bi bi-plus"></i> Tambah Karya
                </a>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <form action="{{ route('artworks.index') }}" method="GET" class="d-flex" role="search">
                    <input type="text" name="search" class="form-control form-control-sm me-2"
                           placeholder="Cari karya..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-light btn-sm">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Notifikasi --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Galeri --}}
<div class="row">
    @forelse($artworks as $artwork)
        <div class="col-md-4 mb-4 animate-fade-up">
            <div class="card card-gallery h-100 position-relative">

              {{-- Dropdown ⋮ (Hanya muncul jika sudah login dan admin) --}}
@if(auth()->check() && auth()->user()->role === 'admin')
<div class="dropdown position-absolute top-0 end-0 m-2">
    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item text-warning" href="{{ route('artworks.edit', $artwork->id) }}">✏️ Edit</a>
        </li>
        <li>
            <form action="{{ route('artworks.destroy', $artwork->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus karya ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item text-danger">🗑️ Hapus</button>
            </form>
        </li>
    </ul>
</div>
@endif


                {{-- Gambar --}}
                @if($artwork->image)
                    <img src="{{ asset('storage/' . $artwork->image) }}" class="card-img-top" alt="{{ $artwork->title }}">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                @endif

                {{-- Konten --}}
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $artwork->title }}</h5>
                    <p class="card-text text-muted mb-3">
                        🧑‍🎨 <strong>Kreator:</strong> {{ $artwork->creator->name }}<br>
                        📁 <strong>Kategori:</strong> {{ $artwork->category->name }}
                    </p>

                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ route('artworks.show', $artwork->id) }}"
                           class="btn btn-sm btn-dark-custom text-white">
                           Lihat Detail
                        </a>
                        <a href="{{ route('artworks.show', $artwork->id) }}#comments-index" class="btn btn-sm btn-outline-secondary">
                            Komentar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 mt-4">
            <div class="alert alert-info text-center">Belum ada karya seni yang ditambahkan.</div>
        </div>
    @endforelse
</div>
@endsection
