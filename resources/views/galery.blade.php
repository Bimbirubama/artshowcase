@extends('layouts.app')

@section('title', 'Galeri Publik')

@section('content')

{{-- FULLSCREEN BACKGROUND --}}
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
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
        height: 220px;
        object-fit: cover;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    .card-title {
        font-size: 1.1rem;
    }

    .card-text {
        font-size: 0.9rem;
    }

 .galeri-heading {
    background-color: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(6px);
    border-radius: 1rem;
    color: #2c2c2c;
    border: 1px solid #ddd;
}


</style>
<div class="card shadow-sm border-0 mb-4" style="background-color:  #18191a;">
    <div class="card-body text-center">
        <h1 class="mb-0 fw-bold text-white">Galeri Karya Seni</h1>
        <p class="text-white-50">Temukan berbagai karya seni menarik di sini</p>
    </div>
</div>


    <div class="row g-4">
        @foreach ($artworks as $artwork)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0">
                    @if ($artwork->image)
                        <img src="{{ asset('storage/' . $artwork->image) }}"
                             class="card-img-top"
                             alt="{{ $artwork->title }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title fw-semibold text-dark">
                            {{ $artwork->title }}
                        </h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($artwork->description, 100) }}
                        </p>
                        <a href="{{ route('artworks.show', $artwork->id) }}"
                           class="btn btn-sm btn-dark rounded-pill px-3">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
