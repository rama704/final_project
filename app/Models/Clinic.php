<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    // جدول قاعدة البيانات
    protected $table = 'clinics';

    // الحقول اللي مسموح تملأها بشكل جماعي
    protected $fillable = [
        'name',
        'address',
        'description',
        'email',
        'phone',
        'google_maps_link',
        'opening_time',
        'closing_time',
        'working_days',
        'status',
        'appointment_duration',
        'manager_id', // ربط العيادة بالـ Clinic Manager
    ];

    // casts لتحويل أنواع البيانات تلقائياً
    protected $casts = [
        'working_days' => 'array', // لأن الحقل json
        'opening_time' => 'datetime:H:i',
        'closing_time' => 'datetime:H:i',
    ];

    /**
     * العلاقة مع Clinic Manager
     * كل عيادة تديرها User واحد (Clinic Manager)
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * العلاقة مع Doctors
     * كل عيادة فيها عدة دكاترة
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    /**
     * العلاقة مع Appointments
     * كل عيادة لديها عدة مواعيد
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
