<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'specialty',
        'bio',
        'years_of_experience',
        'image',
        'gallery',
        'education',
        'skills',
        'license_number',
        'university',
        'available_days',
        'available_from',
        'available_to'
    ];

    protected $casts = [
        'gallery' => 'array',
        'education' => 'array',
        'skills' => 'array',
    ];
    
    // العلاقة مع التقيمات
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    
    // دالة لحساب متوسط التقييم
    public function getAverageRatingAttribute()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }
    
    // دالة للحصول على عدد التقييمات
    public function getRatingsCountAttribute()
    {
        return $this->ratings()->count();
    }
    
    // دالة للحصول على رابط الصورة
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
    
    // دالة لتحويل المهارات من JSON إلى array
    public function getSkillsArrayAttribute()
    {
        if (is_array($this->skills)) {
            return $this->skills;
        }
        
        if (is_string($this->skills) && !empty($this->skills)) {
            return json_decode($this->skills, true) ?: [];
        }
        
        return [];
    }
}