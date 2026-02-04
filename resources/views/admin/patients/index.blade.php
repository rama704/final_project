@extends('admin.layouts.admin')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Patients Management</h1>
    <p class="page-subtitle">View and manage all registered patients in your clinic</p>
</div>

<!-- Actions -->
<div class="form-card form-section">
    <h3>Patient Actions</h3>
    <p>Quick actions related to patients</p>

    <div style="display:flex; gap:15px; margin-top:20px; flex-wrap:wrap;">
        <a href="{{ route('admin.patients.create') }}" class="btn btn-primary">+ Add Patient</a>
        <button class="btn btn-secondary">Import Patients</button>
        <button class="btn btn-secondary">Generate Report</button>
        <button class="btn btn-secondary">Search</button>
    </div>
</div>

<!-- Patients Table -->
<div class="form-card">
    <h3 style="margin-bottom:20px;">All Patients</h3>

    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f1f5f9; text-align:left;">
                    <th class="table-th">Name</th>
                    <th class="table-th">Contact</th>
                    <th class="table-th">Medical Info</th>
                    <th class="table-th">Last Visit</th>
                    <th class="table-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr class="table-row">
                    <td class="table-td">
                        <strong>{{ $patient->full_name }}</strong>
                    </td>

                    <td class="table-td">
                        <div>{{ $patient->email }}</div>
                        <small style="color:#6b7280">{{ $patient->phone }}</small>
                    </td>

                    <td class="table-td">
                        @if($patient->chronic_conditions)
                            <span class="badge badge-danger">Chronic</span>
                        @endif
                        @if($patient->allergies)
                            <span class="badge badge-warning">Allergy</span>
                        @endif
                    </td>

                    <td class="table-td">
                        {{ $patient->last_dental_visit ?? 'Never' }}
                    </td>

                    <td class="table-td">
                        <a href="{{ route('admin.patients.edit', $patient) }}" class="action-link edit">Edit</a>

                        <form action="{{ route('admin.patients.destroy', $patient) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="action-link delete"
                                onclick="return confirm('Are you sure you want to delete this patient?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div style="margin-top:25px;">
        {{ $patients->links() }}
    </div>
</div>

@endsection
