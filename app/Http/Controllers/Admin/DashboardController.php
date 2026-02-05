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

        } elseif ($user->role === 'doctor') {
            // إحصائيات للـ Doctor
            $stats = [
                'patients' => $user->doctor->patients()->count(), // جميع المرضى المرتبطين بالدوكتور
                'appointments' => $user->doctor->appointments()->count(),
            ];

            // آخر 3 مواعيد للدوكتور فقط
            $appointments = $user->doctor->appointments()
                ->with('patient')
                ->latest()
                ->limit(3)
                ->get();

            // آخر 3 مرضى مرتبطين بالدوكتور
            $recentPatients = $user->doctor->patients()
                ->latest()
                ->limit(3)
                ->get();
        }

        return view('admin.dashboard', compact('stats', 'appointments', 'recentPatients', 'user'));
    }
}
