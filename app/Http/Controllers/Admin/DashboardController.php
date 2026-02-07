<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // إحصائيات عامة للـ Admin
            $stats = [
                'patients' => Patient::count(),
                'doctors' => Doctor::count(),
                'appointments' => Appointment::count(),
                'users' => User::count(),
            ];

            // آخر 3 مواعيد
            $appointments = Appointment::with(['patient', 'doctor'])
                ->latest()
                ->limit(3)
                ->get();

            // آخر 3 مرضى
            $recentPatients = Patient::latest()
                ->limit(3)
                ->get();

        }  elseif ($user->role === 'doctor') {
    $doctor = $user->doctor; // جلب العلاقة مرة وحدة

    $stats = [
        'patients' => $doctor ? $doctor->patients()->count() : 0,
        'appointments' => $doctor ? $doctor->appointments()->count() : 0,
    ];

    $appointments = $doctor
        ? $doctor->appointments()->with('patient')->latest()->limit(3)->get()
        : collect();

    $recentPatients = $doctor
        ? $doctor->patients()->latest()->limit(3)->get()
        : collect();
}


        return view('admin.dashboard', compact('stats', 'appointments', 'recentPatients', 'user'));
    }
}