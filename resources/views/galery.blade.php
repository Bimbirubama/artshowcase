@extends('layouts.app')

@section('title', 'Galeri Publik')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Galeri Publik</h3>
        <div class="row">
            @foreach ($artworks as $artwork)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($artwork->image)
                            <img src="{{ asset('storage/' . $artwork->image) }}" class="card-img-top" alt="{{ $artwork->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $artwork->title }}</h5>
                            <p class="card-text">{{ Str::limit($artwork->description, 100) }}</p>
                            <a href="{{ route('artworks.show', $artwork->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
