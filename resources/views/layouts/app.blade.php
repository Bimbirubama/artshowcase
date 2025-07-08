<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtShowcase - @yield('title')</title>
    <!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .header-banner {
            background: linear-gradient(135deg, #6c5ce7, #00cec9);
            color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f8;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            background-color: #2c3e50;
            padding-top: 30px;
            color: #fff;
            transform: translateX(-100%);
            animation: slideIn 0.6s ease-out forwards;
        }

        @keyframes slideIn {
            to {
                transform: translateX(0);
            }
        }

        .sidebar a,
        .sidebar form button {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            border: none;
            background: none;
            text-align: left;
            width: 100%;
        }

        .sidebar a:hover,
        .sidebar form button:hover {
            background-color: #34495e;
            color: #fff;
            transform: translateX(5px);
        }

        .main-content {
            margin-left: 220px;
            padding: 30px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards;
            animation-delay: 0.4s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="sidebar d-flex flex-column justify-content-between">
        {{-- Sidebar Atas --}}
        <div>
            <h4 class="text-center">🎨 ArtShowcase</h4>
            <hr class="bg-light">

            {{-- Tautan Navigasi --}}
            @auth
                <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                <a href="{{ route('artworks.index') }}"><i class="bi bi-images me-2"></i>Galeri</a>
                <a href="{{ route('categories.index') }}"><i class="bi bi-tags me-2"></i>Kategori</a>
                <a href="{{ route('creators.index') }}"><i class="bi bi-person-badge me-2"></i>Kreator</a>
                <a href="{{ route('comments.index') }}"><i class="bi bi-chat-left-text me-2"></i>Ulasan</a>
            @else
                <a href="{{ route('dashboard.public') }}"><i class="bi bi-grid me-2"></i>Dashboard</a>
                <a href="{{ route('galery') }}"><i class="bi bi-images me-2"></i>Galeri</a>
                <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i>Masuk</a>
            @endauth
        </div>

        {{-- Sidebar Bawah (User Info & Logout) --}}
        @auth
            <div class="border-top pt-3 px-3 text-light small">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="button" class="btn btn-link text-light" onclick="confirmLogout()">
                            <i class="bi bi-box-arrow-right me-2"></i> 
                        </button>
                    </form>
                </div>
            </div>
        @endauth
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        @yield('content')
    </div>

    {{-- Script Logout --}}
    <script>
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
