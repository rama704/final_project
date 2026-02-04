<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmileCare Admin</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
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
            text-align: right;
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
        }

        .form-section p {
            font-size: 13px;
            color: #6b7280;
            margin-top: 4px;
        }

        .input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            transition: 0.2s ease;
            background: #fff;
        }

        .input:focus {
            outline: none;
            border-color: #4fa6a6;
            box-shadow: 0 0 0 3px rgba(79,166,166,0.2);
        }

        textarea.input {
            resize: none;
        }

        /* Buttons */
        .btn {
            padding: 10px 26px;
            border-radius: 14px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.25s;
            border: none;
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

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
            }

            nav {
                display: none;
            }

            .main-content {
                padding: 20px;
                margin-top: 90px;
            }

            /* Table */
.table-th {
    padding: 14px;
    font-size: 12px;
    text-transform: uppercase;
    color: #475569;
}

.table-td {
    padding: 14px;
    border-bottom: 1px solid #e5e7eb;
    font-size: 14px;
}

.table-row:hover {
    background: #f9fafb;
}

/* Badges */
.badge {
    padding: 4px 10px;
    font-size: 11px;
    border-radius: 12px;
    margin-right: 5px;
    display: inline-block;
}

.badge-danger {
    background: #fee2e2;
    color: #991b1b;
}

.badge-warning {
    background: #fef3c7;
    color: #92400e;
}

/* Actions */
.action-link {
    font-size: 13px;
    margin-right: 10px;
    cursor: pointer;
    background: none;
    border: none;
}

.action-link.edit {
    color: #2563eb;
}

.action-link.delete {
    color: #dc2626;
}

/* Details Page */
.details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
    margin-bottom: 35px;
}

.details-box {
    background: #f8fafc;
    padding: 18px;
    border-radius: 14px;
}

.details-box span {
    font-size: 12px;
    color: #6b7280;
    display: block;
    margin-bottom: 6px;
}

.details-box strong {
    font-size: 15px;
    color: #1f2937;
}

.details-section {
    border-top: 1px solid #e5e7eb;
    padding-top: 25px;
    margin-top: 25px;
}

.details-section h4 {
    margin-bottom: 15px;
    font-size: 16px;
}

/* Appointments */
.appointments-list {
    list-style: none;
    padding: 0;
}

.appointments-list li {
    padding: 12px 0;
    border-bottom: 1px solid #e5e7eb;
}

.view-all-btn {
    display: inline-block;
    margin-top: 15px;
    font-size: 14px;
    color: #3c8f8f;
}
   /* CSS بسيط للتأكد من عمل الصفحة */
    .input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
    }
    
    .btn {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        display: inline-flex;
        align-items: center;
    }
    
    .btn-primary {
        background: #3b82f6;
        color: white;
    }
    
    .btn-secondary {
        background: #6b7280;
        color: white;
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
        <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
        <a href="{{ route('admin.patients.index') }}">Patients</a>
        <a href="{{ route('admin.doctors.index') }}">Doctors</a>
        <a href="{{ route('admin.appointments.index') }}">Appointments</a>
        <a href="#">Reports</a>
    </nav>

    <div class="header-right">
        <div class="admin-greeting">
            <div class="admin-role">Admin Panel</div>
            <div class="admin-name">{{ Auth::user()->name ?? 'Admin' }}</div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</header>

<!-- CONTENT -->
<div class="main-content">
    @yield('content')
</div>

</body>
</html>
