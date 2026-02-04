@extends('admin.layouts.admin')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title">
                <i class="fas fa-calendar-plus mr-3"></i>
                Create New Appointment
            </h1>
            <p class="page-subtitle">Schedule a new appointment for a patient</p>
        </div>
        <a href="{{ route('admin.appointments.index') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Appointments
        </a>
    </div>
</div>

<!-- Appointment Form -->
<div class="form-card">
    
    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="error-box">
            <div class="flex items-center mb-2">
                <i class="fas fa-exclamation-triangle mr-2 text-red-600"></i>
                <strong class="text-red-800">Please fix the following errors:</strong>
            </div>
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-green-800">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    
    <form action="{{ route('admin.appointments.store') }}" method="POST">
        @csrf
        
        <!-- Appointment Details -->
        <div class="form-section">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-calendar-alt text-blue-600"></i>
                </div>
                <div>
                    <h3>Appointment Details</h3>
                    <p>Select doctor, patient and schedule time</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                <!-- Doctor -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user-md mr-2 text-gray-500"></i>
                        Doctor *
                    </label>
                    <select class="input" name="doctor_id" required>
                        <option value="">Select Doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                Dr. {{ $doctor->full_name }} 
                                @if($doctor->specialization)
                                    - {{ $doctor->specialization }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Patient -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user-injured mr-2 text-gray-500"></i>
                        Patient *
                    </label>
                    <select class="input" name="patient_id" required>
                        <option value="">Select Patient</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                {{ $patient->full_name }} 
                                @if($patient->phone)
                                    - {{ $patient->phone }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Date & Time -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="far fa-clock mr-2 text-gray-500"></i>
                        Appointment Date & Time *
                    </label>
                    <input class="input" type="datetime-local" name="appointment_date" 
                           value="{{ old('appointment_date') }}" required>
                </div>
                
                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-tag mr-2 text-gray-500"></i>
                        Appointment Status
                    </label>
                    <select class="input" name="status">
                        <option value="">Select Status</option>
                        <option value="booked" {{ old('status') == 'booked' ? 'selected' : '' }}>Booked</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Notes -->
        <div class="form-section">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-sticky-note text-purple-600"></i>
                </div>
                <div>
                    <h3>Notes & Additional Information</h3>
                    <p>Add any relevant notes for this appointment</p>
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-edit mr-2 text-gray-500"></i>
                    Appointment Notes
                </label>
                <textarea class="input h-32" name="notes" 
                          placeholder="Appointment notes, symptoms, or special requirements..."
                          maxlength="500">{{ old('notes') }}</textarea>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="flex flex-col md:flex-row justify-end gap-4 border-t pt-6">
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary order-2 md:order-1">
                <i class="fas fa-times mr-2"></i>
                Cancel
            </a>
            
            <button type="submit" class="btn btn-primary order-1 md:order-2">
                <i class="fas fa-calendar-check mr-2"></i>
                Schedule Appointment
            </button>
        </div>
        
    </form>
</div>

@endsection