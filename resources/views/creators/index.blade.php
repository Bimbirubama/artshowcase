@extends('layouts.app')

@section('title', 'Daftar Kreator')

@section('content')
<style>
    .card-creators {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .table thead th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    tbody tr:hover {
        background-color: #f1f3f5;
        transition: background-color 0.2s ease-in-out;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 30px;
        padding: 0.375rem 1.25rem;
        font-weight: 600;
        box-shadow: 0 4px 6px rgba(40, 167, 69, 0.3);
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        box-shadow: 0 6px 10px rgba(33, 136, 56, 0.5);
    }

    .btn-warning, .btn-danger {
        border-radius: 30px;
        padding: 0.3rem 0.9rem;
        font-weight: 600;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.2s ease-in-out;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        box-shadow: 0 4px 8px rgba(224, 168, 0, 0.4);
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
        box-shadow: 0 4px 8px rgba(200, 35, 51, 0.4);
    }

    h2.text-primary {
        font-weight: 700;
        font-size: 1.8rem;
    }
</style>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-creators">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary mb-0">🧑‍🎨 Daftar Kreator</h2>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('creators.create') }}" class="btn btn-success">+ Tambah Kreator</a>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Bio</th>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <th style="width: 15%;" class="text-end">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($creators as $creator)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $creator->name }}</td>
                            <td>{{ $creator->email }}</td>
                            <td>{{ $creator->bio ?? '-' }}</td>
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <td class="text-end">
                                    <a href="{{ route('creators.edit', $creator->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                    <form action="{{ route('creators.destroy', $creator->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kreator ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->check() && auth()->user()->role === 'admin' ? 5 : 4 }}" class="text-center text-muted">
                                Belum ada kreator terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
