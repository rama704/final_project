<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmileCare - Your Bright Smile Awaits</title>
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
            overflow-x: hidden;
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

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 100px;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: #A8C0C4;
            display: flex;
            padding-top: 80px;
        }

        /* Left Content Side - 50% */
        .hero-left {
            flex: 0 0 50%;
            padding: 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        /* Main Title */
        .main-title {
            font-size: 72px;
            font-weight: 300;
            line-height: 1.1;
            color: #fff;
            margin-bottom: 60px;
            max-width: 500px;
            margin-top: 60px;
        }

        /* Stats Cards */
        .stats-container {
            display: flex;
            gap: 20px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .stat-card {
            flex: 1;
            min-width: 160px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #f0f0f0;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .stat-number {
            font-size: 42px;
            font-weight: 300;
            color: #A9C4C4;
            margin-bottom: 8px;
            line-height: 1;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 500;
        }

        /* Button */
        .cta-button {
            background: #A9C4C4;
            color: white;
            border: none;
            padding: 18px 45px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 1px;
            text-transform: uppercase;
            box-shadow: 0 10px 20px rgba(169, 196, 196, 0.3);
            align-self: flex-start;
        }

        .cta-button:hover {
            background: #8fb1b1;
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(169, 196, 196, 0.4);
        }

        /* Right Image Side - 50% */
        .hero-right {
            flex: 0 0 50%;
            position: relative;
            background: #A8C0C4;
            overflow: hidden;
        }

        .hero-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Services Section */
        .services {
            padding: 100px 60px;
            background: #A9C4C4;
        }

        .services-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            display: flex;
            align-items: center;
            gap: 30px;
            transition: all 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            border: 2px solid #A9C4C4;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .service-icon svg {
            width: 40px;
            height: 40px;
            stroke: #A9C4C4;
        }

        .service-info h3 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .service-info p {
            font-size: 13px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .service-link {
            color: #A9C4C4;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* About Section */
        .about {
            padding: 100px 60px;
            background: #A9C4C4;
        }

        .about-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .about-images {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .about-image {
            border-radius: 20px;
            overflow: hidden;
            height: 300px;
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-text h2 {
            font-size: 36px;
            font-weight: 300;
            color: white;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .about-text p {
            font-size: 14px;
            color: white;
            line-height: 1.8;
            margin-bottom: 20px;
            opacity: 0.95;
        }

        .learn-more-btn {
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid white;
            color: white;
            padding: 12px 35px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 20px;
            display: inline-block;
        }

        .learn-more-btn:hover {
            background: white;
            color: #A9C4C4;
        }

        /* Steps Section */
        .steps {
            padding: 100px 60px;
            background: #A9C4C4;
        }

        .steps-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-bottom: 50px;
        }

        .step-card {
            text-align: center;
            position: relative;
        }

        .step-number {
            font-size: 120px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.3);
            line-height: 1;
            margin-bottom: 20px;
        }

        .step-title {
            font-size: 18px;
            font-weight: 600;
            color: white;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .step-description {
            font-size: 13px;
            color: white;
            opacity: 0.9;
            line-height: 1.6;
        }

        .step-arrow {
            position: absolute;
            top: 60px;
            right: -20px;
            font-size: 40px;
            color: rgba(255, 255, 255, 0.3);
        }

        .book-now-btn {
            background: white;
            color: #A9C4C4;
            padding: 15px 50px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.3s;
            letter-spacing: 1px;
            text-transform: uppercase;
            display: block;
            margin: 0 auto;
        }

        .book-now-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* Doctors Section */
        .doctors {
            padding: 100px 60px;
            background: #F5F5F5;
            position: relative;
            overflow: hidden;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 42px;
            font-weight: 300;
            color: #333;
            margin-bottom: 15px;
        }

        .section-header p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        /* Slider Container */
        .doctors-slider-container {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 80px;
        }

        /* Navigation Arrows */
        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .slider-nav:hover {
            background: #A9C4C4;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 25px rgba(169, 196, 196, 0.3);
        }

        .slider-nav:hover svg {
            stroke: white;
        }

        .slider-nav svg {
            width: 24px;
            height: 24px;
            stroke: #A9C4C4;
            stroke-width: 2;
            transition: stroke 0.3s ease;
        }

        .slider-prev {
            left: 0;
        }

        .slider-next {
            right: 0;
        }

        /* Slider - Updated for smaller cards */
        .doctors-slider {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: calc((100% - 40px) / 3); /* Reduced gap */
            gap: 20px; /* Reduced from 30px */
            padding: 20px 10px 40px;
            overflow-x: auto;
            scroll-behavior: smooth;
            scrollbar-width: none;
            -ms-overflow-style: none;
            cursor: grab;
        }

        .doctors-slider::-webkit-scrollbar {
            display: none;
        }

        .doctors-slider:active {
            cursor: grabbing;
        }

        /* Doctor Card - SMALLER VERSION */
        .doctor-card {
            background: white;
            border-radius: 15px; /* Reduced from 20px */
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08); /* Lighter shadow */
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.1); /* Faster transition */
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            min-height: 450px; /* Reduced from 550px */
        }

        .doctor-card:hover {
            transform: translateY(-8px); /* Reduced from -10px */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12); /* Lighter hover shadow */
        }

        .doctor-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px; /* Thinner */
            background: linear-gradient(90deg, #A9C4C4, #8FB1B1, #A9C4C4);
            transform: scaleX(0);
            transition: transform 0.3s ease; /* Faster */
            transform-origin: left;
        }

        .doctor-card:hover::before {
            transform: scaleX(1);
        }

        /* Doctor Image - Smaller */
        .doctor-image {
            height: 200px; /* Reduced from 280px */
            background: linear-gradient(135deg, #A8C0C4 0%, #8FB1B1 100%);
            position: relative;
            overflow: hidden;
        }

        .doctor-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease; /* Faster */
        }

        .doctor-image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #A8C0C4 0%, #8FB1B1 100%);
        }

        .doctor-image-placeholder svg {
            width: 60px; /* Smaller */
            height: 60px;
            opacity: 0.3;
        }

        .doctor-card:hover .doctor-image img {
            transform: scale(1.04); /* Less zoom */
        }

        .doctor-badge {
            position: absolute;
            top: 15px; /* Adjusted */
            right: 15px;
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            color: white;
            padding: 6px 12px; /* Smaller */
            border-radius: 30px; /* Smaller radius */
            font-size: 0.75rem; /* Smaller font */
            font-weight: 600;
            letter-spacing: 0.3px;
            box-shadow: 0 3px 10px rgba(169, 196, 196, 0.4);
            z-index: 2;
        }

        /* Doctor Info - Smaller */
        .doctor-info {
            padding: 20px; /* Reduced from 30px */
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .doctor-header {
            margin-bottom: 12px; /* Reduced */
        }

        .doctor-name {
            font-size: 1.2rem; /* Smaller font */
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .doctor-specialty {
            color: #A9C4C4;
            font-size: 0.85rem; /* Smaller */
            font-weight: 600;
            margin-bottom: 15px; /* Reduced */
            padding-bottom: 12px; /* Reduced */
            border-bottom: 1px solid #f3f4f6; /* Thinner */
            position: relative;
        }

        .doctor-specialty::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 40px; /* Shorter */
            height: 2px;
            background: linear-gradient(90deg, #A9C4C4, #8FB1B1);
            border-radius: 1px;
        }

        .doctor-details {
            flex-grow: 1;
        }

        .doctor-bio {
            color: #6b7280;
            line-height: 1.5;
            margin-bottom: 15px; /* Reduced */
            font-size: 0.85rem; /* Smaller */
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Show less lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Rating - Smaller */
        .doctor-rating {
            display: flex;
            align-items: center;
            gap: 8px; /* Reduced */
            margin: 12px 0; /* Reduced */
        }

        .stars {
            display: flex;
            align-items: center;
            gap: 1px; /* Tighter */
        }

        .star {
            color: #e0e0e0;
            font-size: 16px; /* Smaller stars */
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
            font-size: 13px; /* Smaller */
            font-weight: 600;
            color: #333;
            margin-left: 6px; /* Reduced */
        }

        .reviews-count {
            font-size: 11px; /* Smaller */
            color: #666;
        }

        /* Skills - Smaller */
        .doctor-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px; /* Reduced */
            margin: 12px 0; /* Reduced */
        }

        .skill-tag {
            background: rgba(169, 196, 196, 0.1);
            color: #A9C4C4;
            padding: 3px 8px; /* Smaller */
            border-radius: 12px; /* Smaller */
            font-size: 10px; /* Smaller */
            font-weight: 500;
            border: 1px solid rgba(169, 196, 196, 0.2);
        }

        .skill-tag.more {
            background: rgba(169, 196, 196, 0.2);
            font-weight: 600;
        }

        /* Actions - Smaller */
        .doctor-actions {
            display: flex;
            gap: 10px; /* Reduced */
            margin-top: 15px; /* Reduced */
            padding-top: 15px; /* Reduced */
            border-top: 1px solid #f3f4f6;
        }

        .btn-primary, .btn-secondary {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px; /* Reduced */
            padding: 10px 15px; /* Smaller padding */
            border-radius: 8px; /* Smaller radius */
            text-decoration: none;
            font-weight: 600;
            font-size: 0.8rem; /* Smaller font */
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.3px; /* Reduced */
        }

        .btn-primary svg, .btn-secondary svg {
            width: 14px; /* Smaller icons */
            height: 14px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #A9C4C4, #8FB1B1);
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #8FB1B1, #7DA5A5);
            transform: translateY(-1px); /* Less lift */
            box-shadow: 0 4px 15px rgba(169, 196, 196, 0.4); /* Lighter */
        }

        .btn-secondary {
            background: white;
            color: #A9C4C4;
            border: 1.5px solid #A9C4C4; /* Thinner border */
            cursor: pointer;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #8FB1B1;
            color: #8FB1B1;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(169, 196, 196, 0.2);
        }

        /* Dots */
        .slider-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 25px; /* Reduced */
        }

        .slider-dot {
            width: 8px; /* Smaller */
            height: 8px;
            border-radius: 50%;
            background: #E0E0E0;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0;
        }

        .slider-dot.active {
            background: #A9C4C4;
            transform: scale(1.1); /* Less scaling */
        }

        /* See All Doctors Button */
        .see-all-btn {
            display: inline-block;
            background: transparent;
            color: #A9C4C4;
            padding: 12px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid #A9C4C4;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .see-all-btn:hover {
            background: #A9C4C4;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(169, 196, 196, 0.3);
        }

        /* Footer */
        footer {
            background: #2D3748;
            color: white;
            padding: 60px 60px 30px;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #A9C4C4;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-section p,
        .footer-section a {
            color: #CBD5E0;
            font-size: 13px;
            line-height: 2;
            text-decoration: none;
            display: block;
        }

        .footer-section a:hover {
            color: #A9C4C4;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #A0AEC0;
            font-size: 12px;
        }

        /* Header Right Section */
        .header-right {
            display: flex;
            align-items: center;
            gap: 25px;
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
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* تحسين تنسيق أزرار تسجيل الدخول والتسجيل */
        .header-right a.logout-btn {
            text-decoration: none;
            color: white;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 8px 18px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.15);
        }

        .header-right a.logout-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* زر التسجيل بلون مختلف */
        .header-right a.logout-btn[href*="register"] {
            background: #A9C4C4;
            border-color: #8FB1B1;
        }

        .header-right a.logout-btn[href*="register"]:hover {
            background: #8FB1B1;
            border-color: #7DA5A5;
        }

        /* مسافات بين الأزرار للضيوف */
        .header-right > div {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .doctor-card {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Responsive Design - Updated for smaller cards */
        @media (max-width: 1200px) {
            .main-title {
                font-size: 60px;
            }
            
            .hero-left, .hero-right {
                flex: 0 0 50%;
            }

            .doctors-slider {
                grid-auto-columns: calc((100% - 30px) / 2); /* Adjusted for smaller gap */
            }
        }

        @media (max-width: 992px) {
            .hero {
                flex-direction: column;
                min-height: auto;
            }
            
            .hero-left, .hero-right {
                flex: 0 0 100%;
            }
            
            .hero-right {
                height: 500px;
            }
            
            .hero-left {
                padding: 60px 40px;
            }

            .services-grid,
            .about-content {
                grid-template-columns: 1fr;
            }

            .doctors-slider-container {
                padding: 0 60px;
            }
            
            .doctors-slider {
                grid-auto-columns: calc((100% - 20px) / 2);
            }
        }

        @media (max-width: 768px) {
            .main-title {
                font-size: 48px;
                margin-top: 30px;
                margin-bottom: 40px;
            }
            
            .stat-number {
                font-size: 36px;
            }
            
            .stats-container {
                gap: 15px;
            }
            
            .stat-card {
                flex: 0 0 calc(50% - 15px);
                padding: 20px;
            }
            
            .hero-left {
                padding: 40px 20px;
            }

            header {
                padding: 15px 20px;
            }
            
            header.scrolled {
                padding: 12px 20px;
            }
            
            nav {
                gap: 15px;
            }
            
            nav a {
                font-size: 11px;
            }

            .header-right {
                gap: 15px;
            }

            .header-right > div {
                gap: 10px;
            }

            .logout-btn {
                padding: 6px 12px;
                font-size: 11px;
            }

            .header-right a.logout-btn {
                padding: 6px 12px;
                font-size: 11px;
            }

            .doctors-slider {
                grid-auto-columns: calc(100% - 10px); /* Adjusted */
                gap: 15px;
            }

            .slider-nav {
                width: 40px;
                height: 40px;
            }

            .doctor-image {
                height: 180px; /* Smaller on mobile */
            }
            
            .doctor-card {
                min-height: 420px; /* Smaller on mobile */
            }

            .doctors-slider-container {
                padding: 0 40px;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 36px;
            }
            
            .stat-card {
                flex: 0 0 100%;
            }
            
            .cta-button {
                width: 100%;
                text-align: center;
            }

            .user-greeting {
                display: none;
            }

            .header-right {
                gap: 10px;
            }

            .header-right > div {
                flex-direction: column;
                gap: 8px;
            }
            
            .header-right a.logout-btn {
                width: 100px;
                text-align: center;
                justify-content: center;
            }

            .doctors-slider-container {
                padding: 0 20px;
            }

            .doctor-actions {
                flex-direction: column;
            }

            .doctor-rating {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .section-header h2 {
                font-size: 28px;
            }
            
            .doctor-card {
                min-height: 400px;
            }
            
            .doctor-image {
                height: 160px;
            }

            nav a {
                font-size: 10px;
                letter-spacing: 0.5px;
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
        <a href="#home">HOME</a>
        <a href="#about">ABOUT</a>
        <a href="#service">SERVICE</a>
        <a href="#doctor">DOCTORS</a>
        <a href="#contact">CONTACT</a>
        <a href="{{ route(name: 'patients.profile') }}" style="color: #fff; font-weight: 600;">MY PROFILE</a>
        <a href="{{ route(name: 'appointments.create') }}" style="color: #fff; font-weight: 600;">MY APPOINTMENTS</a>
    </nav>

    
    <div class="header-right">
       
        
        <!-- Conditional Display based on Auth Status -->
        @auth
            <!-- User Greeting (Visible when logged in) -->
            <div class="user-greeting">
                <span class="hello-text">Hello,</span>
                <span class="user-name">{{ Auth::user()->name }}</span>
            </div>
            
            <!-- Logout Button (Visible when logged in) -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    LOGOUT
                </button>
            </form>
        @else
            <!-- Login and Register Links (Visible when guest) -->
            <div style="display: flex; gap: 15px; align-items: center;">
                <a href="{{ route('login') }}" class="logout-btn" style="text-decoration: none; background: rgba(255,255,255,0.1);">
                    LOGIN
                </a>
                <a href="{{ route('register') }}" class="logout-btn" style="text-decoration: none; background: #A9C4C4;">
                    REGISTER
                </a>
            </div>
        @endauth
    </div>
</header>

<section class="hero" id="home">
        <!-- Left Side - Content (50%) -->
        <div class="hero-left">
            <!-- Main Title -->
            <h1 class="main-title">
                Your Bright<br>
                Smile Awaits
            </h1>

            <!-- Stats Cards -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number">+250</div>
                    <div class="stat-label">OUR CASES</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">2014</div>
                    <div class="stat-label">ABOUT US</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">+8</div>
                    <div class="stat-label">TEAM</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">99%</div>
                    <div class="stat-label">WHY CHOOSE US</div>
                </div>
            </div>

            <!-- CTA Button -->
          <!-- CTA Button -->
<button class="cta-button" onclick="window.location.href='{{ route('appointments.create') }}'">
    BOOK AN APPOINTMENT
</button>
        </div>

        <!-- Right Side - Image (50%) -->
        <div class="hero-right">
            <!-- الصورة هنا -->
            <img src="{{ asset('img/dental-removebg-preview.png') }}" alt="Dental Care">
        </div>
    </section>


    <!-- Services Section -->
    <section class="services" id="service">
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path d="M12 2v20M2 12h20" />
                    </svg>
                </div>
                <div class="service-info">
                    <h3>Teeth Cleaning</h3>
                    <p>Professional dental cleaning to remove plaque and tartar, ensuring your teeth stay healthy and
                        bright.</p>
                    <a href="#" class="service-link">Read More →</a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                </div>
                <div class="service-info">
                    <h3>Fillings and Restorations</h3>
                    <p>High-quality dental fillings to restore the function and integrity of your damaged teeth.</p>
                    <a href="#" class="service-link">Read More →</a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                    </svg>
                </div>
                <div class="service-info">
                    <h3>Tooth Extractions</h3>
                    <p>Safe and comfortable tooth removal procedures performed with the latest techniques.</p>
                    <a href="#" class="service-link">Read More →</a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <path
                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                    </svg>
                </div>
                <div class="service-info">
                    <h3>Orthodontic Treatments</h3>
                    <p>Modern braces and aligners to straighten your teeth and improve your smile.</p>
                    <a href="#" class="service-link">Read More →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="about-content">
            <div class="about-images">
                <div class="about-image">
                    <img src="{{ asset('img/braces.jpg') }}" alt="Dental">
                </div>
                <div class="about-image">
                    <img src="{{ asset('img/dental_care.jpg') }}" alt="Dental">
                </div>
            </div>
            <div class="about-text">
                <h2>At SmileCare, we are dedicated to providing top-quality dental care with a personal touch.</h2>
                <p>Our experienced team of professionals is committed to your oral health, offering a wide range of
                    services to meet your dental needs.</p>
                <p>We take pride in creating a warm and welcoming environment where you can feel comfortable. Your smile
                    is our priority, and we're here to ensure it's a healthy, beautiful one.</p>
                <p>With comprehensive dental solutions and a compassionate approach to dentistry.</p>
                <button class="learn-more-btn">Learn More</button>
            </div>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="steps">
        <div class="steps-container">
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">01</div>
                    <h3 class="step-title">Schedule</h3>
                    <p class="step-description">Easy booking for your convenience</p>
                    <div class="step-arrow">›</div>
                </div>
                <div class="step-card">
                    <div class="step-number">02</div>
                    <h3 class="step-title">Assessment</h3>
                    <p class="step-description">Comprehensive oral health evaluation</p>
                    <div class="step-arrow">›</div>
                </div>
                <div class="step-card">
                    <div class="step-number">03</div>
                    <h3 class="step-title">Treatment</h3>
                    <p class="step-description">Tailored dental care solutions</p>
                </div>
            </div>
            <button class="book-now-btn">Book Now</button>
        </div>
    </section>

    <!-- Doctors Section -->
    <section class="doctors" id="doctor">
        <div class="section-header">
            <h2>Meet Our Expert Team</h2>
            <p>Dedicated professionals committed to your dental health</p>

            <a href="{{ route('doctors.index') }}" class="see-all-btn">
                See All Doctors
            </a>
        </div>

        <div class="doctors-slider-container">
            <!-- زر السابق -->
            <button class="slider-nav slider-prev" aria-label="View previous doctors">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            
            <!-- حاوية السلايدر -->
            <div class="doctors-slider">
                @foreach($doctors as $index => $doctor)
                    <div class="doctor-card" data-index="{{ $index }}">
                        <!-- صورة الدكتور -->
                        <div class="doctor-image">
                            @if($doctor->image && file_exists(public_path('storage/' . $doctor->image)))
                                <img src="{{ asset('storage/' . $doctor->image) }}" alt="{{ $doctor->full_name }}" loading="lazy">
                            @else
                                <div class="doctor-image-placeholder">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="#A9C4C4" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="doctor-badge">
                                {{ $doctor->years_of_experience ?? 0 }} Years Exp.
                            </div>
                        </div>

                        <!-- معلومات الدكتور -->
                        <div class="doctor-info">
                            <div class="doctor-header">
                                <h3 class="doctor-name">{{ $doctor->full_name }}</h3>
                                <p class="doctor-specialty">{{ $doctor->specialty }}</p>
                            </div>

                            <div class="doctor-details">
                                <p class="doctor-bio">
                                    {{ Str::limit($doctor->bio, 100) }} <!-- Show less text -->
                                </p>
                                
                                <!-- التقييم والمراجعات - تم التحديث -->
                                <div class="doctor-rating">
                                    <div class="stars">
                                        @php
                                            // استخدام العلاقة الجديدة من الموديل
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
                                        <span class="rating-text">{{ number_format($averageRating, 1) }}</span>
                                    </div>
                                    <span class="reviews-count">({{ $doctor->ratings_count ?? 0 }})</span>
                                </div>
                                
                                <!-- المهارات - Show less skills -->
                                @php
                                    $skills = [];
                                    if ($doctor->skills) {
                                        if (is_array($doctor->skills)) {
                                            $skills = $doctor->skills;
                                        } elseif (is_string($doctor->skills)) {
                                            $skills = json_decode($doctor->skills, true) ?? [];
                                            if (empty($skills)) {
                                                $skills = array_filter(array_map('trim', explode(',', $doctor->skills)));
                                            }
                                        }
                                    }
                                @endphp
                                
                                @if(!empty($skills))
                                    <div class="doctor-skills">
                                        @foreach($skills as $skill)
                                            @if($loop->index < 2 && !empty(trim($skill))) <!-- Show only 2 skills -->
                                                <span class="skill-tag">{{ trim($skill) }}</span>
                                            @endif
                                        @endforeach
                                        @if(count($skills) > 2)
                                            <span class="skill-tag more">+{{ count($skills) - 2 }}</span>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- الأزرار -->
                            <div class="doctor-actions">
                                <a href="{{ route('doctors.show', $doctor->id) }}" class="btn-primary">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    View
                                </a>
                                <a href="" class="btn-secondary">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Book
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- زر التالي -->
            <button class="slider-nav slider-next" aria-label="View next doctors">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </button>
            
            <!-- النقاط الدالة على الصفحات -->
            <div class="slider-dots">
                @for($i = 0; $i < min(count($doctors), 5); $i++)
                    <button class="slider-dot {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
                @endfor
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-section">
                <h3>SmileCare</h3>
                <p>Your trusted partner in dental care.</p>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: info@smilecare.com</p>
                <p>Phone: +1 234 567 890</p>
                <p>Address: 123 Dental Street, City</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="#home">Home</a>
                <a href="#about">About Us</a>
                <a href="#service">Services</a>
                <a href="#doctor">Doctors</a>
            </div>
            <div class="footer-section">
                <h3>Working Hours</h3>
                <p>Mon - Fri: 8:00 AM - 8:00 PM</p>
                <p>Saturday: 9:00 AM - 6:00 PM</p>
                <p>Sunday: 10:00 AM - 4:00 PM</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} SmileCare Dental Clinic. All rights reserved.</p>
        </div>
    </footer>

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
            
            // Slider functionality
            const slider = document.querySelector('.doctors-slider');
            const prevBtn = document.querySelector('.slider-prev');
            const nextBtn = document.querySelector('.slider-next');
            const dots = document.querySelectorAll('.slider-dot');
            const cards = document.querySelectorAll('.doctor-card');
            
            let currentIndex = 0;
            let isDragging = false;
            let startX = 0;
            let endX = 0;
            
            // عدد البطاقات المعروضة
            const getVisibleCardsCount = () => {
                if (window.innerWidth >= 1200) return 3;
                if (window.innerWidth >= 768) return 2;
                return 1;
            };
            
            // تحديث النقاط
            function updateDots(index) {
                const dotIndex = Math.floor(index / getVisibleCardsCount());
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === dotIndex);
                });
            }
            
            // تحريك السلايدر
            function moveSlider(index) {
                if (!cards.length) return;
                
                const cardWidth = cards[0].offsetWidth + 20; // Smaller gap
                currentIndex = index;
                
                slider.scrollTo({
                    left: index * cardWidth,
                    behavior: 'smooth'
                });
                
                updateDots(index);
            }
            
            // أحداث الأزرار
            prevBtn?.addEventListener('click', () => {
                if (currentIndex > 0) {
                    moveSlider(currentIndex - getVisibleCardsCount());
                }
            });
            
            nextBtn?.addEventListener('click', () => {
                const maxIndex = Math.max(0, cards.length - getVisibleCardsCount());
                if (currentIndex < maxIndex) {
                    moveSlider(currentIndex + getVisibleCardsCount());
                }
            });
            
            // أحداث النقاط
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const index = parseInt(dot.dataset.index);
                    moveSlider(index * getVisibleCardsCount());
                });
            });
            
            // السحب على الأجهزة المحمولة
            slider.addEventListener('touchstart', (e) => {
                isDragging = true;
                startX = e.touches[0].clientX;
            });
            
            slider.addEventListener('touchend', (e) => {
                if (!isDragging) return;
                isDragging = false;
                endX = e.changedTouches[0].clientX;
                handleSwipe();
            });
            
            function handleSwipe() {
                const threshold = 40; // Smaller threshold for smaller cards
                const diff = startX - endX;
                
                if (Math.abs(diff) > threshold) {
                    if (diff > 0 && currentIndex < cards.length - getVisibleCardsCount()) {
                        // سحب لليسار - التالي
                        moveSlider(currentIndex + getVisibleCardsCount());
                    } else if (diff < 0 && currentIndex > 0) {
                        // سحب لليمين - السابق
                        moveSlider(currentIndex - getVisibleCardsCount());
                    }
                }
            }
            
            // التحريك التلقائي
            let autoSlideInterval;
            
            function startAutoSlide() {
                autoSlideInterval = setInterval(() => {
                    const maxIndex = Math.max(0, cards.length - getVisibleCardsCount());
                    if (currentIndex >= maxIndex) {
                        moveSlider(0);
                    } else {
                        moveSlider(currentIndex + getVisibleCardsCount());
                    }
                }, 5000);
            }
            
            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }
            
            // إدارة التحريك التلقائي
            slider.addEventListener('mouseenter', stopAutoSlide);
            slider.addEventListener('touchstart', stopAutoSlide);
            
            slider.addEventListener('mouseleave', () => {
                if (!isDragging) startAutoSlide();
            });
            
            slider.addEventListener('touchend', () => {
                setTimeout(startAutoSlide, 3000);
            });
            
            // بدء التحريك التلقائي
            startAutoSlide();
            
            // تحديث عند تغيير حجم النافذة
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    updateDots(currentIndex);
                }, 250);
            });
            
            // CTA button functionality
            document.querySelector('.cta-button')?.addEventListener('click', function() {
                window.scrollTo({
                    top: document.getElementById('doctor').offsetTop - header.offsetHeight,
                    behavior: 'smooth'
                });
            });
            
            // Book Now buttons in steps section
            document.querySelector('.book-now-btn')?.addEventListener('click', function() {
                window.scrollTo({
                    top: document.getElementById('doctor').offsetTop - header.offsetHeight,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>