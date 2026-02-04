@extends('admin.layouts.admin')

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Create New Patient</h1>
        <p class="page-subtitle">Add a new patient to your clinic database</p>
    </div>

    <!-- Patient Form -->
    <div class="form-card">

        {{-- Errors --}}
        @if ($errors->any())
            <div style="margin-bottom:20px; padding:15px; background:#fee2e2; border-radius:12px;">
                <ul style="color:#b91c1c; font-size:13px;">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.patients.store') }}" method="POST">
            @csrf

            <!-- Basic Information -->
            <div class="form-section">
                <h3>Basic Information</h3>
                <p>Personal details of the patient</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                    <input class="input" type="text" name="full_name"
                           placeholder="Full Name *" value="{{ old('full_name') }}" required>

                    <select class="input" name="gender" required>
                        <option value="">Gender *</option>
                        <option value="male" {{ old('gender')=='male'?'selected':'' }}>Male</option>
                        <option value="female" {{ old('gender')=='female'?'selected':'' }}>Female</option>
                    </select>

                    <input class="input" type="date" name="date_of_birth"
                           value="{{ old('date_of_birth') }}">

                    <input class="input" type="tel" name="phone"
                           placeholder="Phone Number" value="{{ old('phone') }}">
                </div>
            </div>

            <!-- Contact & Medical -->
            <div class="form-section">
                <h3>Contact & Medical Info</h3>
                <p>Contact details and medical notes</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                    <input class="input" type="email" name="email"
                           placeholder="Email Address *" value="{{ old('email') }}" required>

                    <input class="input" type="text" name="address"
                           placeholder="Address" value="{{ old('address') }}">

                    <textarea class="input h-24" name="allergies"
                              placeholder="Known Allergies">{{ old('allergies') }}</textarea>

                    <textarea class="input h-24" name="chronic_conditions"
                              placeholder="Chronic Conditions">{{ old('chronic_conditions') }}</textarea>
                </div>
            </div>

            <!-- Medical History -->
            <div class="form-section">
                <h3>Medical & Dental History</h3>
                <p>Previous and current dental information</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                    <textarea class="input h-28" name="current_medications"
                              placeholder="Current Medications">{{ old('current_medications') }}</textarea>

                    <textarea class="input h-28" name="previous_dental_history"
                              placeholder="Previous Dental History">{{ old('previous_dental_history') }}</textarea>

                    <input class="input" type="date" name="last_dental_visit"
                           value="{{ old('last_dental_visit') }}">

                    <textarea class="input h-28" name="current_oral_problems"
                              placeholder="Current Oral Problems">{{ old('current_oral_problems') }}</textarea>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-4 border-t pt-6">
                <a href="{{ route('admin.patients.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Save Patient
                </button>
            </div>

        </form>
    </div>

@endsection
