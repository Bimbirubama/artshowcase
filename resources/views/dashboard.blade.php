@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #2c3e50;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-4" href="#">Sistem Galeri</a>
        <form class="d-flex ms-auto" role="search">
            <input class="form-control form-control-sm me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light btn-sm rounded-pill px-4" type="submit">Search</button>
        </form>
    </div>
</nav>
{{-- Hero Section --}}
<section class="hero-banner py-5 border-bottom" style="background-color: #f8f9fa; font-family: 'Roboto Slab', serif;">
    <div class="container">
        <div class="row align-items-center">
            {{-- Text --}}
            <div class="col-md-6 text-center text-md-start hero-text">
                <h1 class="display-5 fw-bold text-dark mb-3">WELCOME TO GALERI SENI</h1>
                <p class="lead text-dark mb-4">
                    Kelola galeri karya seni digital, termasuk karya, kategori, kreator, dan komentar pengguna.
                </p>
                <a href="{{ route('artworks.create') }}" class="btn btn-primary rounded-pill px-4 hero-btn">
                    + Tambah Karya Baru
                </a>
            </div>

            {{-- Gambar --}}
            <div class="col-md-6 text-center mt-4 mt-md-0">
                <img src="https://cdn-icons-png.flaticon.com/512/1055/1055646.png" alt="Art Illustration"
                     class="img-fluid hero-image" style="max-width: 320px;">
            </div>
        </div>
    </div>
</section>




{{-- Main Content --}}
<div class="container mt-5">
    <div class="row g-4 justify-content-center">
        {{-- Card: Artworks --}}
        <div class="col-12 col-md-6 col-lg-3">
            <a href="{{ route('artworks.index') }}" class="text-decoration-none">
                <div class="card dashboard-card text-center hover-shadow">
                    <div class="card-body py-5">
                        <i class="fa-solid fa-palette fa-3x text-primary mb-3"></i>
                        <h5 class="fw-semibold">Artworks</h5>
                        <p class="text-secondary">Kelola semua karya seni.</p>
                        <button class="btn btn-primary btn-sm rounded-pill px-4">Lihat</button>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card: Categories --}}
        <div class="col-12 col-md-6 col-lg-3">
            <a href="{{ route('categories.index') }}" class="text-decoration-none">
                <div class="card dashboard-card text-center hover-shadow">
                    <div class="card-body py-5">
                        <i class="fa-solid fa-tags fa-3x text-success mb-3"></i>
                        <h5 class="fw-semibold">Categories</h5>
                        <p class="text-secondary">Kelola kategori karya seni.</p>
                        <button class="btn btn-success btn-sm rounded-pill px-4">Lihat</button>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card: Creators --}}
        <div class="col-12 col-md-6 col-lg-3">
            <a href="{{ route('creators.index') }}" class="text-decoration-none">
                <div class="card dashboard-card text-center hover-shadow">
                    <div class="card-body py-5">
                        <i class="fa-solid fa-user-pen fa-3x text-warning mb-3"></i>
                        <h5 class="fw-semibold">Creators</h5>
                        <p class="text-secondary">Kelola kreator karya seni.</p>
                        <button class="btn btn-warning btn-sm rounded-pill px-4 text-dark">Lihat</button>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card: Comments --}}
        <div class="col-12 col-md-6 col-lg-3">
            <a href="{{ route('comments.index') }}" class="text-decoration-none">
                <div class="card dashboard-card text-center hover-shadow">
                    <div class="card-body py-5">
                        <i class="fa-solid fa-comments fa-3x text-secondary mb-3"></i>
                        <h5 class="fw-semibold">Comments</h5>
                        <p class="text-secondary">Kelola komentar pengguna.</p>
                        <button class="btn btn-secondary btn-sm rounded-pill px-4">Lihat</button>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

{{-- Custom CSS --}}
<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }

    .hover-shadow:hover {
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    .dashboard-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        height: 100%;
    }
</style>
@endsection
