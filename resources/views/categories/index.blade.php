@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<style>
    .table thead {
        background-color: #f0f4f8;
    }

    .card {
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border-radius: 10px;
    }
</style>

<div class="container mt-4">
    
    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Judul dan tombol tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary mb-0">📂 Daftar Kategori</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-success">+ Tambah Kategori</a>
    </div>

    {{-- Tabel kategori --}}
    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-end">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
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
