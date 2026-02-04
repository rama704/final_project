<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    // صفحة عرض كل الدكاترة + البحث والفلترة مع Pagination
    public function index(Request $request)
    {
        $query = Doctor::query();

        // البحث بالاسم أو التخصص
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('specialty', 'like', '%' . $request->search . '%')
                  ->orWhere('bio', 'like', '%' . $request->search . '%');
            });
        }

        // فلتر حسب التخصص
        if ($request->filled('specialty')) {
            $query->where('specialty', $request->specialty);
        }

        // فلتر حسب سنوات الخبرة
        if ($request->filled('experience')) {
            if ($request->experience == 'junior') {
                $query->where('years_of_experience', '<', 5);
            } elseif ($request->experience == 'senior') {
                $query->where('years_of_experience', '>=', 5)
                      ->where('years_of_experience', '<', 15);
            } elseif ($request->experience == 'expert') {
                $query->where('years_of_experience', '>=', 15);
            }
        }

        // فلتر حسب التقييم
        if ($request->filled('rating')) {
            $query->whereHas('ratings', function($q) use ($request) {
                $q->selectRaw('doctor_id, AVG(rating) as avg_rating')
                  ->groupBy('doctor_id')
                  ->having('avg_rating', '>=', $request->rating);
            });
        }

        // فلتر حسب المهارات
        if ($request->filled('skill')) {
            $query->whereJsonContains('skills', $request->skill);
        }

        // الحصول على التخصصات الفريدة للفلتر
        $specialties = Doctor::distinct()->pluck('specialty');

        // ترتيب حسب الخبرة أو التقييم
        $orderBy = $request->input('order_by', 'years_of_experience');
        $orderDirection = $request->input('order_direction', 'desc');

        // حساب التقييم مع كل دكتور
        $doctors = $query->withCount(['ratings as average_rating' => function($q) {
            $q->selectRaw('COALESCE(AVG(rating), 0)');
        }])
        ->orderBy($orderBy, $orderDirection)
        ->paginate($request->input('per_page', 3))
        ->withQueryString(); // مهم عشان يحفظ الفلاتر مع الـ pagination

        return view('doctors.index', compact('doctors', 'specialties'));
    }

    // صفحة تفاصيل دكتور واحد
    public function show($id)
    {
        $doctor = Doctor::with(['ratings' => function($query) {
            $query->with('patient')
                  ->orderBy('created_at', 'desc')
                  ->limit(10);
        }])->findOrFail($id);

        // حساب متوسط التقييم
        $doctor->average_rating = $doctor->ratings()->avg('rating') ?? 0;
        $doctor->total_reviews = $doctor->ratings()->count();

        // دكاترة ذات تخصص مماثل
        $relatedDoctors = Doctor::where('specialty', $doctor->specialty)
            ->where('id', '!=', $doctor->id)
            ->limit(4)
            ->get();

        return view('doctors.show', compact('doctor', 'relatedDoctors'));
    }

    // صفحة إنشاء دكتور جديد
    public function create()
    {
        return view('doctors.create');
    }

    // حفظ دكتور جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors',
            'phone' => 'nullable|string',
            'specialty' => 'required|string|max:100',
            'bio' => 'required|string|min:50',
            'years_of_experience' => 'required|integer|min:0|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'skills' => 'nullable|string',
            'education' => 'nullable|string',
            'license_number' => 'nullable|string',
            'university' => 'nullable|string',
            'available_days' => 'nullable|string',
            'available_from' => 'nullable|date_format:H:i',
            'available_to' => 'nullable|date_format:H:i',
        ]);

        // حفظ الصورة
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('doctors', 'public');
        }

        // معالجة المهارات إذا كانت نصية
        if ($request->has('skills') && is_string($request->skills)) {
            $skills = array_filter(array_map('trim', explode(',', $request->skills)));
            $validated['skills'] = !empty($skills) ? json_encode($skills) : null;
        }

        // معالجة التعليم إذا كان نصياً
        if ($request->has('education') && is_string($request->education)) {
            $education = array_filter(array_map('trim', explode(',', $request->education)));
            $validated['education'] = !empty($education) ? json_encode($education) : null;
        }

        Doctor::create($validated);

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor added successfully!');
    }

    // صفحة تعديل دكتور
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

    // تحديث بيانات دكتور
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'nullable|string',
            'specialty' => 'required|string|max:100',
            'bio' => 'required|string|min:50',
            'years_of_experience' => 'required|integer|min:0|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'skills' => 'nullable|string',
            'education' => 'nullable|string',
            'license_number' => 'nullable|string',
            'university' => 'nullable|string',
            'available_days' => 'nullable|string',
            'available_from' => 'nullable|date_format:H:i',
            'available_to' => 'nullable|date_format:H:i',
        ]);

        // تحديث الصورة إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($doctor->image && Storage::disk('public')->exists($doctor->image)) {
                Storage::disk('public')->delete($doctor->image);
            }
            $validated['image'] = $request->file('image')->store('doctors', 'public');
        }

        // معالجة المهارات
        if ($request->has('skills')) {
            if (is_string($request->skills)) {
                $skills = array_filter(array_map('trim', explode(',', $request->skills)));
                $validated['skills'] = !empty($skills) ? json_encode($skills) : null;
            }
        }

        // معالجة التعليم
        if ($request->has('education')) {
            if (is_string($request->education)) {
                $education = array_filter(array_map('trim', explode(',', $request->education)));
                $validated['education'] = !empty($education) ? json_encode($education) : null;
            }
        }

        $doctor->update($validated);

        return redirect()->route('doctors.show', $doctor->id)
            ->with('success', 'Doctor updated successfully!');
    }

    // حذف دكتور
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        // حذف الصورة إذا كانت موجودة
        if ($doctor->image && Storage::disk('public')->exists($doctor->image)) {
            Storage::disk('public')->delete($doctor->image);
        }

        $doctor->delete();

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor deleted successfully!');
    }

    // للصفحة الرئيسية – عرض دكاترة مميزة
    public function featured(Request $request)
    {
        $query = Doctor::query();

        // يمكن إضافة فلتر للصفحة الرئيسية
        if ($request->filled('specialty')) {
            $query->where('specialty', $request->specialty);
        }

        $doctors = $query->withCount(['ratings as average_rating' => function($q) {
            $q->selectRaw('COALESCE(AVG(rating), 0)');
        }])
        ->orderByDesc('years_of_experience')
        ->limit(6)
        ->get();

        // الحصول على التخصصات للفلتر
        $specialties = Doctor::distinct()->pluck('specialty');

        return view('index', compact('doctors', 'specialties'));
    }

    // API endpoint للحصول على الدكاترة (للاستخدام مع AJAX)
    public function getDoctorsApi(Request $request)
    {
        $query = Doctor::query();

        // تطبيق الفلاتر إذا وجدت
        if ($request->filled('specialty')) {
            $query->where('specialty', $request->specialty);
        }

        if ($request->filled('search')) {
            $query->where('full_name', 'like', '%' . $request->search . '%');
        }

        $perPage = $request->input('per_page', 12);
        $page = $request->input('page', 1);
        
        $doctors = $query->select('id', 'full_name', 'specialty', 'image', 'years_of_experience')
            ->withCount(['ratings as average_rating' => function($q) {
                $q->selectRaw('COALESCE(AVG(rating), 0)');
            }])
            ->orderBy('years_of_experience', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        $data = $doctors->map(function($doctor) {
            return [
                'id' => $doctor->id,
                'name' => $doctor->full_name,
                'specialty' => $doctor->specialty,
                'image' => $doctor->image ? asset('storage/' . $doctor->image) : asset('img/default-doctor.jpg'),
                'experience' => $doctor->years_of_experience,
                'rating' => round($doctor->average_rating, 1),
                'profile_url' => route('doctors.show', $doctor->id),
                'booking_url' => route('appointments.create', ['doctor_id' => $doctor->id])
            ];
        });

        return response()->json([
            'data' => $data,
            'current_page' => $doctors->currentPage(),
            'last_page' => $doctors->lastPage(),
            'per_page' => $doctors->perPage(),
            'total' => $doctors->total(),
            'has_more_pages' => $doctors->hasMorePages(),
            'next_page_url' => $doctors->nextPageUrl(),
            'prev_page_url' => $doctors->previousPageUrl()
        ]);
    }

    // الحصول على تقييمات دكتور معين
    public function getRatings($doctorId, Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $doctor = Doctor::findOrFail($doctorId);

        $ratings = $doctor->ratings()
            ->with('patient')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        $ratingData = $ratings->map(function($rating) {
            return [
                'id' => $rating->id,
                'patient_name' => $rating->patient->name ?? 'Anonymous',
                'patient_avatar' => $rating->patient->avatar ? asset('storage/' . $rating->patient->avatar) : asset('img/default-avatar.jpg'),
                'rating' => $rating->rating,
                'review' => $rating->review,
                'date' => $rating->created_at->format('M d, Y'),
                'time_ago' => $rating->created_at->diffForHumans()
            ];
        });

        return response()->json([
            'data' => $ratingData,
            'current_page' => $ratings->currentPage(),
            'last_page' => $ratings->lastPage(),
            'per_page' => $ratings->perPage(),
            'total' => $ratings->total(),
            'has_more_pages' => $ratings->hasMorePages(),
            'next_page_url' => $ratings->nextPageUrl(),
            'prev_page_url' => $ratings->previousPageUrl(),
            'average_rating' => round($doctor->ratings()->avg('rating') ?? 0, 1),
            'total_reviews' => $doctor->ratings()->count()
        ]);
    }
}