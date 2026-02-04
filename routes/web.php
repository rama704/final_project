<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\PatientAppointments;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية (Public - بدون تسجيل دخول)
Route::get('/', [HomeController::class, 'index'])->name('index');

// تسجيل الدخول والتسجيل (Public)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// تسجيل الخروج
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// مسارات الدكاترة (Public جزئياً)
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');

// API routes for doctors (Public)
Route::get('/api/doctors', [DoctorController::class, 'getDoctorsApi'])->name('doctors.api');
Route::get('/api/doctors/{id}/ratings', [DoctorController::class, 'getRatings'])->name('doctors.ratings.api');

// ===========================================================================
// مسارات المرضى (تتطلب تسجيل دخول)
// ===========================================================================

Route::middleware(['auth'])->group(function () {

    // =========================
    // Livewire Component Routes
    // =========================

    // صفحة المواعيد باستخدام Livewire
    Route::get('/appointments/view', PatientAppointments::class)
        ->name('appointments.view');

    // =========================
    // Standard Pages & Actions
    // =========================

    Route::get('/appointments', [AppointmentController::class, 'index'])
        ->name('appointments.index');

    Route::get('/appointments/create', [AppointmentController::class, 'create'])
        ->name('appointments.create');

    Route::post('/appointments', [AppointmentController::class, 'store'])
        ->name('appointments.store');

Route::get('/appointments/data', [AppointmentController::class, 'getAppointments'])->name('appointments.data');
    Route::post('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])
        ->name('appointments.cancel');

    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])
        ->name('appointments.show');

    Route::get('/appointments/user/list', [AppointmentController::class, 'getUserAppointments'])
        ->name('appointments.user');

    // Optional: Routes for availability & time slots (used for booking)
    Route::get('/appointments/availability', [AppointmentController::class, 'availability'])
        ->name('appointments.availability');

    Route::get('/appointments/time-slots', [AppointmentController::class, 'timeSlots'])
        ->name('appointments.time-slots');
});

    
    // =======================================================================
    // Patient Profile Routes
    // =======================================================================
    Route::prefix('patient')->name('patients.')->group(function () {
        Route::get('/profile', [PatientProfileController::class, 'show'])->name('profile');
        Route::get('/profile/edit', [PatientProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [PatientProfileController::class, 'update'])->name('profile.update');
    });


// ===========================================================================
// مسارات المشرف (Admin)
// ===========================================================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('doctors', AdminDoctorController::class);
    Route::resource('patients', AdminPatientController::class);
    Route::resource('appointments', AdminAppointmentController::class);
    Route::resource('users', AdminUserController::class);
});

// ===========================================================================
// صفحات عامة
// ===========================================================================
Route::view('/services', 'services')->name('services');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/faq', 'faq')->name('faq');

Route::fallback(function () {
    abort(404);
});

