<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SmileCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background: #f5f7fa;
            min-height: 100vh;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(169, 196, 196, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 16px;
            font-weight: 600;
            color: white;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo svg {
            width: 30px;
            height: 30px;
        }

        nav {
            display: flex;
            gap: 40px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: opacity 0.3s;
        }

        nav a:hover,
        nav a.active {
            opacity: 1;
            font-weight: 600;
        }

        nav a {
            opacity: 0.8;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .admin-greeting {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            color: white;
            font-size: 13px;
            line-height: 1.4;
            padding: 5px 0;
        }

        .admin-role {
            opacity: 0.9;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.9);
            font-size: 11px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .admin-name {
            font-weight: 700;
            font-size: 14px;
            color: white;
            letter-spacing: 0.5px;
        }

        .logout-btn {
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 8px 18px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            margin-top: 100px;
            padding: 40px 60px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .page-header {
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 36px;
            font-weight: 300;
            color: #333;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: #666;
            font-size: 14px;
            font-weight: 400;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #A9C4C4, #96B1B1);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .stat-icon svg {
            width: 30px;
            height: 30px;
        }

        .stat-card.patients .stat-icon {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: #1976d2;
        }

        .stat-card.doctors .stat-icon {
            background: linear-gradient(135deg, #f3e5f5, #e1bee7);
            color: #7b1fa2;
        }

        .stat-card.appointments .stat-icon {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            color: #388e3c;
        }

        .stat-card.users .stat-icon {
            background: linear-gradient(135deg, #fff3e0, #ffe0b2);
            color: #f57c00;
        }

        .stat-label {
            color: #666;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 700;
            color: #333;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-info {
            color: #999;
            font-size: 12px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .action-btn {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            padding: 25px 20px;
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        .action-btn:hover {
            background: linear-gradient(135deg, #A9C4C4, #96B1B1);
            border-color: #A9C4C4;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(169, 196, 196, 0.3);
        }

        .action-btn svg {
            width: 28px;
            height: 28px;
            stroke-width: 2;
        }

        .action-btn span {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Recent Activity */
        .recent-section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .activity-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: background 0.3s ease;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-item:hover {
            background: #f8f9fa;
            border-radius: 10px;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #A9C4C4, #96B1B1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity-icon svg {
            width: 20px;
            height: 20px;
            stroke: white;
        }

        .activity-details {
            flex: 1;
        }

        .activity-title {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 12px;
            color: #999;
        }

        .view-all-btn {
            display: inline-block;
            margin-top: 20px;
            color: #A9C4C4;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .view-all-btn:hover {
            color: #96B1B1;
            transform: translateX(5px);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .action-buttons {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .recent-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
            }
            
            nav {
                gap: 15px;
            }
            
            nav a {
                font-size: 11px;
            }
            
            .main-content {
                margin-top: 80px;
                padding: 20px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .action-buttons {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 28px;
            }
            
            .stat-number {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z" />
            </svg>
            SmileCare
        </div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="active">DASHBOARD</a>
            <a href="{{ route('admin.patients.index') }}">PATIENTS</a>
            <a href="{{ route('admin.doctors.index') }}">DOCTORS</a>
            <a href="{{ route('admin.appointments.index') }}">APPOINTMENTS</a>
            <a href="#">REPORTS</a>
        </nav>
        
        <div class="header-right">
            <div class="admin-greeting">
                <span class="admin-role">Admin Panel</span>
                <span class="admin-name">{{ Auth::user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">LOGOUT</button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Dashboard Overview</h1>
            <p class="page-subtitle">Welcome back! Here's what's happening with your clinic today.</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <!-- Patients Card -->
            <div class="stat-card patients">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div class="stat-label">Total Patients</div>
                <div class="stat-number">{{ $stats['patients'] }}</div>
                <div class="stat-info">Registered in system</div>
            </div>

            <!-- Doctors Card -->
            <div class="stat-card doctors">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                        <line x1="12" y1="14" x2="12" y2="18"></line>
                        <line x1="10" y1="16" x2="14" y2="16"></line>
                    </svg>
                </div>
                <div class="stat-label">Total Doctors</div>
                <div class="stat-number">{{ $stats['doctors'] }}</div>
                <div class="stat-info">Active medical staff</div>
            </div>

            <!-- Appointments Card -->
            <div class="stat-card appointments">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </div>
                <div class="stat-label">Total Appointments</div>
                <div class="stat-number">{{ $stats['appointments'] }}</div>
                <div class="stat-info">All time bookings</div>
            </div>

            <!-- Users Card -->
            <div class="stat-card users">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <polyline points="17 11 19 13 23 9"></polyline>
                    </svg>
                </div>
                <div class="stat-label">Total Users</div>
                <div class="stat-number">{{ $stats['users'] }}</div>
                <div class="stat-info">System users</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h3 class="section-title">Quick Actions</h3>
            <div class="action-buttons">
                <a href="{{ route('admin.patients.create') }}" class="action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Add New Patient</span>
                </a>
                <a href="{{ route('admin.appointments.create') }}" class="action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="12" y1="18" x2="12" y2="12"></line>
                        <line x1="9" y1="15" x2="15" y2="15"></line>
                    </svg>
                    <span>New Appointment</span>
                </a>
                <a href="{{ route('admin.doctors.create') }}" class="action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>Manage Doctors</span>
                </a>
                <a href="#" class="action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                    </svg>
                    <span>View Reports</span>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-section">
            <div class="activity-card">
                <h3 class="section-title">Recent Appointments</h3>
                <ul class="activity-list">
                    @foreach($appointments as $appointment)
                        <li class="activity-item">
                            <div class="activity-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="activity-details">
                                <div class="activity-title">
                                    {{ $appointment->patient->full_name ?? 'Unknown Patient' }} - {{ $appointment->doctor->name ?? 'Unknown Doctor' }}
                                </div>
                                <div class="activity-time">
                                    {{ $appointment->appointment_date->format('M d, Y') }} at {{ $appointment->appointment_time }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('admin.appointments.index') }}" class="view-all-btn">View All Appointments →</a>
            </div>

            <div class="activity-card">
                <h3 class="section-title">Recent Patients</h3>
                <ul class="activity-list">
                    @foreach($recentPatients as $patient)
                        <li class="activity-item">
                            <div class="activity-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
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