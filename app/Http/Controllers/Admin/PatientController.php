<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    // عرض جميع المرضى
    public function index()
    {
        $patients = Patient::with('user')->latest()->paginate(10);
        return view('admin.patients.index', compact('patients'));
    }

    // عرض صفحة إنشاء مريض جديد
    public function create()
    {
return view('admin.patients.create');    }

    // تخزين مريض جديد
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'allergies' => 'nullable|string',
            'chronic_conditions' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'previous_dental_history' => 'nullable|string',
            'last_dental_visit' => 'nullable|date',
            'current_oral_problems' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Patient::create($request->all());
        
        return redirect()->route('admin.patients.index')
            ->with('success', 'تم إنشاء المريض بنجاح');
    }

    // عرض مريض واحد
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patients.show', compact('patient'));
    }

    // عرض صفحة تعديل مريض
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patients.edit', compact('patient'));
    }

    // تحديث مريض
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'allergies' => 'nullable|string',
            'chronic_conditions' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'previous_dental_history' => 'nullable|string',
            'last_dental_visit' => 'nullable|date',
            'current_oral_problems' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        
        return redirect()->route('admin.patients.index')
            ->with('success', 'تم تحديث المريض بنجاح');
    }

    // حذف مريض
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        
        return redirect()->route('admin.patients.index')
            ->with('success', 'تم حذف المريض بنجاح');
    }
}