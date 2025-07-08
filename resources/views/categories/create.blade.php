@extends('layouts.app')

@section('content')
    <h2>Tambah Kategori</h2>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection