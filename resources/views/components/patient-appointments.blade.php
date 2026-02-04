<div>
    <!-- Filter Tabs -->
    <div class="filter-tabs">
        @foreach(['all'=>'All Appointments','upcoming'=>'Upcoming','pending'=>'Pending','confirmed'=>'Confirmed','completed'=>'Completed','cancelled'=>'Cancelled'] as $key => $label)
            <div class="filter-tab {{ $filter == $key ? 'active' : '' }}" wire:click="filterAppointments('{{ $key }}')">
                {{ $label }}
            </div>
        @endforeach
    </div>

    <!-- Stats -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-number">{{ count($appointments) }}</div>
            <div class="stat-label">Total Appointments</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">
                {{ count(array_filter($appointments, fn($a) => in_array($a['status'], ['pending','confirmed']) && $a['appointment_date'] >= now()->format('Y-m-d'))) }}
            </div>
            <div class="stat-label">Upcoming</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ count(array_filter($appointments, fn($a) => $a['status']=='pending')) }}</div>
            <div class="stat-label">Pending</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ count(array_filter($appointments, fn($a) => $a['status']=='completed')) }}</div>
            <div class="stat-label">Completed</div>
        </div>
    </div>

    <!-- Appointments List -->
    <div class="appointments-list">
        @forelse($appointments as $app)
            <div class="appointment-item">
                <div class="appointment-header">
                    <h3>{{ str_replace('_',' ',$app['service_type']) }}</h3>
                    <span class="status-badge status-{{ $app['status'] }}">{{ ucfirst($app['status']) }}</span>
                </div>

                <p>
                    <strong>{{ \Carbon\Carbon::parse($app['appointment_date'])->format('l, F j, Y') }}</strong>
                     – {{ \Carbon\Carbon::parse($app['appointment_time'])->format('g:i A') }}
                </p>
                <p>Doctor: {{ $app['doctor_name'] }}</p>

                <button class="btn btn-info" wire:click="openModal({{ $app['id'] }})">View Details</button>

                @if(in_array($app['status'], ['pending','confirmed']))
                    <button class="btn btn-danger" wire:click="cancelAppointment({{ $app['id'] }})">Cancel</button>
                @endif
            </div>
        @empty
            <p>No appointments found.</p>
        @endforelse
    </div>

    <!-- Appointment Modal -->
    @if($selectedAppointment)
        <div class="modal-overlay active">
            <div class="modal">
                <div class="modal-header">
                    <h3>Appointment Details</h3>
                    <button class="modal-close" wire:click="closeModal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="modal-section">
                        <h4>Service</h4>
                        <p>{{ $selectedAppointment->service_type }}</p>
                    </div>
                    <div class="modal-section">
                        <h4>Date & Time</h4>
                        <p>{{ $selectedAppointment->appointment_date }} – {{ $selectedAppointment->appointment_time }}</p>
                    </div>
                    <div class="modal-section">
                        <h4>Status</h4>
                        <p>{{ ucfirst($selectedAppointment->status) }}</p>
                    </div>
                    <div class="modal-section">
                        <h4>Doctor</h4>
                        <p>{{ $selectedAppointment->doctor->name ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session()->has('message'))
        <script>alert('{{ session('message') }}');</script>
    @endif
</div>
