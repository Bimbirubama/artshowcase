@extends('layouts.app')

@section('title', 'Dashboard')

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

    .overlay-bg {
        background: rgba(240, 231, 231, 0.856);
        border-radius: 1rem;
        padding: 2rem;
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
    }

    .hover-shadow {
        transition: all 0.3s ease-in-out;
    }

    .hover-shadow:hover {
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .dashboard-card {
        border: none;
        border-radius: 1rem;
        background-color: #dfdfdf;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05);
        height: 100%;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    /* Delay animasi tiap kartu dengan nth-child */
    .dashboard-card:nth-child(1) {
        animation-delay: 0.2s;
    }
    .dashboard-card:nth-child(2) {
        animation-delay: 0.4s;
    }
    .dashboard-card:nth-child(3) {
        animation-delay: 0.6s;
    }
    .dashboard-card:nth-child(4) {
        animation-delay: 0.8s;
    }

    .card-body h5 {
        font-size: 1.2rem;
        color: #222;
    }

    /* Navbar gelap */
    nav.navbar {
        background-color: rgba(34, 34, 34, 0.95) !important;
        backdrop-filter: blur(6px);
    }

    /* Header pencarian gelap + animasi */
    .card-header-gallery {
        background-color: rgba(34, 34, 34, 0.95) !important;
        border-radius: 12px;
        color: #eee;
        opacity: 0;
        transform: translateY(-20px);
        animation: fadeInUp 0.8s ease forwards;
    }

    /* Styling form pencarian di header */
    .card-header-gallery .form-control {
        background-color: #555;
        color: #eee;
        border: none;
    }

    .card-header-gallery .form-control::placeholder {
        color: #ccc;
    }

    .card-header-gallery .btn-light {
        background-color: #777;
        color: #eee;
        border: none;
    }

    .card-header-gallery .btn-light:hover {
        background-color: #555;
        color: #fff;
    }

    .btn-primary {
        background-color: #555;
        border-color: #555;
    }

    .btn-primary:hover {
        background-color: #444;
        border-color: #444;
    }

    .text-primary {
        color: #444 !important;
    }

    /* Animasi keyframes */
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

{{-- Header Card dengan pencarian gelap --}}
<div class="card shadow-sm border-0 mb-4 card-header-gallery">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-start mb-2 mb-md-0">
                {{-- Kosong --}}
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

{{-- Hero Section --}}
<section class="py-5">
    <div class="container text-center overlay-bg">
        <img src="{{ asset('images/d.jpg') }}" alt="Studio Seni Lukis"
            class="img-fluid rounded shadow-sm mb-3"
            style="width: 100%; max-height: 240px; object-fit: cover;">

        <h1 class="fw-bold text-dark mb-2" style="font-size: 1.25rem;">
            Selamat Datang di <span class="text-primary">Galeri Seni Digital</span>
        </h1>
        <p class="text-muted mb-3" style="font-size: 0.9rem;">
            Kelola karya seni digital, kategori, kreator, dan komentar pengguna dalam satu platform.
        </p>

        {{-- <a href="{{ route('artworks.show') }}" class="btn btn-sm btn-primary rounded-pill px-3">
            Temukan Berbagai Karya Baru
        </a> --}}
    </div>
</section>

{{-- Main Content --}}
<section class="pb-5">
    <div class="container overlay-bg mt-4">
        <div class="row g-4 justify-content-center">
            @php
                $cards = [
                    [
                        'icon' => 'fa-palette',
                        'color' => 'primary',
                        'title' => 'Artworks',
                        'text' => 'Kelola semua karya seni.',
                        'route' => 'artworks.index',
                    ],
                    [
                        'icon' => 'fa-tags',
                        'color' => 'success',
                        'title' => 'Categories',
                        'text' => 'Kelola kategori karya seni.',
                        'route' => 'categories.index',
                    ],
                    [
                        'icon' => 'fa-user-pen',
                        'color' => 'warning',
                        'title' => 'Creators',
                        'text' => 'Kelola kreator karya seni.',
                        'route' => 'creators.index',
                    ],
                    [
                        'icon' => 'fa-comments',
                        'color' => 'secondary',
                        'title' => 'Comments',
                        'text' => 'Kelola komentar pengguna.',
                        'route' => 'comments.index',
                    ],
                ];
            @endphp

            @foreach ($cards as $card)
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="{{ route($card['route']) }}" class="text-decoration-none">
                        <div class="card dashboard-card text-center hover-shadow">
                            <div class="card-body py-5">
                                <i class="fa-solid {{ $card['icon'] }} fa-3x text-{{ $card['color'] }} mb-3"></i>
                                <h5 class="fw-bold text-dark">{{ $card['title'] }}</h5>
                                <p class="text-muted">{{ $card['text'] }}</p>
                                <button class="btn btn-{{ $card['color'] }} btn-sm rounded-pill px-4">Lihat</button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
