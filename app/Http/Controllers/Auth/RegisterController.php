<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ← أضف هذا
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // عرض صفحة التسجيل
    public function show()
    {
        return view('auth.register');
    }

    // تخزين اليوزر
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // إنشاء Patient تلقائيًا
        Patient::create([
    'user_id'   => $user->id,
    'gender'    => null, // أو أي قيمة مناسبة
]);

        // استخدم Auth facade بدلاً من auth()
        Auth::login($user); // ← هذا هو التغيير الرئيسي

return redirect()->route('login');
    }
}