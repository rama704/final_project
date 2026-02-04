<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $doctor->full_name }} - SmileCare</title>
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
            background: #F5F5F5;
        }

        /* Header - Same as homepage */
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

        /* Navigation */
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

        nav a:hover {
            opacity: 0.8;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: white;
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        /* Header Right Section */
        .header-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .search-icon {
            width: 20px;
            height: 20px;
            cursor: pointer;
            transition: opacity 0.3s;
            color: white;
        }

        .search-icon:hover {
            opacity: 0.8;
        }

        /* User Greeting */
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

        .user-greeting:hover {
            transform: translateY(-2px);
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

        /* Logout Button */
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
            display: flex;
            align-items: center;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Doctor Detail */
        .doctor-detail {
            max-width: 1200px;
            margin: 100px auto 50px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
        }

        .doctor-header {
            background: linear-gradient(135deg, #A9C4C4 0%, #96B1B1 100%);
            padding: 80px 60px;
            text-align: center;
            color: white;
            position: relative;
        }

        .doctor-avatar {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            margin: 0 auto 30px;
            border: 5px solid white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            object-fit: cover;
        }

        .doctor-detail h1 {
            font-size: 42px;
            font-weight: 600;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .doctor-detail .specialty {
            font-size: 18px;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 500;
        }

        .doctor-body {
            padding: 60px;
        }

        .section {
            margin-bottom: 50px;
        }

        .section h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #A9C4C4;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .section p {
            font-size: 16px;
            line-height: 1.8;
            color: #666;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .info-item {
            padding: 25px;
            background: #F7FAFC;
            border-radius: 15px;
            border-left: 4px solid #A9C4C4;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(169, 196, 196, 0.2);
        }

        .info-label {
            font-size: 12px;
            font-weight: 600;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .info-value {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        /* Rating Section */
        .rating-section {
            background: #F9FAFB;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 40px;
        }

        .rating-info {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .rating-number {
            font-size: 48px;
            font-weight: 300;
            color: #A9C4C4;
        }

        .stars {
            display: flex;
            align-items: center;
            gap: 2px;
            margin-bottom: 5px;
        }

        .star {
            color: #e0e0e0;
            font-size: 24px;
        }

        .star.filled {
            color: #FFC107;
        }

        .star.half {
            background: linear-gradient(90deg, #FFC107 50%, #e0e0e0 50%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .rating-text {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-left: 10px;
        }

        .reviews-count {
            font-size: 14px;
            color: #666;
            margin-left: 10px;
        }

        /* Skills Section */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 15px;
        }

        .skill-tag {
            background: linear-gradient(135deg, rgba(169, 196, 196, 0.1), rgba(143, 177, 177, 0.1));
            color: #A9C4C4;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid rgba(169, 196, 196, 0.3);
            transition: all 0.3s ease;
        }

        .skill-tag:hover {
            background: linear-gradient(135deg, rgba(169, 196, 196, 0.2), rgba(143, 177, 177, 0.2));
            transform: translateY(-2px);
        }

        /* Buttons */
        .btn-book {
            display: inline-block;
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            color: white;
            padding: 18px 45px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 8px 25px rgba(169, 196, 196, 0.3);
        }

        .btn-book:hover {
            background: linear-gradient(135deg, #8FB1B1, #7DA5A5);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(169, 196, 196, 0.4);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #A9C4C4;
            text-decoration: none;
            margin-bottom: 30px;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 20px;
            background: rgba(169, 196, 196, 0.1);
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: rgba(169, 196, 196, 0.2);
            transform: translateX(-5px);
        }

        .btn-back svg {
            width: 16px;
            height: 16px;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .doctor-detail {
                margin: 100px 30px 50px;
            }
            
            .doctor-header {
                padding: 60px 40px;
            }
            
            .doctor-body {
                padding: 40px;
            }
            
            .doctor-avatar {
                width: 150px;
                height: 150px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 15px 30px;
            }
            
            nav {
                gap: 20px;
            }
            
            nav a {
                font-size: 11px;
            }
            
            .doctor-detail {
                margin: 90px 20px 40px;
            }
            
            .doctor-header {
                padding: 50px 30px;
            }
            
            .doctor-detail h1 {
                font-size: 32px;
            }
            
            .doctor-detail .specialty {
                font-size: 16px;
            }
            
            .doctor-body {
                padding: 30px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-book {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            header {
                flex-direction: column;
                gap: 15px;
                padding: 15px 20px;
            }
            
            nav {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .header-right {
                width: 100%;
                justify-content: space-between;
            }
            
            .user-greeting {
                display: none;
            }
            
            .doctor-detail {
                margin: 120px 15px 30px;
            }
            
            .doctor-header {
                padding: 40px 20px;
            }
            
            .doctor-detail h1 {
                font-size: 28px;
            }
            
            .doctor-avatar {
                width: 120px;
                height: 120px;
            }
            
            .section h2 {
                font-size: 20px;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

    <!-- Header - Same as homepage -->
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
            <!-- Search Icon -->
            <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            
            <!-- User Greeting -->
            <div class="user-greeting">
                <span class="hello-text">Hello,</span>
                <span class="user-name">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Guest
                    @endauth
                </span>
            </div>
            
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    LOGOUT
                </button>
            </form>
        </div>
    </header>

    <div class="doctor-detail">
        <div class="doctor-header">
            @if($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
                <img src="{{ asset('storage/' . $doctor->image) }}" 
                     alt="{{ $doctor->full_name }}" 
                     class="doctor-avatar">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($doctor->full_name) }}&background=fff&color=A9C4C4&size=200" 
                     alt="{{ $doctor->full_name }}" 
                     class="doctor-avatar">
            @endif
            <h1>{{ $doctor->full_name }}</h1>
            <p class="specialty">{{ $doctor->specialty }}</p>
        </div>

        <div class="doctor-body">
            <a href="{{ route('doctors.index') }}" class="btn-back">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Doctors
            </a>

            <div class="section">
                <h2>About</h2>
                <p>{{ $doctor->bio ?: 'Experienced dental professional dedicated to providing excellent care to all patients.' }}</p>
            </div>

            <!-- Rating Section -->
            @php
                $averageRating = $doctor->average_rating ?? 0;
                $reviewsCount = $doctor->ratings_count ?? 0;
                $fullStars = floor($averageRating);
                $hasHalfStar = ($averageRating - $fullStars) >= 0.5;
            @endphp
            
            @if($averageRating > 0)
            <div class="rating-section">
                <h2>Rating & Reviews</h2>
                <div class="rating-info">
                    <div class="rating-number">{{ number_format($averageRating, 1) }}</div>
                    <div>
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $fullStars)
                                    <span class="star filled">★</span>
                                @elseif($hasHalfStar && $i == $fullStars + 1)
                                    <span class="star half">★</span>
                                @else
                                    <span class="star">★</span>
                                @endif
                            @endfor
                            <span class="rating-text">/5</span>
                        </div>
                        <span class="reviews-count">Based on {{ $reviewsCount }} {{ Str::plural('review', $reviewsCount) }}</span>
                    </div>
                </div>
            </div>
            @endif

            <div class="section">
                <h2>Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Experience</div>
                        <div class="info-value">{{ $doctor->years_of_experience ?? 0 }} Years</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Specialty</div>
                        <div class="info-value">{{ $doctor->specialty }}</div>
                    </div>
                    @if($doctor->email)
                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $doctor->email }}</div>
                    </div>
                    @endif
                    @if($doctor->phone)
                    <div class="info-item">
                        <div class="info-label">Phone</div>
                        <div class="info-value">{{ $doctor->phone }}</div>
                    </div>
                    @endif
                    @if($doctor->education)
                    <div class="info-item">
                        <div class="info-label">Education</div>
                        <div class="info-value">{{ $doctor->education }}</div>
                    </div>
                    @endif
                    @if($doctor->certifications)
                    <div class="info-item">
                        <div class="info-label">Certifications</div>
                        <div class="info-value">{{ $doctor->certifications }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Skills Section -->
            @if($doctor->skills && $doctor->skills !== 'null')
                @php
                    $skills = [];
                    if (is_array($doctor->skills)) {
                        $skills = $doctor->skills;
                    } elseif (is_string($doctor->skills)) {
                        $skills = json_decode($doctor->skills, true) ?? [];
                        if (empty($skills)) {
                            $skills = array_filter(array_map('trim', explode(',', $doctor->skills)));
                        }
                    }
                    $skills = array_filter($skills, function($skill) {
                        return !empty(trim($skill)) && $skill !== 'null';
                    });
                @endphp
                
                @if(!empty($skills))
                <div class="section">
                    <h2>Specializations</h2>
                    <div class="skills-container">
                        @foreach($skills as $skill)
                            @if(!empty(trim($skill)))
                                <span class="skill-tag">{{ trim($skill) }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif
            @endif

            <div class="section">
                <div class="action-buttons">
                    <a href="{{ route('appointments.create', ['doctor_id' => $doctor->id]) }}" class="btn-book">
                        Book Appointment
                    </a>
                    <a href="{{ route('doctors.index') }}" class="btn-book" style="background: transparent; color: #A9C4C4; border: 2px solid #A9C4C4;">
                        View Other Doctors
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Header scroll effect - same as homepage
            const header = document.querySelector('header');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
            
            // Smooth scrolling for navigation links
            document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        const headerHeight = header.offsetHeight;
                        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>