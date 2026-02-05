<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientProfileController extends Controller
{
    // عرض الملف الشخصي للمريض الحالي (المسجل دخوله)
    public function show()
{
    if (!auth()->check()) {
        return redirect()->route('login'); // أو رابط صفحة تسجيل الدخول عندك
    }

    // الحصول على المريض المرتبط بالمستخدم الحالي
    $patient = Patient::where('user_id', auth()->id())->firstOrFail();

    return view('patients.profile', compact('patient'));
}


    // تعديل الملف الشخصي للمريض الحالي
    public function edit()
    {
        $patient = Patient::where('user_id', auth()->id())->firstOrFail();

        return view('patients.edit-profile', compact('patient'));
    }

    // تحديث الملف الشخصي للمريض الحالي
    public function update(Request $request)
    {
        $patient = Patient::where('user_id', auth()->id())->firstOrFail();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'date_of_birth' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'allergies' => 'nullable|string',
            'chronic_conditions' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'previous_dental_history' => 'nullable|string',
            'last_dental_visit' => 'nullable|date',
            'current_oral_problems' => 'nullable|string',
        ]);

        $patient->update($validated);

        return redirect()
            ->route('patients.profile')
            ->with('success', 'Profile updated successfully!');
    }
}