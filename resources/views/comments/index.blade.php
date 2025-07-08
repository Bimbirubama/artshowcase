@extends('layouts.app')

@section('title', 'Daftar Komentar')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4"><i class="bi bi-chat-dots me-2 text-primary"></i> Daftar Komentar</h3>

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
                    <th></th>
                    <th>Nama</th>
                    <th>Komentar</th>
                    <th>Karya Seni</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
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
                                <a href="{{ route('artworks.show', $comment->artwork->id) }}" target="_blank">
                                    {{ $comment->artwork->title }}
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $comment->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
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
@endsection
