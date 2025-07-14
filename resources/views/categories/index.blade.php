@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
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
        border: none;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }

    .btn {
        border-radius: 8px;
        padding: 6px 14px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-warning {
        background-color: #f1c40f;
        border: none;
        color: #fff;
    }

    .btn-warning:hover {
        background-color: #d4ac0d;
    }

    .btn-danger {
        background-color: #e74c3c;
        border: none;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .btn-success {
        background-color: #27ae60;
        border: none;
        color: #fff;
        font-weight: 700;
    }

    .btn-success:hover {
        background-color: #1e8449;
    }

    .alert {
        border-radius: 12px;
    }

    h2.text-primary {
        font-weight: 700;
        font-size: 1.75rem;
    }
</style>

<div class="container mt-4">
    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Card utama --}}
    <div class="card shadow-sm">
        {{-- Judul dan tombol tambah --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary mb-0">📂 Daftar Kategori</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-success">+ Tambah Kategori</a>
        </div>

        {{-- Tabel kategori --}}
        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>Nama Kategori</th>
                        <th style="width: 15%;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-end">
                             @if(auth()->check() && auth()->user()->role === 'admin')

                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Belum ada kategori ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
