@extends('layouts.app')

@section('title', $artwork->title)

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/c.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Poppins', sans-serif;
    }

    .overlay-bg {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .btn-dark-custom {
        background-color: #272829;
        border-color: #272829;
        color: white;
    }

    .btn-dark-custom:hover {
        background-color: #1f1f20;
        border-color: #1f1f20;
        color: white;
    }

    .section-title {
        font-weight: 600;
        font-size: 1.3rem;
        color: #2d3436;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 600;
    }
</style>

<div class="container mt-4">
    {{-- Detail Karya --}}
    <div class="overlay-bg mb-4">
        <div class="row g-4 align-items-center">
            <div class="col-md-5">
                @if($artwork->image)
                    <img src="{{ asset('storage/' . $artwork->image) }}"
                         class="img-fluid rounded"
                         style="width: 100%; max-height: 350px; object-fit: cover;"
                         alt="{{ $artwork->title }}">
                @else
                    <img src="https://via.placeholder.com/400x300?text=No+Image"
                         class="img-fluid rounded"
                         alt="No Image">
                @endif
            </div>
            <div class="col-md-7">
                <h3 class="card-title mb-2">{{ $artwork->title }}</h3>
                <p><strong>Kreator:</strong> {{ $artwork->creator->name }}</p>
                <p><strong>Kategori:</strong> {{ $artwork->category->name }}</p>
                <p class="text-muted">{{ $artwork->description }}</p>
            </div>
        </div>
    </div>

    {{-- Komentar Form --}}
    <div class="overlay-bg mb-4">
        <h5 class="section-title mb-3">
            <i class="bi bi-chat-left-text me-2 text-primary"></i> Tinggalkan Komentar
        </h5>

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

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="artwork_id" value="{{ $artwork->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Nama Anda</label>
                <input type="text" name="name" id="name"
                       class="form-control" value="{{ old('name') }}"
                       placeholder="Masukkan nama Anda" required>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Komentar</label>
                <textarea name="comment" id="comment" rows="4"
                          class="form-control"
                          placeholder="Tulis komentar Anda..." required>{{ old('comment') }}</textarea>
            </div>

            <button type="submit" class="btn btn-dark-custom">
                <i class="bi bi-send me-1"></i> Kirim Komentar
            </button>
        </form>
    </div>

    {{-- Daftar Komentar --}}
    @if($artwork->comments->count())
        <div class="overlay-bg">
            <h5 class="section-title mb-3">
                <i class="bi bi-chat-dots me-2 text-secondary"></i> Komentar Pengunjung
            </h5>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artwork->comments->sortByDesc('created_at') as $index => $comment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{!! nl2br(e($comment->comment)) !!}</td>
                                <td>{{ $comment->created_at->format('d M Y H:i') }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
