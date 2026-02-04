<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function show()
    {
        return view('auth.login');
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // تحقق من اليوزر
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate(); // حماية الجلسة

            // تحقق إذا كان الأدمن
            if (auth()->user()->is_admin) {
                return redirect()->intended('/admin/dashboard');
            }

return redirect()->route('index');
        }

        // فشل تسجيل الدخول
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
