<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SmileCare</title>
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

        .register-container {
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
        .register-left {
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

        .register-left::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .register-left::after {
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

        .features-list {
            list-style: none;
            text-align: left;
            margin-top: 40px;
        }

        .features-list li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .features-list li svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }

        /* Right Side - Form */
        .register-right {
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

        .register-form {
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

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #A9C4C4;
        }

        .checkbox-group label {
            font-size: 13px;
            color: #666;
            margin: 0;
            text-transform: none;
            letter-spacing: normal;
            cursor: pointer;
        }

        .checkbox-group label a {
            color: #A9C4C4;
            text-decoration: none;
            font-weight: 600;
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
        }

        .submit-btn:hover {
            background: #96B1B1;
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(169, 196, 196, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 30px 0;
            color: #999;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e0e0e0;
        }

        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .social-btn {
            padding: 12px;
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
        }

        .social-btn svg {
            width: 20px;
            height: 20px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .register-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .register-left {
                padding: 40px;
                min-height: 300px;
            }

            .welcome-text h2 {
                font-size: 28px;
            }

            .features-list {
                display: none;
            }

            .register-right {
                padding: 40px 30px;
            }
        }

        @media (max-width: 576px) {
            .register-left {
                padding: 30px 20px;
            }

            .register-right {
                padding: 30px 20px;
            }

            .form-header h2 {
                font-size: 26px;
            }

            .social-login {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <!-- Left Side - Branding -->
        <div class="register-left">
            <div class="brand-logo">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z" />
                </svg>
                <h1>SmileCare</h1>
            </div>
            
            <div class="welcome-text">
                <h2>Join Our Dental Care Family</h2>
                <p>Create your account and start your journey to a healthier, brighter smile with SmileCare.</p>
            </div>

            <ul class="features-list">
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>Expert dental professionals</span>
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>24/7 online appointment booking</span>
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>Modern dental technology</span>
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>Personalized care plans</span>
                </li>
            </ul>
        </div>

        <!-- Right Side - Registration Form -->
        <div class="register-right">
            <div class="form-header">
                <h2>Create Account</h2>
                <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="register-form">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control" 
                            placeholder="Enter your full name"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

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
                            class="form-control" 
                            placeholder="Enter your email"
                            value="{{ old('email') }}"
                            required
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
                            class="form-control" 
                            placeholder="Create a password (min. 6 characters)"
                            required
                        >
                        <svg class="password-toggle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" onclick="togglePassword('password')">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="Confirm your password"
                            required
                        >
                        <svg class="password-toggle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" onclick="togglePassword('password_confirmation')">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                </div>

                <!-- Terms Checkbox -->
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Create Account</button>

                <!-- Social Login Divider -->
                <div class="divider">Or register with</div>

                <!-- Social Login Buttons -->
                <div class="social-login">
                    <button type="button" class="social-btn">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Google
                    </button>
                    <button type="button" class="social-btn">
                        <svg viewBox="0 0 24 24" fill="#1877F2">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }

        // Form validation
        document.querySelector('.register-form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
            }
        });
    </script>
</body>
</html>