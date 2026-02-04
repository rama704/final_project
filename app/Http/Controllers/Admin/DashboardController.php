<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // إحصائيات عامة
        $stats = [
            'patients' => Patient::count(),
            'doctors' => Doctor::count(),
            'appointments' => Appointment::count(),
            'users' => User::count(),
        ];

        // المواعيد الحديثة
        $appointments = Appointment::with(['patient', 'doctor'])
            ->latest()
            ->limit(3)
            ->get();

        // المرضى الجدد
        $recentPatients = Patient::latest()
            ->limit(3)
            ->get();

        return view('admin.dashboard', compact('stats', 'appointments', 'recentPatients'));
    }
}