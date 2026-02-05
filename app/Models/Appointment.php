<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'doctor_id',
        'patient_id',
        'appointment_date',
        'appointment_time',
        'status',
        'patient_name',
        'patient_email',
        'patient_phone',
        'patient_age',
        'service_type',
        'payment_method',
        'notes',
        'cancellation_reason',
        'confirmed_at',
        'completed_at',
        'cancelled_at'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'appointment_time' => 'datetime:H:i',
        'confirmed_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    // ------------------------------
    // العلاقات
    // ------------------------------
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    // ------------------------------
    // Scopes للاستعلامات
    // ------------------------------
    public function scopeUpcoming($query)
    {
        return $query->where('appointment_date', '>=', now()->toDateString())
                     ->whereIn('status', ['pending', 'confirmed'])
                     ->orderBy('appointment_date')
                     ->orderBy('appointment_time');
    }

    public function scopePast($query)
    {
        return $query->where('appointment_date', '<', now()->toDateString())
                     ->orWhere(function ($q) {
                         $q->where('appointment_date', now()->toDateString())
                           ->where('appointment_time', '<', now()->format('H:i:s'));
                     })
                     ->orderBy('appointment_date', 'desc')
                     ->orderBy('appointment_time', 'desc');
    }

    public function scopeForDoctor($query, $doctorId)
    {
        return $query->where('doctor_id', $doctorId);
    }

    public function scopeForPatient($query, $patientId)
    {
        return $query->where('patient_id', $patientId);
    }

    // ------------------------------
    // دوال مساعدة
    // ------------------------------
    public function getFormattedDateAttribute()
    {
        return $this->appointment_date->format('F d, Y');
    }

    public function getFormattedTimeAttribute()
    {
        return date('h:i A', strtotime($this->appointment_time));
    }

    public function getDateTimeAttribute()
    {
        return $this->appointment_date->format('Y-m-d') . ' ' . $this->appointment_time;
    }

    public function isUpcoming()
    {
        return in_array($this->status, ['pending', 'confirmed']) &&
               $this->appointment_date >= now()->toDateString();
    }

    public function canBeCancelled()
    {
        $appointmentDateTime = Carbon::parse($this->DateTimeAttribute);
        return in_array($this->status, ['pending', 'confirmed']) &&
               now()->diffInHours($appointmentDateTime) > 24;
    }
}
