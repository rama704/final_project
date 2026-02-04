@extends('admin.layouts.admin')

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Edit Patient</h1>
        <p class="page-subtitle">Update patient information for {{ $patient->full_name }}</p>
    </div>

    <!-- Form Card -->
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

        <form action="{{ route('admin.patients.update', $patient) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="form-section">
                <h3>Basic Information</h3>
                <p>Personal details of the patient</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                    <input class="input" type="text" name="full_name"
                           value="{{ old('full_name', $patient->full_name) }}"
                           placeholder="Full Name *" required>

                    <select class="input" name="gender">
                        <option value="">Gender</option>
                        <option value="male" {{ $patient->gender=='male'?'selected':'' }}>Male</option>
                        <option value="female" {{ $patient->gender=='female'?'selected':'' }}>Female</option>
                    </select>

                    <input class="input" type="date" name="date_of_birth"
                           value="{{ old('date_of_birth', $patient->date_of_birth) }}">

                    <input class="input" type="tel" name="phone"
                           value="{{ old('phone', $patient->phone) }}"
                           placeholder="Phone Number">
                </div>
            </div>

            <!-- Contact & Medical Info -->
            <div class="form-section">
                <h3>Contact & Medical Info</h3>
                <p>Contact details and health notes</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                    <input class="input" type="email" name="email"
                           value="{{ old('email', $patient->email) }}"
                           placeholder="Email Address *" required>

                    <input class="input" type="text" name="address"
                           value="{{ old('address', $patient->address) }}"
                           placeholder="Address">

                    <textarea class="input h-24" name="allergies"
                              placeholder="Known Allergies">{{ old('allergies', $patient->allergies) }}</textarea>

                    <textarea class="input h-24" name="chronic_conditions"
                              placeholder="Chronic Conditions">{{ old('chronic_conditions', $patient->chronic_conditions) }}</textarea>
                </div>
            </div>

            <!-- Medical History -->
            <div class="form-section">
                <h3>Medical & Dental History</h3>
                <p>Previous and current dental information</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">
                    <textarea class="input h-28" name="current_medications"
                              placeholder="Current Medications">{{ old('current_medications', $patient->current_medications) }}</textarea>

                    <textarea class="input h-28" name="previous_dental_history"
                              placeholder="Previous Dental History">{{ old('previous_dental_history', $patient->previous_dental_history) }}</textarea>

                    <input class="input" type="date" name="last_dental_visit"
                           value="{{ old('last_dental_visit', $patient->last_dental_visit) }}">

                    <textarea class="input h-28" name="current_oral_problems"
                              placeholder="Current Oral Problems">{{ old('current_oral_problems', $patient->current_oral_problems) }}</textarea>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-4 border-t pt-6">
                <a href="{{ route('admin.patients.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Update Patient
                </button>
            </div>

        </form>
    </div>

@endsection
