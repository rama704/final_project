<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - SmileCare</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background: #f5f7fa;
            color: #333;
            min-height: 100vh;
        }

        /* ================= HEADER ================= */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 18px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(90deg, #7fbcbc, #6aa9a9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            letter-spacing: 2px;
        }

        .logo svg {
            width: 28px;
            height: 28px;
        }

        nav {
            display: flex;
            gap: 36px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 1px;
            opacity: 0.85;
            transition: all 0.3s ease;
        }

        nav a:hover,
        nav a.active {
            opacity: 1;
            font-weight: 600;
            border-bottom: 2px solid rgba(255,255,255,0.9);
            padding-bottom: 4px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .admin-greeting {
            text-align: left;
            color: white;
        }

        .admin-role {
            font-size: 11px;
            opacity: 0.85;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .admin-name {
            font-size: 14px;
            font-weight: 600;
        }

        .logout-btn {
            background: rgba(255,255,255,0.18);
            border: 1px solid rgba(255,255,255,0.4);
            color: white;
            padding: 8px 18px;
            font-size: 12px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.28);
            transform: translateY(-1px);
        }

        /* ================= MAIN CONTENT ================= */
        .main-content {
            margin-top: 110px;
            padding: 40px 60px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .page-header {
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 34px;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #666;
        }

        /* ================= ALERTS ================= */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* ================= FORM UI ================= */
        .form-card {
            background: #fff;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .form-section {
            margin-bottom: 35px;
        }

        .form-section h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .form-section p {
            font-size: 13px;
            color: #6b7280;
            margin-top: 4px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }

        .input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            transition: 0.2s ease;
            background: #fff;
            font-family: 'Tajawal', sans-serif;
        }

        .input:focus {
            outline: none;
            border-color: #4fa6a6;
            box-shadow: 0 0 0 3px rgba(79,166,166,0.2);
        }

        textarea.input {
            resize: vertical;
            min-height: 100px;
        }

        /* Error Messages */
        .error-message {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        /* Buttons */
        .btn {
            padding: 10px 26px;
            border-radius: 14px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.25s;
            border: none;
            font-family: 'Tajawal', sans-serif;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .btn-primary {
            background: linear-gradient(90deg, #4fa6a6, #3c8f8f);
            color: white;
            font-weight: 500;
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* ================= TABLES ================= */
        .table-container {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-th {
            padding: 14px;
            font-size: 12px;
            text-transform: uppercase;
            color: #475569;
            text-align: right;
            font-weight: 600;
            border-bottom: 2px solid #e5e7eb;
        }

        .table-td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
            text-align: right;
        }

        .table-row:hover {
            background: #f9fafb;
        }

        /* Badges */
        .badge {
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 12px;
            margin-left: 5px;
            display: inline-block;
        }

        .badge-booked {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-completed {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-canceled {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Actions */
        .action-links {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        .action-link {
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .action-link.edit {
            color: #2563eb;
            background: #dbeafe;
        }

        .action-link.edit:hover {
            background: #bfdbfe;
        }

        .action-link.delete {
            color: #dc2626;
            background: #fee2e2;
        }

        .action-link.delete:hover {
            background: #fecaca;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 25px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 13px;
            text-decoration: none;
            color: #4b5563;
            background: #f3f4f6;
            transition: all 0.2s;
        }

        .pagination a:hover {
            background: #e5e7eb;
            color: #1f2937;
        }

        .pagination .active {
            background: #4fa6a6;
            color: white;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            nav {
                display: none;
            }

            .main-content {
                padding: 20px;
                margin-top: 90px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- HEADER -->
<header>
    <div class="logo">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
        </svg>
        SmileCare
    </div>

    <nav>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">لوحة التحكم</a>
        <a href="{{ route('admin.patients.index') }}" class="{{ request()->routeIs('admin.patients.*') ? 'active' : '' }}">المرضى</a>
        <a href="{{ route('admin.doctors.index') }}" class="{{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">الأطباء</a>
        <a href="{{ route('admin.appointments.index') }}" class="{{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">المواعيد</a>
        <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">المستخدمين</a>
    </nav>

    <div class="header-right">
        <div class="admin-greeting">
            <div class="admin-role">لوحة الإدارة</div>
            <div class="admin-name">{{ Auth::user()->name ?? 'Admin' }}</div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">تسجيل الخروج</button>
        </form>
    </div>
</header>

<!-- CONTENT -->
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>