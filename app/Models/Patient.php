<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Appointment;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'date_of_birth',
        'phone',
        'email',
        'address',
        'allergies',
        'chronic_conditions',
        'current_medications',
        'previous_dental_history',
        'last_dental_visit',
        'current_oral_problems',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'last_dental_visit' => 'date',
    ];

    /**
     * حساب العمر تلقائيًا
     */
    public function getAgeAttribute()
    {
        return $this->date_of_birth ? Carbon::parse($this->date_of_birth)->age : null;
    }

    /**
     * العلاقة مع المواعيد
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * العلاقة مع الـ User
     * كل Patient مرتبط بمستخدم واحد
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
