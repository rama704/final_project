<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmileCare Doctor</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Poppins', sans-serif; background:#f5f7fa; color:#333; min-height:100vh; }

        /* HEADER */
        header {
            position: fixed; top:0; left:0; right:0; z-index:1000;
            padding:18px 60px;
            display:flex; justify-content:space-between; align-items:center;
            background: linear-gradient(90deg, #7fbcbc, #6aa9a9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        }

        .logo { display:flex; align-items:center; gap:10px; font-size:16px; font-weight:600; color:white; letter-spacing:2px; }
        .logo svg { width:28px; height:28px; }

        nav { display:flex; gap:36px; }
        nav a {
            color:white; text-decoration:none; font-size:12px; font-weight:500; letter-spacing:1px; opacity:0.85;
            transition: all 0.3s ease;
        }
        nav a:hover, nav a.active { opacity:1; font-weight:600; border-bottom:2px solid rgba(255,255,255,0.9); padding-bottom:4px; }

        .header-right { display:flex; align-items:center; gap:22px; }
        .admin-greeting { text-align:right; color:white; }
        .admin-role { font-size:11px; opacity:0.85; text-transform:uppercase; letter-spacing:0.5px; }
        .admin-name { font-size:14px; font-weight:600; }

        .logout-btn {
            background: rgba(255,255,255,0.18); border:1px solid rgba(255,255,255,0.4); color:white;
            padding:8px 18px; font-size:12px; border-radius:20px; cursor:pointer; transition:0.3s;
        }
        .logout-btn:hover { background: rgba(255,255,255,0.28); transform: translateY(-1px); }

        /* MAIN CONTENT */
        .main-content { margin-top:110px; padding:40px 60px; max-width:1400px; margin-left:auto; margin-right:auto; }

        /* Buttons & inputs */
        .input { width:100%; padding:0.75rem; border:1px solid #d1d5db; border-radius:0.5rem; }
        .btn { padding:0.5rem 1rem; border-radius:0.5rem; display:inline-flex; align-items:center; cursor:pointer; border:none; }
        .btn-primary { background:#3b82f6; color:white; }
        .btn-secondary { background:#6b7280; color:white; }

        /* RESPONSIVE */
        @media (max-width:768px){
            header { padding:15px 20px; }
            nav { display:none; }
            .main-content { padding:20px; margin-top:90px; }
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
        </svg>
        SmileCare
    </div>

    <nav>
        <a href="{{ route('doctor.dashboard') }}" class="{{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('doctor.appointments') }}" class="{{ request()->routeIs('doctor.appointments') ? 'active' : '' }}">Appointments</a>
        <a href="{{ route('doctor.patients') }}" class="{{ request()->routeIs('doctor.patients') ? 'active' : '' }}">Patients</a>
    </nav>

    <div class="header-right">
        <div class="admin-greeting">
            <div class="admin-role">Doctor Panel</div>
            <div class="admin-name">{{ Auth::user()->name ?? 'Doctor' }}</div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</header>

<div class="main-content">
    @yield('content')
</div>

</body>
</html>
