<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ArtShowcase - @yield('title')</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url('{{ asset('images/c.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Poppins', sans-serif;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 220px;
        height: 100vh;
        background-color: #171718;
        color: #fff;
        padding: 1.5rem 1rem;
        z-index: 1000;
    }

    .sidebar a {
        display: block;
        padding: 0.5rem 0.75rem;
        color: #dcdcdc;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 0.5rem;
        transition: background-color 0.2s;
    }

    .sidebar a:hover {
        background-color: #272829;
        color: #fff;
    }

    .user-section {
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding-top: 1rem;
        margin-top: 1.5rem;
        font-size: 0.9rem;
    }

    .logout-btn {
        background: none;
        border: none;
        color: #f8d7da;
        cursor: pointer;
        font-size: 1.1rem;
    }

    .main-content {
        margin-left: 220px;
        padding: 2rem;
    }

    @media (max-width: 768px) {
        .sidebar {
            position: relative;
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 1rem;
        }

        .main-content {
            margin-left: 0;
            padding: 1rem;
        }

        .user-section {
            margin-top: 1rem;
            justify-content: center !important;
        }
    }
</style>

<body>
    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column justify-content-between">
        <div>
            <h4 class="text-center mb-3">ArtShowcase</h4>
            <hr class="bg-light">

            {{-- Navigation --}}
            @auth
                <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a href="{{ route('artworks.index') }}"><i class="bi bi-images"></i> Galeri</a>
                <a href="{{ route('categories.index') }}"><i class="bi bi-tags"></i> Kategori</a>
                <a href="{{ route('creators.index') }}"><i class="bi bi-person-badge"></i> Kreator</a>
                <a href="{{ route('comments.index') }}"><i class="bi bi-chat-left-text"></i> Ulasan</a>
            @else
                <a href="{{ route('dashboard.public') }}"><i class="bi bi-grid"></i> Dashboard</a>
                <a href="{{ route('galery') }}"><i class="bi bi-images"></i> Galeri</a>
                <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
            @endauth
        </div>

        {{-- User Info --}}
        @auth
            <div class="user-section text-light d-flex align-items-center justify-content-between">
                <span><i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="button" class="logout-btn" onclick="confirmLogout()">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        @endauth
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        @yield('content')
    </div>

    {{-- Logout Confirmation Script --}}
    <script>
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

    {{-- Bootstrap Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
