<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->latest('appointment_date')
            ->paginate(10);
        
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('admin.appointments.create', compact('doctors', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date_format:Y-m-d H:i',
            'status' => 'nullable|in:booked,completed,canceled',
            'notes' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'status' => $request->status ?? 'booked',
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'تم إضافة الموعد بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment = Appointment::with(['doctor', 'patient'])->findOrFail($id);
        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::all();
        $patients = Patient::all();
        
        return view('admin.appointments.edit', compact('appointment', 'doctors', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date_format:Y-m-d H:i',
            'status' => 'nullable|in:booked,completed,canceled',
            'notes' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'status' => $request->status ?? 'booked',
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'تم تحديث الموعد بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'تم حذف الموعد بنجاح!');
    }
}