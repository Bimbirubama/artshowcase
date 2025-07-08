@extends('layouts.app')

@section('title', $artwork->title)

@section('content')
<div class="container mt-4">

    {{-- Kartu Detail Artwork --}}
    <div class="card shadow rounded">
        <div class="row g-0">
            <div class="col-md-5">
                @if($artwork->image)
                    <img src="{{ asset('storage/' . $artwork->image) }}"
                         class="img-fluid rounded-start"
                         style="width: 100%; height: 100%; max-height: 400px; object-fit: cover;"
                         alt="{{ $artwork->title }}">
                @else
                    <img src="https://via.placeholder.com/400x300?text=No+Image"
                         class="img-fluid rounded-start"
                         style="width: 100%; height: 100%; max-height: 400px; object-fit: cover;"
                         alt="No Image">
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title fw-semibold">{{ $artwork->title }}</h3>
                    <p class="mb-2"><strong>Kreator:</strong> {{ $artwork->creator->name }}</p>
                    <p class="mb-2"><strong>Kategori:</strong> {{ $artwork->category->name }}</p>
                    <p class="text-muted">{{ $artwork->description }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Komentar --}}
    <hr class="mt-5">
    <h5 id="comment-form" class="mb-3">
        <i class="bi bi-chat-left-text me-1 text-primary"></i> Tinggalkan Komentar
    </h5>

    {{-- Error Validasi --}}
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

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('comments.store') }}" class="bg-white p-4 rounded shadow-sm mt-3 border">
        @csrf
        <input type="hidden" name="artwork_id" value="{{ $artwork->id }}">

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Nama Anda</label>
            <input type="text" name="name" id="name"
                   class="form-control" value="{{ old('name') }}"
                   placeholder="Masukkan nama Anda" required>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label fw-semibold">Komentar</label>
            <textarea name="comment" id="comment" rows="4"
                      class="form-control"
                      placeholder="Tulis komentar Anda di sini..." required>{{ old('comment') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-send me-1"></i> Kirim Komentar
        </button>
    </form>

    {{-- Daftar Komentar --}}
    @if($artwork->comments->count())
        <div class="mt-5">
            <h5><i class="bi bi-chat-dots me-1 text-secondary"></i> Komentar</h5>

            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artwork->comments->sortByDesc('created_at') as $index => $comment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{!! nl2br(e($comment->comment)) !!}</td>
                                <td>{{ $comment->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    @endif

</div>
@endsection
