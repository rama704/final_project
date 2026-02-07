<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SmileCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ===== Base Styles ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; color: #333; background: #f5f7fa; min-height: 100vh; }

        /* ===== Header ===== */
        header { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; padding: 20px 60px; display: flex; justify-content: space-between; align-items: center; background: rgba(169, 196, 196, 0.95); backdrop-filter: blur(10px); box-shadow: 0 2px 20px rgba(0,0,0,0.1);}
        .logo { font-size: 16px; font-weight: 600; color: white; letter-spacing: 2px; display: flex; align-items: center; gap: 10px; }
        nav { display: flex; gap: 40px; }
        nav a { color: white; text-decoration: none; font-size: 13px; font-weight: 500; text-transform: uppercase; opacity: 0.8; transition: opacity 0.3s; }
        nav a:hover, nav a.active { opacity: 1; font-weight: 600; }
        .header-right { display: flex; align-items: center; gap: 25px; }
        .admin-greeting { display: flex; flex-direction: column; align-items: flex-end; color: white; font-size: 13px; line-height: 1.4; padding: 5px 0; }
        .admin-role { opacity: 0.9; font-weight: 400; color: rgba(255,255,255,0.9); font-size: 11px; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 2px; }
        .admin-name { font-weight: 700; font-size: 14px; color: white; letter-spacing: 0.5px; }
        .logout-btn { color: white; text-decoration: none; font-size: 12px; font-weight: 600; text-transform: uppercase; padding: 8px 18px; background: rgba(255,255,255,0.15); border-radius: 20px; border: 1px solid rgba(255,255,255,0.4); cursor: pointer; transition: all 0.3s ease; }
        .logout-btn:hover { background: rgba(255,255,255,0.25); transform: translateY(-2px); }

        /* ===== Main Content ===== */
        .main-content { margin-top: 100px; padding: 40px 60px; max-width: 1400px; margin-left: auto; margin-right: auto; }
        .page-header { margin-bottom: 40px; }
        .page-title { font-size: 36px; font-weight: 300; color: #333; margin-bottom: 10px; }
        .page-subtitle { color: #666; font-size: 14px; font-weight: 400; }

        /* ===== Stats Grid ===== */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px; margin-bottom: 50px; }
        .stat-card { background: white; border-radius: 20px; padding: 35px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); transition: all 0.3s ease; position: relative; overflow: hidden; }
        .stat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(135deg,#A9C4C4,#96B1B1); transform: scaleX(0); transition: transform 0.3s ease; }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0,0,0,0.12);}
        .stat-card:hover::before { transform: scaleX(1);}
        .stat-icon { width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; }
        .stat-card.patients .stat-icon { background: linear-gradient(135deg,#e3f2fd,#bbdefb); color: #1976d2; }
        .stat-card.doctors .stat-icon { background: linear-gradient(135deg,#f3e5f5,#e1bee7); color: #7b1fa2; }
        .stat-card.appointments .stat-icon { background: linear-gradient(135deg,#e8f5e9,#c8e6c9); color: #388e3c; }
        .stat-card.users .stat-icon { background: linear-gradient(135deg,#fff3e0,#ffe0b2); color: #f57c00; }
        .stat-label { color:#666; font-size:13px; text-transform:uppercase; letter-spacing:1px; margin-bottom:10px; font-weight:500; }
        .stat-number { font-size:42px; font-weight:700; color:#333; line-height:1; margin-bottom:5px; }
        .stat-info { color:#999; font-size:12px; margin-top:15px; padding-top:15px; border-top:1px solid #f0f0f0; }

        /* ===== Quick Actions ===== */
        .quick-actions { background:white; border-radius:20px; padding:35px; box-shadow:0 10px 30px rgba(0,0,0,0.08); margin-bottom:30px; }
        .section-title { font-size:18px; font-weight:600; color:#333; margin-bottom:25px; text-transform:uppercase; letter-spacing:1px; }
        .action-buttons { display:grid; grid-template-columns:repeat(4,1fr); gap:20px; }
        .action-btn { background:linear-gradient(135deg,#f8f9fa,#e9ecef); border:2px solid #e0e0e0; border-radius:15px; padding:25px 20px; text-align:center; text-decoration:none; color:#333; transition: all 0.3s ease; display:flex; flex-direction:column; align-items:center; gap:12px;}
        .action-btn:hover { background:linear-gradient(135deg,#A9C4C4,#96B1B1); border-color:#A9C4C4; color:white; transform:translateY(-3px); box-shadow:0 8px 20px rgba(169,196,196,0.3);}
        .action-btn span { font-size:13px; font-weight:600; letter-spacing:0.5px; }

        /* ===== Recent Activity ===== */
        .recent-section { display:grid; grid-template-columns:repeat(2,1fr); gap:30px;}
        .activity-card { background:white; border-radius:20px; padding:35px; box-shadow:0 10px 30px rgba(0,0,0,0.08);}
        .activity-list { list-style:none;}
        .activity-item { padding:20px; border-bottom:1px solid #f0f0f0; display:flex; align-items:center; gap:15px; transition: background 0.3s ease; }
        .activity-item:last-child { border-bottom:none;}
        .activity-item:hover { background:#f8f9fa; border-radius:10px;}
        .activity-icon { width:40px; height:40px; border-radius:10px; background: linear-gradient(135deg,#A9C4C4,#96B1B1); display:flex; align-items:center; justify-content:center; flex-shrink:0;}
        .activity-details { flex:1; }
        .activity-title { font-size:14px; font-weight:600; color:#333; margin-bottom:4px;}
        .activity-time { font-size:12px; color:#999;}
        .view-all-btn { display:inline-block; margin-top:20px; color:#A9C4C4; text-decoration:none; font-size:13px; font-weight:600; text-transform:uppercase; letter-spacing:1px; transition: all 0.3s ease;}
        .view-all-btn:hover { color:#96B1B1; transform:translateX(5px); }

        /* ===== Responsive ===== */
        @media (max-width:1200px){.stats-grid, .action-buttons{grid-template-columns:repeat(2,1fr);}}
        @media (max-width:992px){.recent-section{grid-template-columns:1fr;}}
        @media (max-width:768px){header{padding:15px 20px;} nav{gap:15px;} nav a{font-size:11px;} .main-content{margin-top:80px; padding:20px;} .stats-grid{grid-template-columns:1fr; gap:20px;} .action-buttons{grid-template-columns:1fr;}}
        @media (max-width:480px){.page-title{font-size:28px;} .stat-number{font-size:32px;}}
    </style>
</head>
<body>

<header>
    <div class="logo">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/></svg>
        SmileCare
    </div>
    <nav>
@if($user->role === 'admin')
    <a href="{{ route('admin.dashboard') }}" class="active">DASHBOARD</a>
    <a href="{{ route('admin.patients.index') }}">PATIENTS</a>
@elseif($user->role === 'doctor')
    <a href="{{ route('doctor.dashboard') }}" class="active">DASHBOARD</a>
    <a href="{{ route('doctor.patients.index') }}">PATIENTS</a>
@endif

        @if($user->role == 'admin')
            <a href="{{ route('doctors.index') }}">DOCTORS</a>
            <a href="{{ route('appointments.index') }}">APPOINTMENTS</a>
            <a href="#">REPORTS</a>
        @else
            <a href="{{ route('appointments.index') }}">MY APPOINTMENTS</a>
        @endif
    </nav>
    <div class="header-right">
        <div class="admin-greeting">
            <span class="admin-role">{{ ucfirst($user->role) }} Panel</span>
            <span class="admin-name">{{ $user->name }}</span>
        </div>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">LOGOUT</button>
        </form>
    </div>
</header>

<div class="main-content">
    <div class="page-header">
        <h1 class="page-title">Dashboard Overview</h1>
        <p class="page-subtitle">Welcome back! Here's what's happening today.</p>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card patients">
            <div class="stat-icon">...</div>
            <div class="stat-label">Total Patients</div>
            <div class="stat-number">{{ $stats['patients'] }}</div>
            <div class="stat-info">Registered in system</div>
        </div>

        @if($user->role == 'admin')
        <div class="stat-card doctors">
            <div class="stat-icon">...</div>
            <div class="stat-label">Total Doctors</div>
            <div class="stat-number">{{ $stats['doctors'] }}</div>
            <div class="stat-info">Active medical staff</div>
        </div>

        <div class="stat-card users">
            <div class="stat-icon">...</div>
            <div class="stat-label">Total Users</div>
            <div class="stat-number">{{ $stats['users'] }}</div>
            <div class="stat-info">System users</div>
        </div>
        @endif

        <div class="stat-card appointments">
            <div class="stat-icon">...</div>
            <div class="stat-label">Total Appointments</div>
            <div class="stat-number">{{ $stats['appointments'] }}</div>
            <div class="stat-info">All time bookings</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h3 class="section-title">Quick Actions</h3>
        <div class="action-buttons">
@if($user->role === 'admin')
    <a href="{{ route('admin.patients.create') }}" class="action-btn">
        <span>Add New Patient</span>
    </a>
@elseif($user->role === 'doctor')
    <a href="{{ route('doctor.patients.create') }}" class="action-btn">
        <span>Add New Patient</span>
    </a>
@endif
            <a href="{{ route('appointments.create') }}" class="action-btn"><span>New Appointment</span></a>
            @if($user->role == 'admin')
                <a href="{{ route('doctors.create') }}" class="action-btn"><span>Manage Doctors</span></a>
                <a href="#" class="action-btn"><span>View Reports</span></a>
            @endif
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="recent-section">
        <div class="activity-card">
            <h3 class="section-title">Recent Appointments</h3>
            <ul class="activity-list">
                @foreach($appointments as $appointment)
                    <li class="activity-item">
                        <div class="activity-icon">...</div>
                        <div class="activity-details">
                            <div class="activity-title">{{ $appointment->patient->full_name ?? 'Unknown' }} - {{ $appointment->doctor->name ?? 'Unknown' }}</div>
                            <div class="activity-time">{{ $appointment->appointment_date->format('M d, Y') }} at {{ $appointment->appointment_time }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('appointments.index') }}" class="view-all-btn">View All Appointments →</a>
        </div>

        <div class="activity-card">
            <h3 class="section-title">Recent Patients</h3>
            <ul class="activity-list">
                @foreach($recentPatients as $patient)
                    <li class="activity-item">
                        <div class="activity-icon">...</div>
                        <div class="activity-details">
                            <div class="activity-title">New patient registered</div>
                            <div class="activity-time">{{ $patient->full_name }} - {{ $patient->created_at->diffForHumans() }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('admin.patients.index') }}" class="view-all-btn">View All Patients →</a>
        </div>
    </div>
</div>

</body>
</html>
