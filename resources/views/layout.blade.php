<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Bangunan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f1f3f5;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            font-family: "Segoe UI", sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background-color: #1f1f1f;
            color: #dee2e6;
            flex-shrink: 0;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .sidebar h4 {
            color: #adb5bd;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }

        .sidebar a {
            color: #dee2e6;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 6px;
            display: block;
            transition: 0.2s ease;
        }

        .sidebar a:hover {
            background-color: #343a40;
            color: #f8f9fa;
        }

        .sidebar .active {
            background-color: #2f3235;
            color: #f8f9fa;
            font-weight: 600;
        }

        .btn-back {
            background-color: #adb5bd;
            color: #000;
            font-weight: 600;
            border: none;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .btn-back:hover {
            background-color: #ced4da;
            color: #000;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
        }

        /* Tombol menu mobile */
        .menu-toggle {
            display: none;
            background-color: #1f1f1f;
            color: #dee2e6;
            border: none;
            padding: 12px 18px;
            font-size: 20px;
            width: 100%;
            text-align: left;
        }

        /* Responsif untuk HP / Tablet */
        @media (max-width: 992px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                transform: translateX(-100%);
                box-shadow: 3px 0 8px rgba(0,0,0,0.4);
                z-index: 1000;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .menu-toggle {
                display: block;
            }
            .main-content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    {{-- Tombol Menu (Mobile) --}}
    <button class="menu-toggle" id="menuToggle">☰ Menu</button>

    {{-- Sidebar --}}
    <div class="sidebar" id="sidebar">
        <h4>🏗️ Toko Bangunan</h4>

        <!-- @if (!request()->routeIs('dashboard'))
            <a href="{{ route('dashboard') }}" class="btn btn-back w-100 text-center mb-3">⬅️ Kembali</a>
        @endif -->

        <a href="{{ route('dashboard') }}" 
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('barang.index') }}" 
           class="{{ request()->routeIs('barang.*') ? 'active' : '' }}">
            📦 Kelola Barang
        </a>

        <a href="{{ route('penjualan.index') }}" 
           class="{{ request()->routeIs('penjualan.*') ? 'active' : '' }}">
            🛒 Penjualan
        </a>

        <a href="{{ route('utang.index') }}" 
           class="{{ request()->routeIs('utang.*') ? 'active' : '' }}">
            💰 Utang
        </a>
    </div>

    {{-- Konten utama --}}
    <div class="main-content">
        @yield('content')
    </div>

    <script>
        // Toggle sidebar saat di HP
        const toggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');

        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });

        // Tutup sidebar otomatis setelah klik link (HP)
        sidebar.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 992) sidebar.classList.remove('show');
            });
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
