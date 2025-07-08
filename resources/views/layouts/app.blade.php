<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtShowcase - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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

    .sidebar a {
        color: #ddd;
        text-decoration: none;
        display: block;
        padding: 10px 20px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .sidebar a:hover {
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

    {{-- Sidebar --}}
    <div class="sidebar">
        <h4 class="text-center">ArtShowcase</h4>
        <hr class="bg-light">
         <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('artworks.index') }}">Galeri</a>
        <a href="{{ route('categories.index') }}">Kategori</a>
         <a href="{{ route('creators.index') }}">Kreator</a>
        <a href="{{ route('comments.index') }}">Ulasan</a>
        <a href="{{ route('admin.dashboard') }}">Masuk</a>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
