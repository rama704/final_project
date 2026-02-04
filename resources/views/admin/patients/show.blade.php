@extends('layouts.admin')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Patient Details</h1>
    <p class="page-subtitle">View detailed information for {{ $patient->full_name }}</p>
</div>

<!-- Patient Card -->
<div class="form-card">

    <!-- Header Actions -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px;">
        <h3>Patient Information</h3>

        <div>
            <a href="{{ route('admin.patients.edit', $patient) }}" class="btn btn-primary" style="margin-right:10px;">
                Edit
            </a>

            <form action="{{ route('admin.patients.destroy', $patient) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-secondary"
                    onclick="return confirm('Are you sure you want to delete this patient?')">
                    Delete
                </button>
            </form>
        </div>
    </div>

    <!-- Info Grid -->
    <div class="details-grid">

        <div class="details-box">
            <span>Full Name</span>
            <strong>{{ $patient->full_name }}</strong>
        </div>

        <div class="details-box">
            <span>Gender</span>
            <strong>{{ ucfirst($patient->gender) }}</strong>
        </div>

        <div class="details-box">
            <span>Date of Birth</span>
            <strong>{{ $patient->date_of_birth ?? 'Not provided' }}</strong>
        </div>

        <div class="details-box">
            <span>Phone</span>
            <strong>{{ $patient->phone ?? 'Not provided' }}</strong>
        </div>

        <div class="details-box">
            <span>Email</span>
            <strong>{{ $patient->email }}</strong>
        </div>

        <div class="details-box">
            <span>Address</span>
            <strong>{{ $patient->address ?? 'Not provided' }}</strong>
        </div>

        <div class="details-box">
            <span>Allergies</span>
            <strong>{{ $patient->allergies ?? 'None reported' }}</strong>
        </div>

        <div class="details-box">
            <span>Chronic Conditions</span>
            <strong>{{ $patient->chronic_conditions ?? 'None reported' }}</strong>
        </div>

    </div>

    <!-- Medical Section -->
    <div class="details-section">
        <h4>Medical Information</h4>

        <p><strong>Current Medications:</strong> {{ $patient->current_medications ?? 'None reported' }}</p>
        <p><strong>Previous Dental History:</strong> {{ $patient->previous_dental_history ?? 'Not provided' }}</p>
        <p><strong>Last Dental Visit:</strong> {{ $patient->last_dental_visit ?? 'Never' }}</p>
        <p><strong>Current Oral Problems:</strong> {{ $patient->current_oral_problems ?? 'None reported' }}</p>
    </div>

    <!-- Appointments -->
    <div class="details-section">
        <h4>Recent Appointments</h4>

        @if($patient->appointments->isEmpty())
            <p style="color:#6b7280;">No appointments yet.</p>
        @else
            <ul class="appointments-list">
                @foreach($patient->appointments->take(5) as $appointment)
                    <li>
                        <strong>{{ $appointment->doctor->name ?? 'Unknown Doctor' }}</strong><br>
                        <small>
                            {{ $appointment->appointment_date->format('M d, Y') }}
                            – {{ $appointment->appointment_time }}
                        </small>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('admin.appointments.index', ['patient' => $patient->id]) }}"
               class="view-all-btn">
                View All Appointments →
            </a>
        @endif
    </div>

</div>

@endsection
