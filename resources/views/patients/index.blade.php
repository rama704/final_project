<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients - ARMODENT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .bg-primary {
            background-color: #A8C5C5;
        }
        .bg-primary-dark {
            background-color: #7AA8A8;
        }
        .bg-light {
            background-color: #F8FAFB;
        }
        .text-primary {
            color: #7AA8A8;
        }
        .btn-primary {
            background: linear-gradient(135deg, #7AA8A8 0%, #A8C5C5 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #6A9898 0%, #98B5B5 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(122, 168, 168, 0.3);
        }
        .patient-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .patient-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #7AA8A8 0%, #A8C5C5 100%);
        }
        .patient-card:hover {
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            transform: translateY(-4px);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #A8C5C5 0%, #7AA8A8 100%);
        }
        .avatar-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #7AA8A8 0%, #A8C5C5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(122, 168, 168, 0.3);
        }
        .stats-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        .search-box {
            position: relative;
        }
        .search-box input {
            padding-left: 48px;
        }
        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #7AA8A8;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-male {
            background-color: #DBEAFE;
            color: #1E40AF;
        }
        .badge-female {
            background-color: #FCE7F3;
            color: #9F1239;
        }
        .section-header {
            position: relative;
            padding-bottom: 16px;
            margin-bottom: 32px;
        }
        .section-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #7AA8A8 0%, #A8C5C5 100%);
            border-radius: 2px;
        }
        .filter-btn {
            padding: 10px 20px;
            border-radius: 10px;
            border: 2px solid #E5E7EB;
            background: white;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        .filter-btn:hover, .filter-btn.active {
            border-color: #7AA8A8;
            background: #F0F9F9;
            color: #7AA8A8;
        }
    </style>
</head>
<body class="bg-light min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
                        <i class="fas fa-tooth text-white text-xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">ARMODENT</h1>
                </div>
                <nav class="hidden md:flex space-x-8 text-gray-600 font-medium">
                    <a href="{{ route('doctors.index') }}" class="hover:text-primary transition">Home</a>
                    <a href="/about" class="hover:text-primary transition">About</a>
                    <a href="{{ route('doctors.index') }}" class="hover:text-primary transition">Doctors</a>
                    <a href="{{ route('appointments.index') }}" class="hover:text-primary transition">Appointments</a>
                    <a href="{{ route('patients.index') }}" class="text-primary font-bold transition">Patients</a>
                </nav>
                <button onclick="openAddPatientModal()" class="btn-primary text-white px-6 py-2.5 rounded-full font-semibold">
                    <i class="fas fa-user-plus mr-2"></i>Add Patient
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="hero-gradient text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 right-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Patient Management</h1>
            <p class="text-xl opacity-95 max-w-2xl">
                Comprehensive patient records and health information at your fingertips
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-16">

        @if(session('success'))
        <div class="mb-8 p-5 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-lg flex items-center gap-3">
            <i class="fas fa-check-circle text-2xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="stats-card">
                <div class="flex items-center gap-4">
                    <div class="stats-icon bg-gradient-to-br from-blue-500 to-blue-600">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Patients</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $patients->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center gap-4">
                    <div class="stats-icon bg-gradient-to-br from-green-500 to-green-600">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Active Today</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $patients->where('created_at', '>=', now()->startOfDay())->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center gap-4">
                    <div class="stats-icon bg-gradient-to-br from-purple-500 to-purple-600">
                        <i class="fas fa-mars"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Male</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $patients->where('gender', 'male')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center gap-4">
                    <div class="stats-icon bg-gradient-to-br from-pink-500 to-pink-600">
                        <i class="fas fa-venus"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Female</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $patients->where('gender', 'female')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-8">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="search-box flex-1 w-full md:max-w-md">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" 
                           placeholder="Search patients by name, email, or phone..." 
                           class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition">
                </div>

                <div class="flex gap-3 flex-wrap">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-list mr-2"></i>All
                    </button>
                    <button class="filter-btn" data-filter="male">
                        <i class="fas fa-mars mr-2"></i>Male
                    </button>
                    <button class="filter-btn" data-filter="female">
                        <i class="fas fa-venus mr-2"></i>Female
                    </button>
                </div>
            </div>
        </div>

        <!-- Patients Grid -->
        <div>
            <div class="section-header">
                <h2 class="text-4xl font-bold text-gray-800">All Patients</h2>
            </div>

            @if($patients->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="patientsGrid">
                @foreach($patients as $patient)
                <div class="patient-card p-6 patient-item" data-gender="{{ $patient->gender }}" 
                     data-search="{{ strtolower($patient->full_name . ' ' . $patient->email . ' ' . $patient->phone) }}">
                    
                    <div class="flex items-start gap-4 mb-4">
                        <div class="avatar-circle">
                            {{ strtoupper(substr($patient->full_name, 0, 2)) }}
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $patient->full_name }}</h3>
                            <span class="badge badge-{{ $patient->gender }}">
                                <i class="fas fa-{{ $patient->gender == 'male' ? 'mars' : 'venus' }}"></i>
                                {{ ucfirst($patient->gender) }}
                            </span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-5">
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="fas fa-envelope w-5 text-primary"></i>
                            <span class="text-sm">{{ $patient->email }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="fas fa-phone w-5 text-primary"></i>
                            <span class="text-sm">{{ $patient->phone ?? 'Not provided' }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="fas fa-birthday-cake w-5 text-primary"></i>
                            <span class="text-sm">{{ $patient->date_of_birth ? date('M d, Y', strtotime($patient->date_of_birth)) : 'Not provided' }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="fas fa-map-marker-alt w-5 text-primary"></i>
                            <span class="text-sm">{{ Str::limit($patient->address ?? 'Not provided', 30) }}</span>
                        </div>
                    </div>

                    @if($patient->chronic_conditions || $patient->allergies)
                    <div class="bg-red-50 border-l-4 border-red-400 p-3 rounded-lg mb-4">
                        <p class="text-xs font-semibold text-red-800 mb-1">
                            <i class="fas fa-exclamation-triangle mr-1"></i>Medical Alert
                        </p>
                        @if($patient->allergies)
                        <p class="text-xs text-red-700">Allergies: {{ Str::limit($patient->allergies, 40) }}</p>
                        @endif
                        @if($patient->chronic_conditions)
                        <p class="text-xs text-red-700">Conditions: {{ Str::limit($patient->chronic_conditions, 40) }}</p>
                        @endif
                    </div>
                    @endif

                    <div class="flex gap-2 pt-4 border-t border-gray-100">
                        <a href="{{ route('patients.show', $patient->id) }}" 
                           class="flex-1 bg-gradient-to-r from-primary-dark to-primary text-white px-4 py-2.5 rounded-xl font-semibold text-center hover:shadow-lg transition flex items-center justify-center gap-2">
                            <i class="fas fa-eye"></i>
                            View Profile
                        </a>
                        <a href="{{ route('patients.appointments', $patient->id) }}" 
                           class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2.5 rounded-xl font-semibold text-center transition flex items-center justify-center gap-2">
                            <i class="far fa-calendar"></i>
                            Appointments
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="noResults" class="hidden text-center py-20">
                <div class="w-32 h-32 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-search text-gray-400 text-5xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">No Patients Found</h3>
                <p class="text-gray-600">Try adjusting your search or filter criteria</p>
            </div>
            @else
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm">
                <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-primary to-primary-dark rounded-full flex items-center justify-center">
                    <i class="fas fa-user-slash text-white text-5xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-3">No Patients Yet</h3>
                <p class="text-gray-600 mb-8 text-lg">Start by adding your first patient to the system</p>
                <button onclick="openAddPatientModal()" 
                        class="btn-primary text-white px-10 py-4 rounded-full font-bold inline-flex items-center gap-3">
                    <i class="fas fa-user-plus"></i>
                    Add First Patient
                </button>
            </div>
            @endif
        </div>

    </div>

    <!-- Add Patient Modal -->
    <div id="addPatientModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 p-4" style="backdrop-filter: blur(4px);">
        <div class="bg-white rounded-3xl p-8 max-w-2xl w-full shadow-2xl max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-3xl font-bold text-gray-800">Add New Patient</h3>
                <button onclick="closeAddPatientModal()" 
                        class="text-gray-400 hover:text-gray-600 transition w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <form action="{{ route('patients.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-user mr-2 text-primary"></i>Full Name
                        </label>
                        <input type="text" name="full_name" required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-envelope mr-2 text-primary"></i>Email
                        </label>
                        <input type="email" name="email" required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-phone mr-2 text-primary"></i>Phone
                        </label>
                        <input type="text" name="phone"
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-venus-mars mr-2 text-primary"></i>Gender
                        </label>
                        <select name="gender" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition">
                            <option value="">Select gender...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-birthday-cake mr-2 text-primary"></i>Date of Birth
                        </label>
                        <input type="date" name="date_of_birth"
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>Address
                        </label>
                        <input type="text" name="address"
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition">
                    </div>
                </div>

                <button type="submit" class="btn-primary text-white px-8 py-4 rounded-xl w-full font-bold text-lg flex items-center justify-center gap-3">
                    <i class="fas fa-check-circle"></i>
                    Add Patient
                </button>
            </form>
        </div>
    </div>

    <script>
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const patientsGrid = document.getElementById('patientsGrid');
        const noResults = document.getElementById('noResults');
        const patientItems = document.querySelectorAll('.patient-item');

        searchInput?.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            let visibleCount = 0;

            patientItems.forEach(item => {
                const searchData = item.getAttribute('data-search');
                const currentFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
                const itemGender = item.getAttribute('data-gender');

                const matchesSearch = searchData.includes(searchTerm);
                const matchesFilter = currentFilter === 'all' || itemGender === currentFilter;

                if (matchesSearch && matchesFilter) {
                    item.classList.remove('hidden');
                    visibleCount++;
                } else {
                    item.classList.add('hidden');
                }
            });

            if (patientsGrid) {
                patientsGrid.classList.toggle('hidden', visibleCount === 0);
            }
            if (noResults) {
                noResults.classList.toggle('hidden', visibleCount > 0);
            }
        });

        // Filter functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                const searchTerm = searchInput?.value.toLowerCase() || '';
                let visibleCount = 0;

                patientItems.forEach(item => {
                    const itemGender = item.getAttribute('data-gender');
                    const searchData = item.getAttribute('data-search');

                    const matchesFilter = filter === 'all' || itemGender === filter;
                    const matchesSearch = searchData.includes(searchTerm);

                    if (matchesFilter && matchesSearch) {
                        item.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        item.classList.add('hidden');
                    }
                });

                if (patientsGrid) {
                    patientsGrid.classList.toggle('hidden', visibleCount === 0);
                }
                if (noResults) {
                    noResults.classList.toggle('hidden', visibleCount > 0);
                }
            });
        });

        // Modal functions
        function openAddPatientModal() {
            document.getElementById('addPatientModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeAddPatientModal() {
            document.getElementById('addPatientModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal on outside click
        document.getElementById('addPatientModal')?.addEventListener('click', function(e) {
            if (e.target === this) closeAddPatientModal();
        });

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeAddPatientModal();
        });
    </script>

</body>
</html>