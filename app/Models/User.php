<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ------------------------------
    // الحقول المسموح تعبئتها جماعيًا
    // ------------------------------
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // super_admin, clinic_manager, doctor, patient
    ];
// هذا الميوتتور رح يشفر الباسورد تلقائياً عند الإنشاء أو التحديث
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    // ------------------------------
    // الحقول المخفية عند serialization
    // ------------------------------
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ------------------------------
    // casts
    // ------------------------------
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ------------------------------
    // علاقات حسب الدور
    // ------------------------------

    // علاقة مع Patient (إذا الدور patient)
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    // علاقة مع Doctor (إذا الدور doctor)
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    // علاقة مع Clinic (إذا الدور clinic_manager)
    public function managedClinic()
    {
        return $this->hasOne(Clinic::class, 'manager_id');
    }

    // علاقة مع المواعيد (للمستخدمين الذين لديهم مواعيد)
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    // ------------------------------
    // دوال مساعدة للتحقق من الدور
    // ------------------------------
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    public function isClinicManager()
    {
        return $this->role === 'clinic_manager';
    }

    public function isDoctor()
    {
        return $this->role === 'doctor';
    }

    public function isPatient()
    {
        return $this->role === 'patient';
    }
}
