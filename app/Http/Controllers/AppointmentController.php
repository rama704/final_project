<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /* =========================================================
     |  عرض صفحة مواعيد المستخدم – تحتوي Livewire component
     ========================================================= */
    public function index()
    {
        // فقط عرض الـ Blade الذي يحتوي Livewire component
        return view('appointments.view');
    }

    /* =========================================================
     |  صفحة إنشاء موعد
     ========================================================= */
    public function create(Request $request)
    {
        $doctor = $request->doctor_id
            ? Doctor::findOrFail($request->doctor_id)
            : null;

        $doctors = Doctor::all();

        return view('appointments.create', compact('doctor', 'doctors'));
    }

    /* =========================================================
     |  تخزين الموعد
     ========================================================= */
    public function store(Request $request)
    {
        $messages = [
            'terms.required' => 'You must agree to the terms and conditions.',
            'terms.accepted' => 'You must agree to the terms and conditions.',
            'appointment_date.after_or_equal' => 'Appointment date must be today or in the future.',
        ];

        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'service_type' => 'required|in:teeth_cleaning,filling,extraction,braces,root_canal,whitening,checkup,emergency,other',
            'patient_name' => 'required|string|max:255',
            'patient_email' => 'required|email|max:255',
            'patient_phone' => 'required|string|max:20',
            'patient_age' => 'nullable|integer|min:0|max:120',
            'notes' => 'nullable|string|max:1000',
            'terms' => 'required|accepted',
        ], $messages);

        $exists = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($exists) {
            return back()
                ->with('error', 'This slot is already pending or confirmed. Please choose another time.')
                ->withInput(request()->all());
        }

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => Auth::id(),
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'service_type' => $request->service_type,
            'patient_name' => $request->patient_name,
            'patient_email' => $request->patient_email,
            'patient_phone' => $request->patient_phone,
            'patient_age' => $request->patient_age,
            'notes' => $request->notes,
            'status' => 'pending',
            'payment_method' => $request->payment_method ?? null,
            'confirmed_at' => null,
            'completed_at' => null,
            'cancelled_at' => null,
            'cancellation_reason' => null,
        ]);

        return redirect()->route('appointments.view')
            ->with('success', 'Appointment pending successfully! We will confirm it soon.');
    }
}
