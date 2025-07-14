@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-image: url('{{ asset('images/c.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        color: #eee;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

   .login-card {
        background: rgba(34, 34, 34, 0.9);
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7);
        padding: 50px 60px;  /* padding lebih besar */
        width: 100%;
        max-width: 520px;    /* diperbesar dari 420px */
        min-height: 480px;   /* tambah tinggi minimum */
        animation: fadeIn 0.7s ease;
        color: #eee;
        border: 1px solid #555;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-control {
        background-color: #2b2b2b;
        border: 1px solid #555;
        color: #ddd;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .form-control::placeholder {
        color: #999;
    }
    .form-control:focus {
        background-color: #2b2b2b;
        border-color: #171331;
        box-shadow: 0 0 8px rgba(25, 24, 31, 0.7);
        color: #fff;
        outline: none;
    }

    .input-group-text {
        background-color: #3a3a3a;
        border: 1px solid #555;
        color: #bbb;
        font-size: 1.2rem;
    }

    .login-title {
        font-weight: 700;
        color: #ddd;
        margin-bottom: 2rem;
        text-align: center;
    }

    .btn-primary {
        background-color: #262629;
        border-color: #918f99;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #2e2d35;
        border-color: #2f2d3a;
    }

    .alert-danger {
        border-radius: 12px;
        background-color: #a94442;
        color: white;
        border: none;
    }
</style>

<div class="login-card">
    <h3 class="login-title">🔐 Selamat Datang</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email Input --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
            </div>
        </div>

        {{-- Password Input --}}
        <div class="mb-4">
            <label class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary w-100 fw-semibold">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </button>
    </form>
</div>
@endsection
