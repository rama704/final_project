<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Doctors - SmileCare</title>
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

        /* Header - Same as homepage FIRST VERSION */
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

        /* Navigation - WHITE LINKS */
        nav {
            display: flex;
            gap: 40px;
        }

        nav a {
            color: white; /* WHITE COLOR */
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
            background: white; /* WHITE UNDERLINE */
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        /* Highlight active link - DOCTORS */
        nav a[href*="doctors"] {
            font-weight: 600; /* Bolder for active */
            color: white;
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

        .search-icon svg {
            stroke: white;
        }

        /* User Greeting - White text */
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

        /* Logout Button - White version */
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

        /* Filters Section */
        .filters-container {
            max-width: 1200px;
            margin: -30px auto 40px;
            padding: 0 40px;
        }

        .filters-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .filters-form {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-size: 12px;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .filter-group input,
        .filter-group select {
            padding: 12px 15px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            width: 100%;
        }

        .filter-group input:focus,
        .filter-group select:focus {
            outline: none;
            border-color: #A9C4C4;
            box-shadow: 0 0 0 3px rgba(169, 196, 196, 0.2);
        }

        .filter-btns {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .filter-btn {
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 45px;
        }

        .filter-btn:hover {
            background: linear-gradient(135deg, #8FB1B1, #7DA5A5);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(169, 196, 196, 0.4);
        }

        .reset-btn {
            background: transparent;
            color: #A9C4C4;
            border: 2px solid #A9C4C4;
        }

        .reset-btn:hover {
            background: #A9C4C4;
            color: white;
        }

        /* Results Info */
        .results-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px 25px;
        }

        .results-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .results-count {
            font-size: 14px;
            color: #666;
        }

        .results-count strong {
            color: #A9C4C4;
            font-weight: 600;
        }

        .results-stats {
            display: flex;
            gap: 25px;
        }

        .stat {
            text-align: center;
            padding: 0 15px;
            border-right: 1px solid #E2E8F0;
        }

        .stat:last-child {
            border-right: none;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 600;
            color: #A9C4C4;
            display: block;
        }

        .stat-label {
            font-size: 11px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* Doctors Section */
        .doctors-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px 80px;
        }

        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        /* Doctor Card */
        .doctor-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            min-height: 550px;
        }

        .doctor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .doctor-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #A9C4C4, #8FB1B1, #A9C4C4);
            transform: scaleX(0);
            transition: transform 0.4s ease;
            transform-origin: left;
        }

        .doctor-card:hover::before {
            transform: scaleX(1);
        }

        /* Doctor Image */
        .doctor-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .doctor-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .doctor-card:hover .doctor-image img {
            transform: scale(1.05);
        }

        .doctor-image-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #A8C0C4 0%, #8FB1B1 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .doctor-image-placeholder svg {
            width: 80px;
            height: 80px;
            stroke: rgba(255, 255, 255, 0.5);
        }

        .doctor-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            color: white;
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(169, 196, 196, 0.4);
            z-index: 2;
        }

        /* Doctor Info */
        .doctor-info {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .doctor-header {
            margin-bottom: 15px;
        }

        .doctor-name {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .doctor-specialty {
            color: #A9C4C4;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f3f4f6;
            position: relative;
        }

        .doctor-specialty::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, #A9C4C4, #8FB1B1);
            border-radius: 2px;
        }

        .doctor-details {
            flex-grow: 1;
        }

        .doctor-bio {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 13px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Rating */
        .doctor-rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 15px 0;
        }

        .stars {
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .star {
            color: #e0e0e0;
            font-size: 18px;
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
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-left: 8px;
        }

        .reviews-count {
            font-size: 12px;
            color: #666;
        }

        /* Skills */
        .doctor-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 15px 0;
        }

        .skill-tag {
            background: rgba(169, 196, 196, 0.1);
            color: #A9C4C4;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 500;
            border: 1px solid rgba(169, 196, 196, 0.3);
        }

        .skill-tag.more {
            background: rgba(169, 196, 196, 0.2);
            font-weight: 600;
        }

        /* Actions */
        .doctor-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #f3f4f6;
        }

        .btn-primary, .btn-secondary {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 12px;
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary svg, .btn-secondary svg {
            width: 16px;
            height: 16px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #8FB1B1, #7DA5A5);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(169, 196, 196, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #A9C4C4;
            border: 2px solid #A9C4C4;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #8FB1B1;
            color: #8FB1B1;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(169, 196, 196, 0.2);
        }

        /* No Results */
        .no-results {
            grid-column: 1/-1;
            text-align: center;
            padding: 60px 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .no-results-icon {
            font-size: 60px;
            color: #A9C4C4;
            margin-bottom: 25px;
        }

        .no-results h3 {
            color: #666;
            font-size: 24px;
            margin-bottom: 12px;
        }

        .no-results p {
            color: #999;
            margin-bottom: 30px;
            font-size: 16px;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .pagination {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            padding: 10px 16px;
            background: white;
            border: 2px solid #E2E8F0;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            color: #333;
            transition: all 0.3s;
            min-width: 40px;
            text-align: center;
        }

        .pagination a:hover {
            border-color: #A9C4C4;
            color: #A9C4C4;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(169, 196, 196, 0.2);
        }

        .pagination .active {
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            border-color: #A9C4C4;
            color: white;
        }

        .pagination .disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f5f5f5;
        }

        .pagination .disabled:hover {
            transform: none;
            border-color: #E2E8F0;
            color: #333;
            box-shadow: none;
        }

        .pagination-info {
            color: #666;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .filters-form {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 992px) {
            header {
                padding: 15px 40px;
            }
            
            header.scrolled {
                padding: 12px 40px;
            }
            
            nav {
                gap: 25px;
            }
            
            .page-header {
                padding: 120px 30px 50px;
            }
            
            .filters-form {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .doctors-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
            
            .doctor-card {
                min-height: 500px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 12px 20px;
                flex-direction: column;
                gap: 15px;
            }
            
            header.scrolled {
                padding: 10px 20px;
            }
            
            nav {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav a {
                font-size: 11px;
            }
            
            .header-right {
                width: 100%;
                justify-content: space-between;
            }
            
            .page-header {
                padding: 100px 20px 40px;
                margin-top: 120px;
            }
            
            .page-header h1 {
                font-size: 32px;
            }
            
            .page-header p {
                font-size: 14px;
            }
            
            .filters-container,
            .results-container,
            .doctors-section {
                padding-left: 20px;
                padding-right: 20px;
            }
            
            .filters-card {
                padding: 20px;
            }
            
            .filters-form {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .results-info {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }
            
            .results-stats {
                width: 100%;
                justify-content: space-around;
            }
            
            .stat {
                padding: 0 10px;
            }
            
            .stat-value {
                font-size: 20px;
            }
            
            .doctor-actions {
                flex-direction: column;
            }
            
            .pagination-container {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .doctors-grid {
                grid-template-columns: 1fr;
            }
            
            .doctor-card {
                min-height: auto;
            }
            
            .doctor-image {
                height: 200px;
            }
            
            .user-greeting {
                display: none;
            }
            
            .page-header {
                padding: 80px 15px 30px;
            }
            
            .page-header h1 {
                font-size: 26px;
            }
            
            nav a {
                font-size: 10px;
                letter-spacing: 0.8px;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

    <!-- Header - White Links Version -->
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
            <a href="{{ route('patients.profile') }}" style="font-weight: 600;">MY PROFILE</a>
        </nav>
        
        <div class="header-right">
            <!-- Search Icon -->
            <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            
            <!-- User Greeting -->
            <div class="user-greeting">
                <span class="hello-text">HELLO</span>
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

    <!-- Page Header -->
    <div class="page-header">
        <h1>Our Expert Team</h1>
        <p>Meet our dedicated dental professionals</p>
    </div>

    <!-- Filters -->
    <div class="filters-container">
        <div class="filters-card">
            <form method="GET" action="{{ route('doctors.index') }}" class="filters-form">
                <div class="filter-group">
                    <label>Search</label>
                    <input type="text" name="search" 
                           placeholder="Search by name or specialty..." 
                           value="{{ request('search') }}">
                </div>
                
                <div class="filter-group">
                    <label>Specialty</label>
                    <select name="specialty">
                        <option value="">All Specialties</option>
                        @php
                            $specialties = \App\Models\Doctor::distinct()->pluck('specialty')->sort();
                        @endphp
                        @foreach($specialties as $specialty)
                            @if($specialty)
                                <option value="{{ $specialty }}" 
                                        {{ request('specialty') == $specialty ? 'selected' : '' }}>
                                    {{ $specialty }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="filter-group">
                    <label>Experience</label>
                    <select name="experience">
                        <option value="">All Experience</option>
                        <option value="junior" {{ request('experience') == 'junior' ? 'selected' : '' }}>
                            0-5 Years
                        </option>
                        <option value="senior" {{ request('experience') == 'senior' ? 'selected' : '' }}>
                            5-15 Years
                        </option>
                        <option value="expert" {{ request('experience') == 'expert' ? 'selected' : '' }}>
                            15+ Years
                        </option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label>Sort By</label>
                    <select name="order_by">
                        <option value="years_of_experience" 
                                {{ request('order_by') == 'years_of_experience' ? 'selected' : '' }}>
                            Experience
                        </option>
                        <option value="full_name" 
                                {{ request('order_by') == 'full_name' ? 'selected' : '' }}>
                            Name
                        </option>
                        <option value="created_at" 
                                {{ request('order_by') == 'created_at' ? 'selected' : '' }}>
                            Newest
                        </option>
                    </select>
                </div>
                
                <div class="filter-btns">
                    <button type="submit" class="filter-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                            <path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"/>
                        </svg>
                        Filter
                    </button>
                    <a href="{{ route('doctors.index') }}" class="filter-btn reset-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                            <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Info -->
    <div class="results-container">
        <div class="results-info">
            <div class="results-count">
                Showing <strong>{{ $doctors->firstItem() ? $doctors->firstItem() . ' - ' . $doctors->lastItem() : '0' }}</strong> 
                of <strong>{{ $doctors->total() }}</strong> doctors
            </div>
            
            <div class="results-stats">
                <div class="stat">
                    <span class="stat-value">{{ $doctors->count() }}</span>
                    <span class="stat-label">Showing</span>
                </div>
                <div class="stat">
                    <span class="stat-value">{{ $doctors->lastPage() }}</span>
                    <span class="stat-label">Pages</span>
                </div>
                <div class="stat">
                    <span class="stat-value">{{ $doctors->perPage() }}</span>
                    <span class="stat-label">Per Page</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Doctors Section -->
    <div class="doctors-section">
        <div class="doctors-grid">
            @forelse($doctors as $doctor)
                <div class="doctor-card">
                    <div class="doctor-image">
                        @if($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
                            <img src="{{ asset('storage/' . $doctor->image) }}" 
                                 alt="{{ $doctor->full_name }}" 
                                 loading="lazy">
                        @else
                            <div class="doctor-image-placeholder">
                                <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                        <div class="doctor-badge">
                            {{ $doctor->years_of_experience ?? 0 }} Years
                        </div>
                    </div>

                    <div class="doctor-info">
                        <div class="doctor-header">
                            <h3 class="doctor-name">{{ $doctor->full_name }}</h3>
                            <p class="doctor-specialty">{{ $doctor->specialty }}</p>
                        </div>

                        <div class="doctor-details">
                            <p class="doctor-bio">
                                {{ Str::limit($doctor->bio ?? 'Experienced dental professional dedicated to providing exceptional care.', 120) }}
                            </p>
                            
                            <!-- التقييم والمراجعات -->
                            <div class="doctor-rating">
                                <div class="stars">
                                    @php
                                        $averageRating = $doctor->average_rating ?? 0;
                                        $fullStars = floor($averageRating);
                                        $hasHalfStar = ($averageRating - $fullStars) >= 0.5;
                                    @endphp
                                    
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $fullStars)
                                            <span class="star filled">★</span>
                                        @elseif($hasHalfStar && $i == $fullStars + 1)
                                            <span class="star half">★</span>
                                        @else
                                            <span class="star">★</span>
                                        @endif
                                    @endfor
                                    <span class="rating-text">{{ number_format($averageRating, 1) }}/5</span>
                                </div>
                                <span class="reviews-count">({{ $doctor->ratings_count ?? 0 }})</span>
                            </div>
                            
                            <!-- المهارات -->
                            @if($doctor->skills && $doctor->skills !== 'null')
                                @php
                                    $skills = is_array($doctor->skills) ? $doctor->skills : explode(',', $doctor->skills);
                                    $skills = array_filter($skills, function($skill) {
                                        return !empty(trim($skill)) && $skill !== 'null';
                                    });
                                @endphp
                                
                                @if(!empty($skills))
                                    <div class="doctor-skills">
                                        @foreach($skills as $skill)
                                            @if($loop->index < 2 && trim($skill))
                                                <span class="skill-tag">{{ trim($skill) }}</span>
                                            @endif
                                        @endforeach
                                        @if(count($skills) > 2)
                                            <span class="skill-tag more">+{{ count($skills) - 2 }}</span>
                                        @endif
                                    </div>
                                @endif
                            @endif
                        </div>

                        <!-- الأزرار -->
                        <div class="doctor-actions">
                            <a href="{{ route('doctors.show', $doctor->id) }}" class="btn-primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                View Profile
                            </a>
                            <a href="{{ route('appointments.create', ['doctor_id' => $doctor->id]) }}" class="btn-secondary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Book Appointment
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="no-results">
                    <div class="no-results-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#A9C4C4" stroke-width="1" width="60" height="60">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3>No doctors found</h3>
                    <p>Try adjusting your filters or search criteria</p>
                    <a href="{{ route('doctors.index') }}" class="filter-btn" style="width: auto; padding: 10px 30px; margin-top: 20px;">
                        Clear Filters
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($doctors->hasPages())
            <div class="pagination-container">
                <div class="pagination-info">
                    Page {{ $doctors->currentPage() }} of {{ $doctors->lastPage() }}
                </div>
                
                <div class="pagination">
                    {{-- Previous Page Link --}}
                    @if($doctors->onFirstPage())
                        <span class="disabled">«</span>
                    @else
                        <a href="{{ $doctors->previousPageUrl() }}">«</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                        $current = $doctors->currentPage();
                        $last = $doctors->lastPage();
                        $start = max($current - 2, 1);
                        $end = min($current + 2, $last);
                    @endphp

                    {{-- First Page & Dots --}}
                    @if($start > 1)
                        <a href="{{ $doctors->url(1) }}">1</a>
                        @if($start > 2)
                            <span class="disabled">...</span>
                        @endif
                    @endif

                    {{-- Page Numbers --}}
                    @for($i = $start; $i <= $end; $i++)
                        @if($i == $current)
                            <span class="active">{{ $i }}</span>
                        @else
                            <a href="{{ $doctors->url($i) }}">{{ $i }}</a>
                        @endif
                    @endfor

                    {{-- Last Page & Dots --}}
                    @if($end < $last)
                        @if($end < $last - 1)
                            <span class="disabled">...</span>
                        @endif
                        <a href="{{ $doctors->url($last) }}">{{ $last }}</a>
                    @endif

                    {{-- Next Page Link --}}
                    @if($doctors->hasMorePages())
                        <a href="{{ $doctors->nextPageUrl() }}">»</a>
                    @else
                        <span class="disabled">»</span>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Header scroll effect
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
            
            // Add hover effect to doctor cards
            const doctorCards = document.querySelectorAll('.doctor-card');
            doctorCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Filter form animation
            const filterForm = document.querySelector('.filters-form');
            if (filterForm) {
                filterForm.addEventListener('submit', function(e) {
                    const filterBtn = this.querySelector('.filter-btn');
                    if (filterBtn) {
                        filterBtn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Loading...';
                        filterBtn.disabled = true;
                    }
                });
            }
        });
    </script>
</body>
</html>