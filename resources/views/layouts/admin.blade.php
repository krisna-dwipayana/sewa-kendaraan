<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RentalKu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f3f4f6; /* Abu-abu sangat terang */
            display: flex;
            height: 100vh;
            overflow: hidden;
            color: #1f2937; /* Teks default abu-abu gelap */
        }

        /* ─── SCROLLBAR ─────────────────────────── */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(59,130,246,0.25); border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(59,130,246,0.5); }

        /* ─── SIDEBAR ────────────────────────────── */
        .sidebar {
            width: 240px;
            flex-shrink: 0;
            background: #ffffff; /* Sidebar putih bersih */
            border-right: 1px solid #e5e7eb; /* Border halus */
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar-logo {
            padding: 22px 20px 18px;
            border-bottom: 1px solid #e5e7eb;
            flex-shrink: 0;
        }
        .sidebar-logo-text {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1;
        }
        .sidebar-logo-text .brand-blue { color: #2563eb; } /* Biru lebih terang */
        .sidebar-logo-text .brand-dark { color: #111827; } /* Hitam pekat */
        .sidebar-logo-sub {
            font-size: 10px;
            color: #6b7280;
            margin-top: 3px;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* scrollable nav area */
        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 14px 10px;
            scrollbar-width: thin;
            scrollbar-color: rgba(59,130,246,0.2) transparent;
        }

        .nav-section { margin-bottom: 22px; }
        .nav-section-label {
            font-size: 10px;
            font-weight: 700;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 0 12px;
            margin-bottom: 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            color: #4b5563; /* Abu-abu medium */
            text-decoration: none;
            transition: all 0.18s ease;
            position: relative;
            margin-bottom: 2px;
            border: 1px solid transparent;
        }
        .nav-link:hover {
            background: #f9fafb;
            color: #111827;
            border-color: #f3f4f6;
        }
        .nav-link.active {
            background: #eff6ff; /* Latar biru sangat muda */
            color: #2563eb; /* Teks biru utama */
            border-color: #dbeafe;
        }
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 22%; bottom: 22%;
            width: 3px;
            background: #2563eb;
            border-radius: 0 3px 3px 0;
        }
        .nav-link svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            opacity: 0.7;
        }
        .nav-link.active svg { opacity: 1; }
        .nav-link span.nav-text { flex: 1; }

        .nav-badge {
            font-size: 10px;
            font-weight: 700;
            padding: 1px 7px;
            border-radius: 99px;
            background: #dbeafe;
            color: #1d4ed8;
            line-height: 1.6;
        }
        .nav-badge.warn { background: #fef3c7; color: #b45309; }
        .nav-badge.danger { background: #fee2e2; color: #b91c1c; }

        /* user profile at bottom */
        .sidebar-footer {
            padding: 12px 10px;
            border-top: 1px solid #e5e7eb;
            flex-shrink: 0;
        }
        .user-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            border-radius: 9px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
        }
        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }
        .user-name { font-size: 12px; font-weight: 700; color: #111827; }
        .user-role { font-size: 10px; color: #6b7280; font-weight: 500; }

        /* ─── MAIN AREA ───────────────────────────── */
        .main-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: #f8fafc; /* Latar belakang area konten abu-abu kebiruan pucat */
        }

        /* TOPBAR */
        .topbar {
            height: 60px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            border-bottom: 1px solid #e5e7eb;
            background: #ffffff; /* Topbar putih bersih */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.02);
        }
        .topbar-left { display: flex; align-items: center; gap: 10px; }
        .topbar-page-title {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
        }
        .topbar-breadcrumb {
            font-size: 13px;
            color: #6b7280;
            font-weight: 500;
        }
        .topbar-divider {
            width: 1px;
            height: 16px;
            background: #d1d5db;
        }

        .topbar-right { display: flex; align-items: center; gap: 8px; }

        .topbar-greeting {
            font-size: 13px;
            color: #6b7280;
            font-weight: 500;
            margin-right: 4px;
        }
        .topbar-greeting strong { color: #111827; font-weight: 700; }

        .topbar-icon-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #4b5563;
            transition: all 0.18s;
            position: relative;
        }
        .topbar-icon-btn:hover {
            background: #e5e7eb;
            color: #111827;
        }
        .topbar-icon-btn svg { width: 16px; height: 16px; }
        .notif-dot {
            position: absolute;
            top: 6px; right: 6px;
            width: 6px; height: 6px;
            background: #ef4444;
            border-radius: 50%;
            border: 1.5px solid #ffffff;
        }

        .logout-form { display: inline; }
        .logout-btn {
            padding: 6px 14px;
            background: #fee2e2;
            border: 1px solid #fca5a5;
            border-radius: 8px;
            color: #dc2626;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.18s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .logout-btn:hover {
            background: #fecaca;
            border-color: #f87171;
            color: #b91c1c;
        }

        /* CONTENT */
        .content-area {
            flex: 1;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 28px;
        }

        /* ─── ANIMATIONS ─────────────────────────── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .content-area > * {
            animation: fadeInUp 0.3s ease both;
        }
    </style>
</head>
<body>

    {{-- ═══════════════════════════════════════════ --}}
    {{-- SIDEBAR --}}
    {{-- ═══════════════════════════════════════════ --}}
    <aside class="sidebar">

        {{-- Logo --}}
        <div class="sidebar-logo">
            <div class="sidebar-logo-text">
                <span class="brand-blue">Rental</span><span class="brand-dark">Ku</span>
            </div>
            <div class="sidebar-logo-sub">Fleet Management</div>
        </div>

        {{-- Scrollable Nav --}}
        <nav class="sidebar-nav">

            {{-- UTAMA --}}
            <div class="nav-section">
                <div class="nav-section-label">Utama</div>

                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="nav-text">Dashboard</span>
                </a>
            </div>

            {{-- ARMADA --}}
            <div class="nav-section">
                <div class="nav-section-label">Armada</div>

                <a href="{{ route('admin.kendaraan') }}"
                   class="nav-link {{ request()->routeIs('admin.kendaraan*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2-2m8 0H5m8 0l2 2M9 7h10l2 5H9V7z"/>
                    </svg>
                    <span class="nav-text">Kelola Armada</span>
                </a>
            </div>

            {{-- TRANSAKSI --}}
            <div class="nav-section">
                <div class="nav-section-label">Transaksi</div>

                <a href="{{ route('admin.transaksi') }}"
                   class="nav-link {{ request()->routeIs('admin.transaksi*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span class="nav-text">Daftar Sewa</span>
                </a>
            </div>

            {{-- LAPORAN --}}
            <div class="nav-section">
                <div class="nav-section-label">Laporan</div>

                <a href="{{ route('admin.laporan') }}"
                   class="nav-link {{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z" />
                    </svg>
                    <span class="nav-text">Laporan Pendapatan</span>
                </a>
            </div>

        </nav>

        {{-- User card at bottom --}}
        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                </div>
                <div>
                    <div class="user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="user-role">Super Admin</div>
                </div>
            </div>
        </div>

    </aside>

    {{-- ═══════════════════════════════════════════ --}}
    {{-- MAIN CONTENT --}}
    {{-- ═══════════════════════════════════════════ --}}
    <div class="main-wrap">

        {{-- Topbar --}}
        <header class="topbar">
            <div class="topbar-left">
                {{-- Dynamic page title via section --}}
                <span class="topbar-page-title">@yield('page-title', 'Ringkasan Sistem')</span>
                <div class="topbar-divider"></div>
                <span class="topbar-breadcrumb">RentalKu Admin</span>
            </div>

            <div class="topbar-right">
                <span class="topbar-greeting">Halo, <strong>{{ auth()->user()->name ?? 'Admin' }}</strong></span>

                {{-- Notif bell --}}
                <div class="topbar-icon-btn" title="Notifikasi">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="notif-dot"></span>
                </div>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </header>

        {{-- Page content --}}
        <main class="content-area">
            @yield('content')
        </main>

    </div>

</body>
</html>