<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class PatientAppointments extends Component
{
    public $appointments = [];
    public $filter = 'all'; // لتحديد الفلتر الحالي
    public $selectedAppointment = null; // لتفاصيل الموعد في المودال

    public function mount()
    {
        $this->loadAppointments();
    }

    public function loadAppointments()
    {
        $query = Appointment::where('patient_id', Auth::id());

        // تطبيق الفلتر إذا لم يكن 'all'
        if ($this->filter !== 'all') {
            $query->where('status', $this->filter);
        }

        $this->appointments = $query->get()->map(function ($app) {
            return [
                'id' => $app->id,
                'service_type' => $app->service_type,
                'status' => $app->status,
                'appointment_date' => $app->appointment_date->format('Y-m-d'),
                'appointment_time' => $app->appointment_time,
                'doctor_name' => $app->doctor->name ?? 'N/A',
            ];
        })->toArray();
    }

    // لتغيير الفلتر عند الضغط على tab
    public function filterAppointments($filter)
    {
        $this->filter = $filter;
        $this->loadAppointments();
    }

    // لإلغاء الموعد
    public function cancelAppointment($id)
    {
        $appointment = Appointment::where('patient_id', Auth::id())
                                  ->where('id', $id)
                                  ->first();

        if (!$appointment) {
            session()->flash('message', 'Appointment not found.');
            return;
        }

        $appointment->status = 'cancelled';
        $appointment->save();

        $this->loadAppointments();
        session()->flash('message', 'Appointment cancelled successfully.');
    }

    // لفتح المودال
    public function openModal($id)
    {
        $this->selectedAppointment = Appointment::where('patient_id', Auth::id())
                                                ->where('id', $id)
                                                ->first();
    }

    // لغلق المودال
    public function closeModal()
    {
        $this->selectedAppointment = null;
    }

    public function render()
    {
        return view('components.patient-appointments', [
            'appointments' => $this->appointments,
            'filter' => $this->filter,
            'selectedAppointment' => $this->selectedAppointment,
        ]);
    }
}
