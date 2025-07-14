@extends('layouts.app')

@section('title', 'Daftar Komentar')

@section('content')
<style>
    .card-comments {
        background: rgba(255, 255, 255, 0.96);
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .table th {
        background-color: #f8f9fa;
    }

    .table td, .table th {
        vertical-align: middle !important;
    }

    .table thead th {
        font-weight: 600;
    }

    .btn-danger {
        background-color: #c0392b;
        border-color: #c0392b;
    }

    .btn-danger:hover {
        background-color: #a93226;
        border-color: #a93226;
    }

    .title-icon {
        font-size: 1.5rem;
        color: #272829;
    }
</style>

<div class="container mt-4">
    <div class="card card-comments">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">
                <i class="bi bi-chat-dots title-icon me-2"></i>
                Daftar Komentar
            </h4>
        </div>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel komentar --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Karya Seni</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $index => $comment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                @if ($comment->artwork)
                                    <a href="{{ route('artworks.show', $comment->artwork->id) }}" target="_blank" class="text-decoration-none">
                                        {{ $comment->artwork->title }}
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $comment->created_at->format('d M Y H:i') }}</td>
                            <td class="text-center">
                              @if(auth()->check() && auth()->user()->role === 'admin')

                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus komentar ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada komentar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
