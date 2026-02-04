<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - SmileCare</title>
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

        /* Header - نفس الـ header الحالي */
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
            margin-left: 130px;
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

        nav a:hover {
            opacity: 0.8;
        }

        /* User Greeting Styles */
        .user-greeting {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            color: white;
            font-size: 13px;
            line-height: 1.4;
            padding: 5px 0;
            cursor: default;
            transition: all 0.3s ease;
            min-width: 80px;
            text-align: right;
        }

        .hello-text {
            opacity: 0.9;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.9);
            font-size: 11px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .user-name {
            font-weight: 700;
            font-size: 14px;
            color: white;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 25px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 36px;
            font-weight: 300;
            color: #333;
        }

        .edit-profile-btn {
            background: #A9C4C4;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
        }

        .edit-profile-btn:hover {
            background: #96B1B1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(169, 196, 196, 0.3);
        }

        /* Profile Container */
        .profile-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 40px;
        }

        /* Profile Sidebar */
        .profile-sidebar {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            height: fit-content;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #A9C4C4, #96B1B1);
            border-radius: 50%;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
            font-weight: 300;
        }

        .patient-info {
            text-align: center;
            margin-bottom: 40px;
        }

        .patient-name {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .patient-email {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .patient-id {
            background: #f5f7fa;
            padding: 8px 15px;
            border-radius: 15px;
            font-size: 12px;
            color: #A9C4C4;
            font-weight: 600;
            display: inline-block;
        }

        /* Quick Stats */
        .quick-stats {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .stat-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .stat-label {
            color: #666;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            color: #A9C4C4;
            font-size: 20px;
            font-weight: 600;
        }

        /* Profile Sections */
        .profile-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .info-item {
            margin-bottom: 25px;
        }

        .info-label {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .info-value {
            color: #333;
            font-size: 16px;
            font-weight: 400;
            padding: 10px 15px;
            background: #f8f9fa;
            border-radius: 10px;
            min-height: 44px;
            display: flex;
            align-items: center;
        }

        /* Medical Info */
        .medical-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .medical-item {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 15px;
            border-left: 4px solid #A9C4C4;
        }

        .medical-title {
            color: #333;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .medical-content {
            color: #666;
            font-size: 14px;
            line-height: 1.7;
        }

        /* Empty State */
        .empty-state {
            color: #999;
            font-style: italic;
            padding: 15px;
            text-align: center;
            background: #f8f9fa;
            border-radius: 10px;
        }

        /* Success Message */
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-left: 4px solid #28a745;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .profile-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .profile-sidebar {
                display: grid;
                grid-template-columns: 200px 1fr;
                gap: 40px;
                align-items: center;
            }
            
            .quick-stats {
                flex-direction: row;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 992px) {
            .main-content {
                padding: 30px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .medical-info {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
            }
            
            nav {
                gap: 20px;
            }
            
            .main-content {
                margin-top: 80px;
                padding: 20px;
            }
            
            .page-header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .profile-sidebar {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .quick-stats {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 28px;
            }
            
            .profile-section {
                padding: 25px;
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
            <a href="{{ url('/') }}">HOME</a>
            <a href="{{ url('/patients/profile') }}" style="color: #fff; font-weight: 600;">MY PROFILE</a>
            
        </nav>
        
        <div class="header-right">
            <div class="user-greeting">
                <span class="hello-text">Hello,</span>
                <span class="user-name">{{ Auth::user()->name ?? 'Guest' }}</span>
            </div>
            <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                LOGOUT
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        @if(session('success'))
            <div class="alert-success">
                <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="page-header">
            <h1 class="page-title">My Profile</h1>
            <a href="{{ route('patients.profile.edit') }}" class="edit-profile-btn">Edit Profile</a>
        </div>

        <div class="profile-container">
            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="profile-avatar">
                    {{ strtoupper(substr($patient->full_name, 0, 1)) }}
                </div>
                <div class="patient-info">
                    <h2 class="patient-name">{{ $patient->full_name }}</h2>
                    <p class="patient-email">{{ $patient->email }}</p>
                    <span class="patient-id">ID: {{ str_pad($patient->id, 6, '0', STR_PAD_LEFT) }}</span>
                </div>
                
                <div class="quick-stats">
                    <div class="stat-item">
                        <span class="stat-label">Age</span>
                        <span class="stat-value">{{ $patient->age ?? '--' }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Gender</span>
                        <span class="stat-value">{{ ucfirst($patient->gender ?? '--') }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Last Visit</span>
                        <span class="stat-value">{{ $patient->last_dental_visit ? $patient->last_dental_visit->format('M Y') : '--' }}</span>
                    </div>
                </div>
            </div>

            <!-- Main Profile Info -->
            <div class="profile-main">
                <!-- Personal Information -->
                <div class="profile-section">
                    <h3 class="section-title">Personal Information</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Full Name</div>
                            <div class="info-value">{{ $patient->full_name }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Date of Birth</div>
                            <div class="info-value">{{ $patient->date_of_birth ? $patient->date_of_birth->format('F d, Y') : 'Not specified' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value">{{ $patient->phone ?? 'Not specified' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Gender</div>
                            <div class="info-value">{{ ucfirst($patient->gender ?? 'Not specified') }}</div>
                        </div>
                        <div class="info-item" style="grid-column: span 2;">
                            <div class="info-label">Address</div>
                            <div class="info-value">{{ $patient->address ?? 'Not specified' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Medical Information -->
                <div class="profile-section">
                    <h3 class="section-title">Medical Information</h3>
                    <div class="medical-info">
                        <div class="medical-item">
                            <h4 class="medical-title">Allergies</h4>
                            <div class="medical-content">
                                @if($patient->allergies)
                                    {{ $patient->allergies }}
                                @else
                                    <span class="empty-state">No allergies recorded</span>
                                @endif
                            </div>
                        </div>
                        <div class="medical-item">
                            <h4 class="medical-title">Chronic Conditions</h4>
                            <div class="medical-content">
                                @if($patient->chronic_conditions)
                                    {{ $patient->chronic_conditions }}
                                @else
                                    <span class="empty-state">No chronic conditions</span>
                                @endif
                            </div>
                        </div>
                        <div class="medical-item">
                            <h4 class="medical-title">Current Medications</h4>
                            <div class="medical-content">
                                @if($patient->current_medications)
                                    {{ $patient->current_medications }}
                                @else
                                    <span class="empty-state">No current medications</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dental Information -->
                <div class="profile-section">
                    <h3 class="section-title">Dental Information</h3>
                    <div class="medical-info">
                        <div class="medical-item">
                            <h4 class="medical-title">Previous Dental History</h4>
                            <div class="medical-content">
                                @if($patient->previous_dental_history)
                                    {{ $patient->previous_dental_history }}
                                @else
                                    <span class="empty-state">No previous dental history</span>
                                @endif
                            </div>
                        </div>
                        <div class="medical-item">
                            <h4 class="medical-title">Current Oral Problems</h4>
                            <div class="medical-content">
                                @if($patient->current_oral_problems)
                                    {{ $patient->current_oral_problems }}
                                @else
                                    <span class="empty-state">No current oral problems reported</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>