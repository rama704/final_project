<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SmileCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #A9C4C4;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 1200px;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 700px;
        }

        /* Left Side - Branding */
        .login-left {
            background: linear-gradient(135deg, #A9C4C4 0%, #8fb1b1 100%);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .login-left::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
            z-index: 1;
        }

        .brand-logo svg {
            width: 50px;
            height: 50px;
        }

        .brand-logo h1 {
            font-size: 32px;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .welcome-text {
            text-align: center;
            z-index: 1;
        }

        .welcome-text h2 {
            font-size: 36px;
            font-weight: 300;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .welcome-text p {
            font-size: 16px;
            opacity: 0.95;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 40px;
            width: 100%;
            max-width: 400px;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .stat-number {
            font-size: 32px;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Right Side - Form */
        .login-right {
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-header h2 {
            font-size: 32px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            font-size: 14px;
        }

        .form-header p a {
            color: #A9C4C4;
            text-decoration: none;
            font-weight: 600;
        }

        .form-header p a:hover {
            text-decoration: underline;
        }

        .login-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper svg {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: #A9C4C4;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            background: #f9f9f9;
        }

        .form-control:focus {
            outline: none;
            border-color: #A9C4C4;
            background: white;
            box-shadow: 0 0 0 4px rgba(169, 196, 196, 0.1);
        }

        .form-control.error {
            border-color: #e74c3c;
        }

        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
            width: 20px;
            height: 20px;
        }

        /* Bottom Section - New Layout */
        .bottom-section {
            margin-top: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #A9C4C4;
        }

        .remember-me label {
            font-size: 13px;
            color: #666;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: #A9C4C4;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 20px rgba(169, 196, 196, 0.3);
            margin-bottom: 20px;
        }

        .submit-btn:hover {
            background: #96B1B1;
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(169, 196, 196, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .or-divider {
            text-align: center;
            color: #999;
            font-size: 13px;
            margin: 25px 0;
            position: relative;
        }

        .or-divider span {
            background: white;
            padding: 0 15px;
            position: relative;
            z-index: 1;
        }

        .or-divider::before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
            height: 1px;
            background: #e0e0e0;
            z-index: 0;
        }

        .social-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .social-btn {
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .social-btn:hover {
            border-color: #A9C4C4;
            background: #f9f9f9;
            transform: translateY(-2px);
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e0e0e0;
        }

        .register-link p {
            color: #666;
            font-size: 14px;
        }

        .register-link a {
            color: #A9C4C4;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Alert Messages */
        .alert {
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-error {
            background: #fee;
            color: #c33;
            border: 1px solid #fcc;
        }

        .alert-success {
            background: #efe;
            color: #3c3;
            border: 1px solid #cfc;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .login-left {
                padding: 40px;
                min-height: 300px;
            }

            .welcome-text h2 {
                font-size: 28px;
            }

            .stats-container {
                display: none;
            }

            .login-right {
                padding: 40px 30px;
            }
        }

        @media (max-width: 576px) {
            .login-left {
                padding: 30px 20px;
            }

            .login-right {
                padding: 30px 20px;
            }

            .form-header h2 {
                font-size: 26px;
            }

            .social-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Branding -->
        <div class="login-left">
            <div class="brand-logo">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z" />
                </svg>
                <h1>SmileCare</h1>
            </div>
            
            <div class="welcome-text">
                <h2>Welcome Back!</h2>
                <p>Sign in to access your account and manage your dental care appointments with ease.</p>
            </div>

            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number">+250</div>
                    <div class="stat-label">Happy Patients</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">2014</div>
                    <div class="stat-label">Established</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">+8</div>
                    <div class="stat-label">Expert Team</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">99%</div>
                    <div class="stat-label">Satisfaction</div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">
            <div class="form-header">
                <h2>Sign In</h2>
                <p>New to SmileCare? <a href="{{ route('register') }}">Create an account</a></p>
            </div>

            <!-- Error Alert -->
            @if ($errors->any())
            <div class="alert alert-error">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
            @endif

            <!-- Success Alert -->
            @if (session('success'))
            <div class="alert alert-success">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-control @error('email') error @enderror" 
                            placeholder="Enter your email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >
                    </div>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-control @error('password') error @enderror" 
                            placeholder="Enter your password"
                            required
                        >
                        <svg class="password-toggle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" onclick="togglePassword()">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Bottom Section: Remember me + Sign In + Social -->
                <div class="bottom-section">
                    <!-- Remember Me Checkbox -->
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>

                    <!-- Sign In Button -->
                    <button type="submit" class="submit-btn">SIGN IN</button>

                    <!-- Or Divider -->
                    <div class="or-divider">
                        <span>Or continue with</span>
                    </div>

                    <!-- Social Login Buttons -->
                    <div class="social-buttons">
                        <button type="button" class="social-btn google-btn">
                            <svg viewBox="0 0 24 24" width="18" height="18">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Google
                        </button>
                        <button type="button" class="social-btn facebook-btn">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="#1877F2">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </button>
                    </div>
                </div>
            </form>

            <!-- Register Link -->
            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register') }}">Sign up for free</a></p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>