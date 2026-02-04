<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - SmileCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* نفس الـ styles بالضبط من صفحة العرض */
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
            max-width: 1200px;
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

        .form-container {
            background: white;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .form-section {
            margin-bottom: 50px;
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

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        label {
            display: block;
            color: #666;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input, select, textarea {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            color: #333;
            background: #f8f9fa;
            transition: all 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #A9C4C4;
            background: white;
            box-shadow: 0 0 0 3px rgba(169, 196, 196, 0.1);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #f0f0f0;
        }

        .btn-cancel {
            background: transparent;
            color: #666;
            border: 2px solid #e8e8e8;
            padding: 15px 35px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background: #f8f9fa;
            border-color: #d8d8d8;
        }

        .btn-submit {
            background: #A9C4C4;
            color: white;
            border: none;
            padding: 15px 45px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .btn-submit:hover {
            background: #96B1B1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(169, 196, 196, 0.3);
        }

        /* Error Messages */
        .error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .main-content {
                padding: 30px;
            }
            
            .form-container {
                padding: 40px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .form-group.full-width {
                grid-column: span 1;
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
            
            .form-container {
                padding: 30px;
            }
            
            .page-header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn-cancel, .btn-submit {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 28px;
            }
            
            .form-container {
                padding: 20px;
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
            <a href="{{ url('/patient/profile') }}" style="color: #fff; font-weight: 600;">MY PROFILE</a>
          
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
        <div class="page-header">
            <h1 class="page-title">Edit Profile</h1>
        </div>

        <div class="form-container">
            <form action="{{ route('patients.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Personal Information -->
                <div class="form-section">
                    <h3 class="section-title">Personal Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="full_name">Full Name *</label>
                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $patient->full_name) }}" required>
                            @error('full_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $patient->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $patient->date_of_birth ? $patient->date_of_birth->format('Y-m-d') : '') }}">
                            @error('date_of_birth')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}">
                            @error('phone')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="address">Address</label>
                            <textarea id="address" name="address">{{ old('address', $patient->address) }}</textarea>
                            @error('address')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Medical Information -->
                <div class="form-section">
                    <h3 class="section-title">Medical Information</h3>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="allergies">Allergies</label>
                            <textarea id="allergies" name="allergies" placeholder="List any allergies...">{{ old('allergies', $patient->allergies) }}</textarea>
                            @error('allergies')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="chronic_conditions">Chronic Conditions</label>
                            <textarea id="chronic_conditions" name="chronic_conditions" placeholder="e.g., Diabetes, Hypertension, Asthma...">{{ old('chronic_conditions', $patient->chronic_conditions) }}</textarea>
                            @error('chronic_conditions')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="current_medications">Current Medications</label>
                            <textarea id="current_medications" name="current_medications" placeholder="List any medications you're currently taking...">{{ old('current_medications', $patient->current_medications) }}</textarea>
                            @error('current_medications')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Dental Information -->
                <div class="form-section">
                    <h3 class="section-title">Dental Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="last_dental_visit">Last Dental Visit</label>
                            <input type="date" id="last_dental_visit" name="last_dental_visit" value="{{ old('last_dental_visit', $patient->last_dental_visit ? $patient->last_dental_visit->format('Y-m-d') : '') }}">
                            @error('last_dental_visit')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="previous_dental_history">Previous Dental History</label>
                            <textarea id="previous_dental_history" name="previous_dental_history" placeholder="Previous treatments, surgeries, etc.">{{ old('previous_dental_history', $patient->previous_dental_history) }}</textarea>
                            @error('previous_dental_history')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="current_oral_problems">Current Oral Problems</label>
                            <textarea id="current_oral_problems" name="current_oral_problems" placeholder="Any current issues like pain, sensitivity, bleeding gums...">{{ old('current_oral_problems', $patient->current_oral_problems) }}</textarea>
                            @error('current_oral_problems')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('patients.profile') }}" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-submit">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>