<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile - {{ $patient->full_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .bg-primary {
            background-color: #A8C5C5;
        }
        .bg-light {
            background-color: #E8F0F0;
        }
        .text-primary {
            color: #7AA8A8;
        }
        .btn-primary {
            background-color: #7AA8A8;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #6A9898;
            transform: translateY(-2px);
        }
        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
    </style>
</head>
<body class="bg-light min-h-screen">
    
    <!-- Header -->
    <header class="bg-primary shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-bold text-white">🦷 ARMODENT</h1>
                </div>
                <nav class="hidden md:flex space-x-8 text-white">
                    <a href="{{ route('doctors.index') }}" class="hover:text-gray-200 transition">HOME</a>
                    <a href="/about" class="hover:text-gray-200 transition">ABOUT</a>
                    <a href="{{ route('doctors.index') }}" class="hover:text-gray-200 transition">DOCTORS</a>
                    <a href="/contact" class="hover:text-gray-200 transition">CONTACT US</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12">
        
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        <!-- Patient Profile Card -->
        <div class="card p-8 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Patient Profile</h2>
                <button onclick="document.getElementById('editModal').classList.remove('hidden')" 
                        class="btn-primary text-white px-6 py-2 rounded-full">
                    Edit Information
                </button>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Basic Info -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-primary mb-4">Basic Information</h3>
                    
                    <div class="flex items-center p-3 bg-light rounded-lg">
                        <span class="text-gray-600 w-32">Full Name:</span>
                        <span class="font-semibold text-gray-800">{{ $patient->full_name }}</span>
                    </div>

                    <div class="flex items-center p-3 bg-light rounded-lg">
                        <span class="text-gray-600 w-32">Gender:</span>
                        <span class="font-semibold text-gray-800">
                            {{ $patient->gender == 'male' ? 'Male' : 'Female' }}
                        </span>
                    </div>

                    <div class="flex items-center p-3 bg-light rounded-lg">
                        <span class="text-gray-600 w-32">Date of Birth:</span>
                        <span class="font-semibold text-gray-800">{{ $patient->date_of_birth }}</span>
                    </div>

                    <div class="flex items-center p-3 bg-light rounded-lg">
                        <span class="text-gray-600 w-32">Phone:</span>
                        <span class="font-semibold text-gray-800">{{ $patient->phone }}</span>
                    </div>

                    <div class="flex items-center p-3 bg-light rounded-lg">
                        <span class="text-gray-600 w-32">Email:</span>
                        <span class="font-semibold text-gray-800">{{ $patient->email }}</span>
                    </div>

                    <div class="flex items-center p-3 bg-light rounded-lg">
                        <span class="text-gray-600 w-32">Address:</span>
                        <span class="font-semibold text-gray-800">{{ $patient->address }}</span>
                    </div>
                </div>

                <!-- Medical Info -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-primary mb-4">Medical Information</h3>
                    
                    <div class="p-4 bg-light rounded-lg">
                        <p class="text-gray-600 mb-2 font-semibold">Allergies:</p>
                        <p class="text-gray-800">{{ $patient->allergies ?? 'None' }}</p>
                    </div>

                    <div class="p-4 bg-light rounded-lg">
                        <p class="text-gray-600 mb-2 font-semibold">Chronic Conditions:</p>
                        <p class="text-gray-800">{{ $patient->chronic_conditions ?? 'None' }}</p>
                    </div>

                    <div class="p-4 bg-light rounded-lg">
                        <p class="text-gray-600 mb-2 font-semibold">Current Medications:</p>
                        <p class="text-gray-800">{{ $patient->current_medications ?? 'None' }}</p>
                    </div>

                    <div class="p-4 bg-light rounded-lg">
                        <p class="text-gray-600 mb-2 font-semibold">Last Dental Visit:</p>
                        <p class="text-gray-800">{{ $patient->last_dental_visit ?? 'Not specified' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments Section -->
        <div class="card p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Appointments</h2>
                <a href="{{ route('appointments.store') }}?patient_id={{ $patient->id }}" 
                   class="btn-primary text-white px-6 py-2 rounded-full">
                    Book New Appointment
                </a>
            </div>

            <a href="{{ route('patients.appointments', $patient->id) }}" 
               class="inline-block text-primary hover:underline font-semibold">
                View All Appointments →
            </a>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-8 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Edit Patient Information</h3>
                <button onclick="document.getElementById('editModal').classList.add('hidden')" 
                        class="text-gray-500 hover:text-gray-700 text-2xl">×</button>
            </div>

            <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="full_name" value="{{ $patient->full_name }}" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ $patient->email }}" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Phone</label>
                    <input type="text" name="phone" value="{{ $patient->phone }}" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Address</label>
                    <input type="text" name="address" value="{{ $patient->address }}" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:outline-none">
                </div>

                <button type="submit" class="btn-primary text-white px-8 py-3 rounded-full w-full">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

</body>
</html>