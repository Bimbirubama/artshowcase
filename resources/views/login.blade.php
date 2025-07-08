@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f0f2f5;
    }

    .login-card {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        padding: 40px;
        animation: fadeIn 0.6s ease;
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

    .form-control:focus {
        border-color: #6c5ce7;
        box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
    }

    .login-title {
        font-weight: 600;
        color: #2d3436;
    }
</style>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-5">
        <div class="login-card">
            <h3 class="text-center login-title mb-4">🔐 Selamat Datang</h3>

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
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                    </div>
                </div>

                {{-- Password Input --}}
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="btn btn-primary w-100 fw-semibold">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
