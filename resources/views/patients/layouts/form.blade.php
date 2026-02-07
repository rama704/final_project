<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Panel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f5f7fa; color: #333; min-height: 100vh; }
        header { position: fixed; top: 0; left: 0; right: 0; padding: 18px 60px; display: flex; justify-content: space-between; align-items: center; background: #4fa6a6; color: white; }
        nav { display: flex; gap: 24px; }
        nav a { color: white; text-decoration: none; font-size: 14px; opacity: 0.85; transition: 0.3s; }
        nav a.active, nav a:hover { opacity: 1; font-weight: 600; border-bottom: 2px solid white; padding-bottom: 2px; }
        .main-content { margin-top: 80px; padding: 30px 60px; max-width: 1200px; margin-left: auto; margin-right: auto; }
        .logout-btn { background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.4); color: white; padding: 6px 14px; border-radius: 20px; cursor: pointer; }
    </style>
</head>
<body>

<!-- HEADER -->
<header>
    <div class="logo">SmileCare</div>
    <nav>
        <a href="{{ route('patients.dashboard') }}" class="{{ request()->routeIs('patients.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('patients.appointments.index') }}" class="{{ request()->routeIs('patients.appointments.*') ? 'active' : '' }}">Appointments</a>
        <a href="{{ route('patients.profile') }}" class="{{ request()->routeIs('patients.profile') ? 'active' : '' }}">Profile</a>
    </nav>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>
</header>

<!-- CONTENT -->
<div class="main-content">
    @yield('content')
</div>

</body>
</html>
