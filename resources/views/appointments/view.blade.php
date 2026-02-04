<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Appointments - SmileCare</title>
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
        .appointments-container {
            max-width: 1200px;
            margin: 0 auto 80px;
            padding: 0 40px;
        }

        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 10px 25px;
            background: white;
            border: 2px solid #E2E8F0;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            margin-top: 10px;
            margin-left: 40px;
        }

        .filter-tab:hover {
            border-color: #A9C4C4;
        }

        .filter-tab.active {
            background: #A9C4C4;
            color: white;
            border-color: #A9C4C4;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .stat-number {
            font-size: 36px;
            font-weight: 600;
            color: #A9C4C4;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Appointments List */
        .appointments-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .no-appointments {
            text-align: center;
            padding: 60px 40px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .no-appointments-icon {
            font-size: 48px;
            color: #CBD5E0;
            margin-bottom: 20px;
        }

        /* Appointment Card */
        .appointment-item {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            border-left: 4px solid #A9C4C4;
        }

        .appointment-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .appointment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #E2E8F0;
        }

        .appointment-id {
            font-size: 12px;
            color: #718096;
            background: #F7FAFC;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-scheduled { background: #C6F6D5; color: #22543D; }
        .status-confirmed { background: #BEE3F8; color: #2A4365; }
        .status-completed { background: #E9D8FD; color: #44337A; }
        .status-cancelled { background: #FED7D7; color: #742A2A; }
        .status-pending { background: #FEFCBF; color: #744210; }

        .appointment-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .info-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .info-label {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-value {
            font-size: 16px;
            font-weight: 500;
            color: #2D3748;
        }

        .info-value strong {
            color: #A9C4C4;
            font-weight: 600;
        }

        .doctor-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .doctor-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .doctor-details h4 {
            font-size: 16px;
            font-weight: 600;
            color: #2D3748;
            margin-bottom: 5px;
        }

        .doctor-details p {
            font-size: 14px;
            color: #718096;
        }

        .appointment-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #E2E8F0;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: #A9C4C4;
            color: white;
        }

        .btn-primary:hover {
            background: #8FB1B1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(169, 196, 196, 0.3);
        }

        .btn-secondary {
            background: #F7FAFC;
            color: #4A5568;
            border: 2px solid #E2E8F0;
        }

        .btn-secondary:hover {
            background: #E2E8F0;
            border-color: #CBD5E0;
        }

        .btn-danger {
            background: #FED7D7;
            color: #742A2A;
            border: 2px solid #FC8181;
        }

        .btn-danger:hover {
            background: #FEB2B2;
        }

        /* Appointment Details Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal {
            background: white;
            border-radius: 20px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            padding: 30px;
            background: #A9C4C4;
            color: white;
            border-radius: 20px 20px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 24px;
            font-weight: 600;
        }

        .modal-close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 5px;
        }

        .modal-body {
            padding: 30px;
        }

        .modal-section {
            margin-bottom: 25px;
        }

        .modal-section h4 {
            font-size: 18px;
            color: #A9C4C4;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #F0F0F0;
        }

        .modal-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .modal-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .modal-label {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .modal-value {
            font-size: 16px;
            font-weight: 500;
            color: #2D3748;
        }

        /* Loading */
        .loading {
            text-align: center;
            padding: 60px;
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
            
            .appointments-container {
                padding: 0 20px;
            }
            
            .appointment-header {
                flex-direction: column;
                gap: 15px;
            }
            
            .appointment-content {
                grid-template-columns: 1fr;
            }
            
            .modal-grid {
                grid-template-columns: 1fr;
            }
            
            .appointment-actions {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .filter-tabs {
                flex-direction: column;
            }
            
            .filter-tab {
                text-align: center;
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
            <a href="{{ route('appointments.create') }}" style="background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 20px;">
                BOOK NOW
            </a>
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
        <h1>My Appointments</h1>
        <p>View and manage your scheduled appointments</p>
    </div>

    <!-- Appointments Container -->
    <div class="appointments-container">
        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <div class="filter-tab active" data-filter="all">All Appointments</div>
            <div class="filter-tab" data-filter="upcoming">Upcoming</div>
            <div class="filter-tab" data-filter="pending">Pending</div>
            <div class="filter-tab" data-filter="confirmed">Confirmed</div>
            <div class="filter-tab" data-filter="completed">Completed</div>
            <div class="filter-tab" data-filter="cancelled">Cancelled</div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number" id="totalAppointments">0</div>
                <div class="stat-label">Total Appointments</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="upcomingAppointments">0</div>
                <div class="stat-label">Upcoming</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="pendingAppointments">0</div>
                <div class="stat-label">Pending</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="completedAppointments">0</div>
                <div class="stat-label">Completed</div>
            </div>
        </div>

        <!-- Appointments List -->
        <div class="appointments-list" id="appointmentsList">
            <div class="loading">
                <div class="loading-spinner"></div>
                <p>Loading appointments...</p>
            </div>
        </div>

        <!-- No Appointments Message (Hidden by default) -->
        <div class="no-appointments" id="noAppointments" style="display: none;">
            <div class="no-appointments-icon">📅</div>
            <h3>No Appointments Found</h3>
            <p>You don't have any appointments yet.</p>
            <a href="{{ route('appointments.create') }}" class="btn btn-primary" style="margin-top: 20px;">
                Book Your First Appointment
            </a>
        </div>
    </div>

    <!-- Appointment Details Modal -->
    <div class="modal-overlay" id="appointmentModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Appointment Details</h3>
                <button class="modal-close" id="modalClose">&times;</button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>

   <script>
$(document).ready(function () {

    // ===============================
    // CSRF
    // ===============================
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ===============================
    // Variables
    // ===============================
    let allAppointments = [];
    let currentFilter = 'all';
    const now = new Date();

    loadAppointments();

    // ===============================
    // Tabs
    // ===============================
    $('.filter-tab').click(function () {
        $('.filter-tab').removeClass('active');
        $(this).addClass('active');

        currentFilter = $(this).data('filter');
        filterAppointments(currentFilter);
    });

    // ===============================
    // Load appointments
    // ===============================
    function loadAppointments() {
        $.get('{{ route("appointments.data") }}', function (response) {
            if (response.success) {
                allAppointments = response.appointments;
                updateStats();
                filterAppointments(currentFilter);
            }
        });
    }

    // ===============================
    // Stats
    // ===============================
    function updateStats() {
        $('#totalAppointments').text(allAppointments.length);

        $('#upcomingAppointments').text(
            allAppointments.filter(app =>
                ['pending', 'confirmed'].includes(app.status) &&
                new Date(app.appointment_date) >= now
            ).length
        );

        $('#pendingAppointments').text(
            allAppointments.filter(app => app.status === 'pending').length
        );

        $('#completedAppointments').text(
            allAppointments.filter(app => app.status === 'completed').length
        );
    }

    // ===============================
    // Filters
    // ===============================
    function filterAppointments(filter) {
        let result = allAppointments;

        switch (filter) {
            case 'upcoming':
                result = allAppointments.filter(app =>
                    ['pending', 'confirmed'].includes(app.status) &&
                    new Date(app.appointment_date) >= now
                );
                break;

            case 'pending':
                result = allAppointments.filter(app => app.status === 'pending');
                break;

            case 'confirmed':
                result = allAppointments.filter(app => app.status === 'confirmed');
                break;

            case 'completed':
                result = allAppointments.filter(app => app.status === 'completed');
                break;

            case 'cancelled':
                result = allAppointments.filter(app => app.status === 'cancelled');
                break;
        }

        displayAppointments(result);
    }

    // ===============================
    // Render
    // ===============================
    function displayAppointments(appointments) {
        const list = $('#appointmentsList');
        const empty = $('#noAppointments');

        if (!appointments.length) {
            list.hide();
            empty.show();
            return;
        }

        empty.hide();
        list.show();

        appointments.sort((a, b) =>
            new Date(b.appointment_date) - new Date(a.appointment_date)
        );

        let html = '';

        appointments.forEach(app => {

            const date = new Date(app.appointment_date).toLocaleDateString('en-US', {
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
            });

            const time = formatTime(app.appointment_time);

            let statusText = '';
            let statusClass = '';

            switch (app.status) {
                case 'pending':
                    statusText = 'Pending';
                    statusClass = 'status-pending';
                    break;
                case 'confirmed':
                    statusText = 'Confirmed';
                    statusClass = 'status-confirmed';
                    break;
                case 'completed':
                    statusText = 'Completed';
                    statusClass = 'status-completed';
                    break;
                case 'cancelled':
                    statusText = 'Cancelled';
                    statusClass = 'status-cancelled';
                    break;
            }

            html += `
            <div class="appointment-item">
                <div class="appointment-header">
                    <h3>${app.service_type.replace('_', ' ')}</h3>
                    <span class="status-badge ${statusClass}">${statusText}</span>
                </div>

                <p><strong>${date}</strong> – ${time}</p>
                <p>Doctor: ${app.doctor_name}</p>

                ${(app.status === 'pending' || app.status === 'confirmed') ? `
                    <button class="cancel-appointment" data-id="${app.id}">
                        Cancel
                    </button>
                ` : ''}
            </div>
            `;
        });

        list.html(html);

        $('.cancel-appointment').click(function () {
            cancelAppointment($(this).data('id'));
        });
    }

    // ===============================
    // Helpers
    // ===============================
    function formatTime(time) {
        const [h, m] = time.split(':');
        const hour = parseInt(h);
        return `${hour % 12 || 12}:${m} ${hour >= 12 ? 'PM' : 'AM'}`;
    }

    // ✅✅ التعديل هون فقط
    function cancelAppointment(id) {
        if (!confirm('Cancel this appointment?')) return;

        $.ajax({
            url: '{{ route("appointments.cancel", "__id__") }}'.replace('__id__', id),
            type: 'POST',
            success: function (response) {
                if (response.success) {
                    const app = allAppointments.find(a => a.id === id);
                    if (app) app.status = 'cancelled';

                    updateStats();
                    filterAppointments(currentFilter);
                    alert('Appointment cancelled successfully');
                }
            },
            error: function () {
                alert('Failed to cancel appointment');
            }
        });
    }

});
</script>


</body>
</html>