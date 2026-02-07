<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    // Middleware لحماية جميع الـ routes لهذا Controller
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    // عرض كل الدكاترة مع Pagination
    public function index()
    {
        $doctors = Doctor::latest()->paginate(10);
        return view('admin.doctors.index', compact('doctors'));
    }

    // صفحة إنشاء دكتور جديد
    public function create()
    {
        return view('admin.doctors.create');
    }

    // تخزين الدكتور الجديد
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mass assignment آمن
        Doctor::create($request->only(['name','specialty','email','phone']));

        return redirect()->route('admin.doctors.index')
            ->with('success', 'تم إنشاء الطبيب بنجاح');
    }

    // عرض صفحة تفاصيل دكتور
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.show', compact('doctor'));
    }

    // صفحة تعديل دكتور
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id); // ✅ تصحيح
        return view('admin.doctors.edit', compact('doctor'));
    }

    // تحديث بيانات دكتور
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->only(['name','specialty','email','phone']));

        return redirect()->route('admin.doctors.index')
            ->with('success', 'تم تحديث الطبيب بنجاح');
    }

    // حذف دكتور
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctors.index')
            ->with('success', 'تم حذف الطبيب بنجاح');
    }
}
