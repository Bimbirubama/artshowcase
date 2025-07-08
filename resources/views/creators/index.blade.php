@extends('layouts.app')

@section('title', 'Daftar Kreator')

@section('content')
<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary mb-0">🧑‍🎨 Daftar Kreator</h2>
        <a href="{{ route('creators.create') }}" class="btn btn-success">+ Tambah Kreator</a>
    </div>

    <div class="card shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Bio</th>
                        <th style="width: 15%;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($creators as $creator)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $creator->name }}</td>
                            <td>{{ $creator->email }}</td>
                            <td>{{ $creator->bio ?? '-' }}</td>
                            <td class="text-end">
                                <a href="{{ route('creators.edit', $creator->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                                <form action="{{ route('creators.destroy', $creator->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kreator ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada kreator terdaftar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
