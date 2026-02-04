<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('specialty'); // التخصص
            $table->text('bio')->nullable(); // نبذة عن الدكتور
            $table->integer('years_of_experience')->nullable(); // سنوات الخبرة
            
            // الصور
            $table->string('image')->nullable(); // مسار صورة البروفايل
            $table->json('gallery')->nullable(); // معرض صور (اختياري)

            // معلومات إضافية
            $table->json('education')->nullable(); // المؤهلات العلمية
            $table->json('skills')->nullable(); // المهارات
            $table->string('license_number')->nullable(); // رقم الرخصة الطبية
            $table->string('university')->nullable(); // الجامعة
            $table->string('available_days')->nullable(); // أيام العمل
            $table->time('available_from')->nullable(); // وقت العمل من
            $table->time('available_to')->nullable(); // وقت العمل إلى

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};