<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Book Appointment - SmileCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background: #F5F5F5;
            line-height: 1.6;
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
            background: rgba(168, 192, 196, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        header.scrolled {
            background: rgba(168, 192, 196, 0.98);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 15px 60px;
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
            transition: all 0.3s;
            position: relative;
            padding: 5px 0;
        }

        nav a:hover::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: white;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .user-greeting {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            color: white;
            font-size: 13px;
        }

        .hello-text {
            opacity: 0.9;
            font-size: 11px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .user-name {
            font-weight: 700;
            font-size: 14px;
        }

        .logout-btn {
            color: white;
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
            font-family: 'Poppins', sans-serif;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #A9C4C4 0%, #96B1B1 100%);
            padding: 140px 40px 60px;
            text-align: center;
            color: white;
            margin-top: 80px;
        }

        .page-header h1 {
            font-size: 42px;
            font-weight: 300;
            margin-bottom: 15px;
        }

        .page-header p {
            font-size: 16px;
            opacity: 0.95;
        }

        /* Container */
        .appointment-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 40px 80px;
        }

        /* Success Message */
        .success-message {
            text-align: center;
            padding: 60px 40px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        }

        .success-icon {
            font-size: 60px;
            color: #48BB78;
            margin-bottom: 20px;
        }

        /* Appointment Card */
        .appointment-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .appointment-header {
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            padding: 40px;
            color: white;
            text-align: center;
        }

        .appointment-header h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Form */
        .appointment-form {
            padding: 40px;
        }

        .form-section {
            margin-bottom: 40px;
        }

        .form-section h3 {
            font-size: 20px;
            font-weight: 600;
            color: #A9C4C4;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #4A5568;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #E2E8F0;
            border-radius: 10px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            color: #333;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #A9C4C4;
            box-shadow: 0 0 0 3px rgba(169, 196, 196, 0.2);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Doctor Selection */
        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }

        .doctor-card {
            background: white;
            border: 2px solid #E2E8F0;
            border-radius: 15px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .doctor-card:hover {
            border-color: #A9C4C4;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(169, 196, 196, 0.2);
        }

        .doctor-card.selected {
            border-color: #A9C4C4;
            background: rgba(169, 196, 196, 0.1);
        }

        .doctor-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .doctor-info h4 {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .doctor-info p {
            color: #666;
            font-size: 13px;
            margin-bottom: 2px;
        }

        /* Calendar */
        .calendar-container {
            margin-bottom: 30px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-nav {
            background: none;
            border: none;
            cursor: pointer;
            color: #A9C4C4;
            font-size: 24px;
            padding: 5px 15px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .calendar-nav:hover {
            background: rgba(169, 196, 196, 0.1);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            min-height: 300px;
        }

        .calendar-day-header {
            text-align: center;
            padding: 10px;
            font-weight: 600;
            color: #718096;
            text-transform: uppercase;
            font-size: 12px;
        }

        .calendar-day {
            text-align: center;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
            position: relative;
            aspect-ratio: 1;
            min-height: 45px;
            max-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #E2E8F0;
        }

        .calendar-day:hover:not(.disabled):not(.past):not(.fully-booked) {
            background: rgba(169, 196, 196, 0.1);
            transform: scale(1.05);
        }

        .calendar-day.selected {
            background: #A9C4C4 !important;
            color: white !important;
            border-color: #A9C4C4 !important;
        }

        .calendar-day.disabled,
        .calendar-day.past {
            color: #CBD5E0;
            cursor: not-allowed;
            background: #F7FAFC;
        }

        .calendar-day.today {
            border-color: #A9C4C4;
            font-weight: 700;
        }

        .calendar-day.available {
            background: rgba(72, 187, 120, 0.1);
            border-color: #48BB78;
            cursor: pointer;
        }

        .calendar-day.available::before {
            content: '✓';
            position: absolute;
            top: 3px;
            right: 5px;
            font-size: 10px;
            color: #48BB78;
        }

        .calendar-day.partially-available {
            background: rgba(246, 173, 85, 0.15);
            border-color: #F6AD55;
            cursor: pointer;
        }

        .calendar-day.partially-available::before {
            content: '!';
            position: absolute;
            top: 3px;
            right: 5px;
            font-size: 10px;
            color: #F6AD55;
        }

        .calendar-day.fully-booked {
            background: rgba(245, 101, 101, 0.15);
            border-color: #F56565;
            cursor: not-allowed;
        }

        .calendar-day.fully-booked::before {
            content: '✗';
            position: absolute;
            top: 3px;
            right: 5px;
            font-size: 10px;
            color: #F56565;
        }

        /* Calendar clickable cursor */
        .calendar-day[data-clickable="true"] {
            cursor: pointer;
        }

        .calendar-day[data-clickable="false"] {
            cursor: not-allowed;
        }

        /* NEW: Calendar Legend */
        .calendar-legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #E2E8F0;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #4A5568;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            border: 2px solid;
        }

        .legend-available {
            background: rgba(72, 187, 120, 0.1);
            border-color: #48BB78;
        }

        .legend-partial {
            background: rgba(246, 173, 85, 0.15);
            border-color: #F6AD55;
        }

        .legend-booked {
            background: rgba(245, 101, 101, 0.15);
            border-color: #F56565;
        }

        .legend-disabled {
            background: #F7FAFC;
            border-color: #E2E8F0;
        }

        .legend-selected {
            background: #A9C4C4;
            border-color: #A9C4C4;
        }

        /* Time Slots */
        .time-slots {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 15px;
        }

        .time-slot {
            padding: 12px 20px;
            background: #F7FAFC;
            border: 2px solid #E2E8F0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            font-weight: 500;
            color: #4A5568;
            min-width: 100px;
        }

        .time-slot:hover:not(.disabled) {
            border-color: #A9C4C4;
            background: rgba(169, 196, 196, 0.1);
        }

        .time-slot.selected {
            background: #A9C4C4;
            color: white;
            border-color: #A9C4C4;
        }

        .time-slot.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            text-decoration: line-through;
        }

        /* Service Options */
        .service-options {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }

        .service-option {
            padding: 15px;
            background: #F7FAFC;
            border: 2px solid #E2E8F0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            font-weight: 500;
        }

        .service-option:hover {
            border-color: #A9C4C4;
        }

        .service-option.selected {
            background: #A9C4C4;
            color: white;
            border-color: #A9C4C4;
        }

        /* Buttons */
        .btn-submit {
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            color: white;
            border: none;
            padding: 18px 45px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 40px auto 0;
            box-shadow: 0 8px 25px rgba(169, 196, 196, 0.3);
        }

        .btn-submit:hover:not(:disabled) {
            background: linear-gradient(135deg, #8FB1B1, #7DA5A5);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(169, 196, 196, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #A9C4C4;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 20px;
            background: rgba(169, 196, 196, 0.1);
            transition: all 0.3s;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            background: rgba(169, 196, 196, 0.2);
        }

        /* Alert */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #C6F6D5;
            color: #22543D;
            border: 1px solid #9AE6B4;
        }

        .alert-error {
            background: #FED7D7;
            color: #742A2A;
            border: 1px solid #FC8181;
        }

        /* Loading */
        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .loading-spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #A9C4C4;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                padding: 15px 30px;
                flex-direction: column;
                gap: 15px;
            }
            
            .page-header {
                padding: 100px 20px 40px;
                margin-top: 120px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .doctors-grid {
                grid-template-columns: 1fr;
            }
            
            .calendar-legend {
                gap: 10px;
                justify-content: flex-start;
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
            <a href="{{ url('/#about') }}">ABOUT</a>
            <a href="{{ url('/#service') }}">SERVICE</a>
            <a href="{{ route('doctors.index') }}">DOCTORS</a>
            <a href="{{ url('/#contact') }}">CONTACT</a>
            <a href="{{ route('patients.profile') }}">MY PROFILE</a>
        </nav>
        
        <div class="header-right">
            <div class="user-greeting">
                <span class="hello-text">Hello,</span>
                <span class="user-name">{{ Auth::user()->name ?? 'Guest' }}</span>
            </div>
            
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">LOGOUT</button>
            </form>
        </div>
    </header>

    <!-- Page Header -->
    <div class="page-header">
        <h1>Book an Appointment</h1>
        <p>Schedule your visit with our dental experts</p>
    </div>

    <!-- Appointment Container -->
    <div class="appointment-container">
        @if(session('success'))
            <div class="success-message">
                <div class="success-icon">✓</div>
                <h2>Appointment Booked Successfully!</h2>
                <p>{{ session('success') }}</p>
                <a href="{{ route('appointments.view') }}" class="btn-submit" style="max-width: 250px; margin-top: 20px;">View My Appointments</a>
            </div>
        @else
            <a href="{{ route('doctors.index') }}" class="btn-back">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Doctors
            </a>

            <!-- Display Errors -->
            @if($errors->any())
                <div class="alert alert-error">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                        <path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <strong>Please fix the following errors:</strong>
                        <ul style="margin-top: 5px; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                        <path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="appointment-card">
                <div class="appointment-header">
                    <h2>New Appointment</h2>
                    <p>Fill in the details below to schedule your visit</p>
                </div>

                <form method="POST" action="{{ route('appointments.store') }}" class="appointment-form" id="appointmentForm">
                    @csrf

                    <!-- Doctor Selection -->
                    <div class="form-section">
                        <h3>1. Choose a Doctor</h3>
                        <div class="doctors-grid" id="doctorsList">
                            @foreach($doctors as $doc)
                                <div class="doctor-card" data-doctor-id="{{ $doc['id'] }}" data-specialty="{{ $doc['specialty'] }}">
                                    @php
                                        $avatarUrl = $doc['image'] && Str::startsWith($doc['image'], 'http') 
                                            ? $doc['image'] 
                                            : ($doc['image'] 
                                                ? asset('storage/' . $doc['image'])
                                                : 'https://ui-avatars.com/api/?name=' . urlencode($doc['full_name']) . '&background=A9C4C4&color=fff&size=100');
                                    @endphp
                                    <img src="{{ $avatarUrl }}" alt="{{ $doc['full_name'] }}" class="doctor-avatar">
                                    <div class="doctor-info">
                                        <h4>{{ $doc['full_name'] }}</h4>
                                        <p style="color: #A9C4C4; font-weight: 600;">{{ $doc['specialty'] }}</p>
                                        <p>{{ $doc['years_of_experience'] }} Years Experience</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="doctor_id" id="selectedDoctorId" required>
                        <input type="hidden" name="specialty" id="selectedSpecialty" required>
                    </div>

                    <!-- Date & Time Selection -->
                    <div class="form-section" id="dateTimeSection" style="display: none;">
                        <h3>2. Select Date & Time</h3>
                        
                        <!-- Calendar -->
                        <div class="calendar-container">
                            <div class="calendar-header">
                                <button type="button" class="calendar-nav" id="prevMonth">‹</button>
                                <h4 id="currentMonth">Loading...</h4>
                                <button type="button" class="calendar-nav" id="nextMonth">›</button>
                            </div>
                            <div class="calendar-grid" id="calendarDays">
                                <div class="loading">
                                    <div class="loading-spinner"></div>
                                    <p>Select a doctor first</p>
                                </div>
                            </div>
                            
                            <!-- NEW: Calendar Legend -->
                            <div class="calendar-legend" id="calendarLegend" style="display: none;">
                                <div class="legend-item">
                                    <div class="legend-color legend-available"></div>
                                    <span>Available</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color legend-partial"></div>
                                    <span>Limited Slots</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color legend-booked"></div>
                                    <span>Fully Booked</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color legend-disabled"></div>
                                    <span>Unavailable</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color legend-selected"></div>
                                    <span>Selected</span>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="appointment_date" id="selectedDate" required>

                        <!-- Time Slots -->
                        <div class="form-group">
                            <label>Available Time Slots</label>
                            <div class="time-slots" id="timeSlots">
                                <div class="loading">Please select a date first</div>
                            </div>
                            <input type="hidden" name="appointment_time" id="selectedTime" required>
                        </div>
                    </div>

                    <!-- Patient Info -->
                    <div class="form-section" id="patientSection" style="display: none;">
                        <h3>3. Your Information</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="patient_name">Full Name *</label>
                                <input type="text" id="patient_name" name="patient_name" 
                                       value="{{ Auth::user()->name ?? '' }}" required>
                            </div>

                            <div class="form-group">
                                <label for="patient_email">Email *</label>
                                <input type="email" id="patient_email" name="patient_email" 
                                       value="{{ Auth::user()->email ?? '' }}" required>
                            </div>

                            <div class="form-group">
                                <label for="patient_phone">Phone Number *</label>
                                <input type="tel" id="patient_phone" name="patient_phone" 
                                       placeholder="+962 7X XXX XXXX" 
                                       value="{{ Auth::user()->phone ?? '' }}" required>
                            </div>

                            <div class="form-group">
                                <label for="patient_age">Age</label>
                                <input type="number" id="patient_age" name="patient_age" 
                                       min="0" max="120" placeholder="Your age">
                            </div>
                        </div>
<!-- في قسم Patient Info -->
<div class="form-group">
    <label>Payment Method *</label>
    <select name="payment_method" id="payment_method" class="form-control" required>
        <option value="cash">Cash</option>
        <option value="card">Credit Card</option>
        <option value="insurance">Insurance</option>
    </select>
</div>
                        <!-- Service Type -->
                        <div class="form-group full-width">
                            <label>Service Required *</label>
                            <div class="service-options">
                                <div class="service-option" data-service="checkup">Regular Checkup</div>
                                <div class="service-option" data-service="teeth_cleaning">Teeth Cleaning</div>
                                <div class="service-option" data-service="filling">Filling</div>
                                <div class="service-option" data-service="extraction">Extraction</div>
                                <div class="service-option" data-service="braces">Braces</div>
                                <div class="service-option" data-service="root_canal">Root Canal</div>
                                <div class="service-option" data-service="whitening">Whitening</div>
                                <div class="service-option" data-service="emergency">Emergency</div>
                            </div>
                            <input type="hidden" name="service_type" id="selectedService" value="checkup" required>
                        </div>

                        <!-- Notes -->
                        <div class="form-group full-width">
                            <label for="notes">Additional Notes</label>
                            <textarea id="notes" name="notes" 
                                      placeholder="Any specific concerns or requirements..."></textarea>
                        </div>

                        <!-- Terms -->
                        <div class="form-group full-width">
                            <label style="font-weight: normal; text-transform: none; display: flex; align-items: center; gap: 10px;">
                                <input type="checkbox" name="terms" id="terms" required>
                                <span>I agree to the terms and conditions</span>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-submit" id="submitBtn">
                        Book Appointment
                    </button>
                </form>
            </div>
        @endif
    </div>

    <script>
    $(document).ready(function () {

        // ==============================
        // CSRF
        // ==============================
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ==============================
        // Variables
        // ==============================
        let selectedDoctorId = null;
        let selectedDate = null;
        let selectedTime = null;
        let currentDate = new Date();
        let calendarAvailability = {};

        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        // ==============================
        // Doctor selection
        // ==============================
        $('.doctor-card').on('click', function () {
            $('.doctor-card').removeClass('selected');
            $(this).addClass('selected');

            selectedDoctorId = $(this).data('doctor-id');
            const specialty = $(this).data('specialty');

            $('#selectedDoctorId').val(selectedDoctorId);
            $('#selectedSpecialty').val(specialty);

            $('#dateTimeSection').slideDown();
            $('#calendarLegend').show();

            loadCalendarAvailability();

            $('html, body').animate({
                scrollTop: $('#dateTimeSection').offset().top - 100
            }, 500);
        });

        // ==============================
        // Test function to add some availability data
        // ==============================
        function addTestAvailability() {
            // Add some test data for current month
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            
            // Create test dates for the next 15 days starting from today
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            for (let i = 0; i < 15; i++) {
                const testDate = new Date(today);
                testDate.setDate(today.getDate() + i);
                
                // Skip weekends for testing
                const dayOfWeek = testDate.getDay();
                if (dayOfWeek === 0 || dayOfWeek === 6) {
                    continue; // Skip Sunday (0) and Saturday (6)
                }
                
                const dateString = testDate.toISOString().split('T')[0];
                
                // Random status for testing (more available days)
                const statuses = ['available', 'available', 'available', 'partially-available', 'fully-pending'];
                const randomStatus = statuses[Math.floor(Math.random() * statuses.length)];
                
                calendarAvailability[dateString] = { status: randomStatus };
            }
            
            console.log('Test availability added:', calendarAvailability);
        }

        // ==============================
        // Load calendar availability
        // ==============================
        function loadCalendarAvailability() {
            const year = currentDate.getFullYear();
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');

            $('#calendarDays').html(`
                <div class="loading">
                    <div class="loading-spinner"></div>
                    <p>Loading availability...</p>
                </div>
            `);

            if (!selectedDoctorId) {
                $('#calendarDays').html(`
                    <div class="loading">
                        <p>Please select a doctor first</p>
                    </div>
                `);
                return;
            }

            // For testing purposes, we'll use test data immediately
            // In production, you would use the AJAX call below
            console.log('Loading calendar for doctor:', selectedDoctorId, 'month:', month, 'year:', year);
            
            // Add test data for now
            addTestAvailability();
            generateCalendar();
            
            // Uncomment this for production use:
            /*
            $.ajax({
                url: '/appointments/availability',
                type: 'GET',
                data: {
                    doctor_id: selectedDoctorId,
                    month: month,
                    year: year
                },
                success: function (response) {
                    console.log('Availability response:', response);
                    
                    if (response.success) {
                        calendarAvailability = response.availability || {};
                        
                        // If no data, add test data for demonstration
                        if (Object.keys(calendarAvailability).length === 0) {
                            console.log('No availability data received, adding test data');
                            addTestAvailability();
                        }
                        
                        generateCalendar();
                    } else {
                        // If API fails, add test data
                        console.log('API failed, adding test data');
                        addTestAvailability();
                        generateCalendar();
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', error);
                    
                    // If AJAX fails, add test data
                    console.log('AJAX failed, adding test data');
                    addTestAvailability();
                    generateCalendar();
                }
            });
            */
        }

        // ==============================
        // Generate calendar
        // ==============================
        function generateCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();

            $('#currentMonth').text(
                currentDate.toLocaleDateString('en-US', { month: 'long', year: 'numeric' })
            );

            let html = '';

            // Day headers
            dayNames.forEach(day => {
                html += `<div class="calendar-day-header">${day}</div>`;
            });

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const firstDayIndex = firstDay.getDay(); // 0 = Sunday, 1 = Monday, etc.
            const daysInMonth = lastDay.getDate();

            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // Add empty cells for days before the first day of the month
            for (let i = 0; i < firstDayIndex; i++) {
                html += `<div class="calendar-day disabled"></div>`;
            }

            // Add days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dateObj = new Date(year, month, day);
                const dateString = dateObj.toISOString().split('T')[0];
                const availability = calendarAvailability[dateString];

                let classes = 'calendar-day';
                let clickable = false;

                // Check if it's today
                const isToday = dateObj.toDateString() === today.toDateString();
                if (isToday) {
                    classes += ' today';
                }

                // Check if it's in the past
                if (dateObj < today) {
                    classes += ' past disabled';
                } 
                // Check availability
                else if (availability) {
                    // Handle different response formats
                    let status;
                    if (typeof availability === 'string') {
                        status = availability;
                    } else if (availability.status) {
                        status = availability.status;
                    } else {
                        status = 'available'; // Default
                    }
                    
                    classes += ' ' + status;
                    
                    // If available or partially available, make it clickable
                    if (status === 'available' || status === 'partially-available') {
                        clickable = true;
                    }
                } 
                // No availability data (should be disabled)
                else {
                    classes += ' disabled';
                }

                html += `
                    <div class="${classes}"
                         data-date="${dateString}"
                         data-clickable="${clickable ? 'true' : 'false'}">
                        ${day}
                    </div>
                `;
            }

            // Calculate total cells needed (should be multiple of 7)
            const totalCells = Math.ceil((firstDayIndex + daysInMonth) / 7) * 7;
            const currentCells = firstDayIndex + daysInMonth;
            
            // Add empty cells at the end if needed
            for (let i = currentCells; i < totalCells; i++) {
                html += `<div class="calendar-day disabled"></div>`;
            }

            $('#calendarDays').html(html);

            // Setup calendar clicks
            setupCalendarClicks();
        }

        // ==============================
        // Setup calendar click events
        // ==============================
        function setupCalendarClicks() {
            // Remove any existing click handlers
            $('.calendar-day').off('click');
            
            // Add new click handler to all calendar days
            $('.calendar-day').on('click', function () {
                const isClickable = $(this).data('clickable') === true || $(this).attr('data-clickable') === 'true';
                const isDisabled = $(this).hasClass('disabled') || 
                                  $(this).hasClass('past') || 
                                  $(this).hasClass('fully-pending');
                
                if (!isClickable || isDisabled) {
                    console.log('Day not clickable:', $(this).data('date'));
                    return; // Don't allow clicking on non-clickable days
                }
                
                console.log('Day clicked:', $(this).data('date'), 'isClickable:', isClickable);
                
                $('.calendar-day').removeClass('selected');
                $(this).addClass('selected');

                selectedDate = $(this).data('date');
                $('#selectedDate').val(selectedDate);

                loadTimeSlots(selectedDate);

                $('#patientSection').slideDown();

                $('html, body').animate({
                    scrollTop: $('#patientSection').offset().top - 100
                }, 500);
            });
        }

        // ==============================
        // Load time slots
        // ==============================
        function loadTimeSlots(date) {
            $('#timeSlots').html(`
                <div class="loading">
                    <div class="loading-spinner"></div>
                    <p>Loading time slots...</p>
                </div>
            `);

            // For testing, generate random time slots
            setTimeout(function() {
                generateTestTimeSlots(date);
            }, 500);
            
            // Uncomment this for production use:
            /*
            $.ajax({
                url: '/appointments/time-slots',
                type: 'GET',
                data: {
                    doctor_id: selectedDoctorId,
                    date: date
                },
                success: function (response) {
                    console.log('Time slots response:', response);
                    if (response.success) {
                        displayTimeSlots(response);
                    } else {
                        $('#timeSlots').html(`
                            <div class="loading">
                                <p style="color:red;">${response.message || 'No time slots available'}</p>
                            </div>
                        `);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', error);
                    $('#timeSlots').html(`
                        <div class="loading">
                            <p style="color:red;">Failed to load time slots. Please try again.</p>
                        </div>
                    `);
                }
            });
            */
        }

        // ==============================
        // Generate test time slots
        // ==============================
        function generateTestTimeSlots(date) {
            console.log('Generating test time slots for:', date);
            
            const allSlots = [
                '09:00', '09:30', '10:00', '10:30', 
                '11:00', '11:30', '12:00', '12:30',
                '14:00', '14:30', '15:00', '15:30',
                '16:00', '16:30', '17:00', '17:30'
            ];
            
            // Randomly book some slots
            const bookedSlots = [];
            const totalSlots = allSlots.length;
            const bookedCount = Math.floor(Math.random() * 4); // 0-3 booked slots
            
            for (let i = 0; i < bookedCount; i++) {
                const randomIndex = Math.floor(Math.random() * allSlots.length);
                bookedSlots.push(allSlots[randomIndex]);
            }
            
            displayTimeSlots({
                all_slots: allSlots,
                booked_slots: bookedSlots
            });
        }

        // ==============================
        // Display time slots
        // ==============================
        function displayTimeSlots(data) {
            let html = '';

            if (!data.all_slots || !data.all_slots.length) {
                $('#timeSlots').html('<p>No available slots for this date</p>');
                return;
            }

            data.all_slots.forEach(time => {
                const booked = data.booked_slots.includes(time);
                html += `
                    <div class="time-slot ${booked ? 'disabled' : ''}"
                         data-time="${time}">
                        ${formatTime(time)}
                    </div>
                `;
            });

            $('#timeSlots').html(html);

            // Add click events to time slots
            $('.time-slot:not(.disabled)').off('click').on('click', function () {
                $('.time-slot').removeClass('selected');
                $(this).addClass('selected');

                selectedTime = $(this).data('time');
                $('#selectedTime').val(selectedTime);
            });
        }

        // ==============================
        // Format time
        // ==============================
        function formatTime(time) {
            const [h, m] = time.split(':');
            const hour = parseInt(h);
            const ampm = hour >= 12 ? 'PM' : 'AM';
            return `${hour % 12 || 12}:${m} ${ampm}`;
        }

        // ==============================
        // Month navigation
        // ==============================
        $('#prevMonth').on('click', function () {
            currentDate.setMonth(currentDate.getMonth() - 1);
            if (selectedDoctorId) loadCalendarAvailability();
        });

        $('#nextMonth').on('click', function () {
            currentDate.setMonth(currentDate.getMonth() + 1);
            if (selectedDoctorId) loadCalendarAvailability();
        });

        // ==============================
        // Service selection
        // ==============================
        $('.service-option').on('click', function () {
            $('.service-option').removeClass('selected');
            $(this).addClass('selected');
            $('#selectedService').val($(this).data('service'));
        });

        // ==============================
        // Form validation before submit
        // ==============================
        $('#appointmentForm').on('submit', function (e) {
            if (!selectedDoctorId) {
                e.preventDefault();
                alert('Please select a doctor');
                return false;
            }
            
            if (!selectedDate) {
                e.preventDefault();
                alert('Please select a date');
                return false;
            }
            
            if (!selectedTime) {
                e.preventDefault();
                alert('Please select a time slot');
                return false;
            }
            
            if (!$('#terms').is(':checked')) {
                e.preventDefault();
                alert('Please agree to the terms and conditions');
                return false;
            }
            
            return true;
        });

        // ==============================
        // Scroll header effect
        // ==============================
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 50) {
                $('header').addClass('scrolled');
            } else {
                $('header').removeClass('scrolled');
            }
        });
    });
    </script>

</body>
</html>