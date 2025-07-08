@extends('layouts.app')

@section('title', 'Galeri Karya Seni')

@section('content')
<div class="card shadow-sm border-0 mb-4" style="background-color:  #2c3e50;">
    <div class="card-body text-center">
        <h1 class="mb-0 fw-bold text-white">Galeri Karya Seni</h1>
        <p class="text-white-50">Temukan berbagai karya seni menarik di sini</p>
    </div>
</div>


{{-- Notifikasi sukses --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Galeri --}}
<div class="row">
    @forelse($artworks as $artwork)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow rounded-3 position-relative">

                {{-- Dropdown Tombol ⋮ --}}
                <div class="dropdown position-absolute top-0 end-0 m-2">
                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                  
                </div>

                {{-- Gambar --}}
                @if($artwork->image)
                    <img src="{{ asset('storage/' . $artwork->image) }}" class="card-img-top rounded-top" alt="{{ $artwork->title }}" style="height: 220px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top rounded-top" alt="No Image">
                @endif

                {{-- Konten --}}
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $artwork->title }}</h5>
                    <p class="card-text text-muted mb-2">
                        🧑‍🎨 <strong>Kreator:</strong> {{ $artwork->creator->name }}<br>
                        📁 <strong>Kategori:</strong> {{ $artwork->category->name }}
                    </p>

                    <div class="mt-auto d-flex gap-2">
                       <a href="{{ route('artworks.show', $artwork->id) }}"
   class="btn btn-sm text-white"
   style="background-color: #2c3e50; border-color: #2c3e50;">
   Lihat Detail
</a>

                        <a href="{{ route('artworks.show', $artwork->id) }}#comments-index" class="btn btn-sm btn-outline-secondary">Komentar</a>
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
