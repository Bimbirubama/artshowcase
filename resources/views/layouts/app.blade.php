<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtShowcase - @yield('title')</title>
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
    <div class="sidebar">
        <h4 class="text-center">ArtShowcase</h4>
        <hr class="bg-light">

        {{-- Tampilkan untuk semua (termasuk guest) --}}

        @auth
            {{-- Tampilkan hanya jika sudah login --}}
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('artworks.index') }}">Galeri</a>
            <a href="{{ route('categories.index') }}">Kategori</a>
            <a href="{{ route('creators.index') }}">Kreator</a>
            <a href="{{ route('comments.index') }}">Ulasan</a>

            <div class="px-3 text-light small mt-3">
                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
            </div>
            {{-- <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
        </form> --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="button" class="btn btn-link text-light" onclick="confirmLogout()">Logout</button>
            </form>
        @else
            {{-- Tampilkan jika belum login --}}
            <a href="{{ route('dashboard.public') }}">Galeri</a>
            <a href="{{ route('login') }}">Masuk</a>

        @endauth
    </div>


    {{-- Main Content --}}
    <div class="main-content">
        @yield('content')
    </div>
    <script>
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
