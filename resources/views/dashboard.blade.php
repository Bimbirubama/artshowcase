@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #ffffff;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-4 text-dark" href="#">🎨 Galeri Seni</a>
            <form class="d-flex ms-auto" role="search">
                <input class="form-control form-control-sm me-2 rounded-pill border" type="search" placeholder="Cari karya..."
                    aria-label="Search">
                <button class="btn btn-outline-primary btn-sm rounded-pill px-4" type="submit">Cari</button>
            </form>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="hero-banner py-5"
        style="background: linear-gradient(to right, #f1f2f6, #dff9fb); font-family: 'Poppins', sans-serif;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h1 class="display-6 fw-bold text-dark mb-3">Selamat Datang di <span class="text-primary">Galeri Seni
                            Digital</span></h1>
                    <p class="lead text-muted mb-4">Kelola karya seni digital, kategori, kreator, dan komentar pengguna
                        dalam satu platform.</p>
                    <a href="{{ route('artworks.create') }}" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
                        + Tambah Karya Baru
                    </a>
                </div>
                <div class="col-md-6 text-center mt-4 mt-md-0">
                    <img src="{{ asset('images/st.webp') }}" alt="Studio Seni Lukis" class="img-fluid rounded shadow-sm"
                        style="max-width: 320px; height: auto;">
                </div>

            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <div class="container mt-5">
        <div class="row g-4 justify-content-center">
            {{-- Card Template --}}
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

    {{-- Custom CSS --}}
    <style>
        .hover-shadow {
            transition: all 0.3s ease-in-out;
        }

        .hover-shadow:hover {
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .dashboard-card {
            border: none;
            border-radius: 1rem;
            background-color: #ffffff;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .card-body h5 {
            font-size: 1.2rem;
        }
    </style>
@endsection
