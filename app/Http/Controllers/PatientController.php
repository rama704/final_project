<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;

class PatientController extends Controller
{
    // عرض كل المرضى
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // عرض صفحة مريض واحد
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    // صفحة إنشاء مريض جديد
    public function create()
    {
        return view('patients.create');
    }

    // حفظ مريض جديد
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'date_of_birth' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:patients,email',
            'address' => 'nullable|string|max:255',
            'allergies' => 'nullable|string',
            'chronic_conditions' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'previous_dental_history' => 'nullable|string',
            'last_dental_visit' => 'nullable|date',
            'current_oral_problems' => 'nullable|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')
            ->with('success', 'Patient added successfully!');
    }

    // صفحة تعديل مريض
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('edit-profile', compact('patient'));
    }

    // تحديث بيانات المريض
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'date_of_birth' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:patients,email,' . $id,
            'address' => 'nullable|string|max:255',
            'allergies' => 'nullable|string',
            'chronic_conditions' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'previous_dental_history' => 'nullable|string',
            'last_dental_visit' => 'nullable|date',
            'current_oral_problems' => 'nullable|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')
            ->with('success', 'Patient updated successfully!');
    }

    // حذف المريض
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully!');
    }

    // عرض المواعيد الخاصة بالمريض
    public function appointments($id)
    {
        $appointments = Appointment::where('patient_id', $id)
            ->with('doctor')
            ->get();

        return view('patients.appointments', compact('appointments'));
    }
}


// <?php

// namespace App\Http\Controllers\Admin;

// use App\Models\Patient;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Validation\Rule;

// class PatientController extends Controller
// {
//     /**
//      * Display a listing of patients.
//      */
//     public function index()
//     {
//         $patients = Patient::orderBy('created_at', 'desc')->paginate(10);
//         return view('admin.patients.index', compact('patients'));
//     }

//     /**
//      * Show the form for creating a new patient.
//      */
//     public function create()
//     {
//         return view('admin.patients.create');
//     }

//     /**
//      * Store a newly created patient in storage.
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'full_name' => 'required|string|max:255',
//             'gender' => 'required|in:male,female',
//             'date_of_birth' => 'nullable|date',
//             'phone' => 'nullable|string|max:255',
//             'email' => 'required|string|email|max:255|unique:patients',
//             'address' => 'nullable|string|max:255',
//             'allergies' => 'nullable|string',
//             'chronic_conditions' => 'nullable|string',
//             'current_medications' => 'nullable|string',
//             'previous_dental_history' => 'nullable|string',
//             'last_dental_visit' => 'nullable|date',
//             'current_oral_problems' => 'nullable|string',
//         ]);

//         Patient::create($validated);

//         return redirect()->route('admin.patients.index')
//             ->with('success', 'Patient created successfully!');
//     }

//     /**
//      * Display the specified patient.
//      */
//     public function show(Patient $patient)
//     {
//         return view('admin.patients.show', compact('patient'));
//     }

//     /**
//      * Show the form for editing the specified patient.
//      */
//     public function edit(Patient $patient)
//     {
//         return view('admin.patients.edit', compact('patient'));
//     }

//     /**
//      * Update the specified patient in storage.
//      */
//     public function update(Request $request, Patient $patient)
//     {
//         $validated = $request->validate([
//             'full_name' => 'required|string|max:255',
//             'gender' => 'required|in:male,female',
//             'date_of_birth' => 'nullable|date',
//             'phone' => 'nullable|string|max:255',
//             'email' => [
//                 'required',
//                 'string',
//                 'email',
//                 'max:255',
//                 Rule::unique('patients')->ignore($patient->id),
//             ],
//             'address' => 'nullable|string|max:255',
//             'allergies' => 'nullable|string',
//             'chronic_conditions' => 'nullable|string',
//             'current_medications' => 'nullable|string',
//             'previous_dental_history' => 'nullable|string',
//             'last_dental_visit' => 'nullable|date',
//             'current_oral_problems' => 'nullable|string',
//         ]);

//         $patient->update($validated);

//         return redirect()->route('admin.patients.index')
//             ->with('success', 'Patient updated successfully!');
//     }

//     /**
//      * Remove the specified patient from storage.
//      */
//     public function destroy(Patient $patient)
//     {
//         $patient->delete();

//         return redirect()->route('admin.patients.index')
//             ->with('success', 'Patient deleted successfully!');
//     }
// }