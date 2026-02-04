<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();

            // Appointment Details
            $table->date('appointment_date'); // تاريخ الموعد
            $table->time('appointment_time'); // وقت الموعد
            $table->enum('status', ['booked', 'confirmed', 'completed', 'cancelled', 'no_show'])->default('booked');
            
            // Patient Information
            $table->string('patient_name'); // اسم المريض (لحفظ نسخة في حالة تغيير بيانات المريض)
            $table->string('patient_email'); // إيميل المريض
            $table->string('patient_phone'); // هاتف المريض
            $table->integer('patient_age')->nullable(); // عمر المريض
            
            // Service Details
            $table->enum('service_type', [
                'teeth_cleaning',
                'filling',
                'extraction',
                'braces',
                'root_canal',
                'whitening',
                'checkup',
                'emergency',
                'other'
            ])->default('checkup');
            
            $table->enum('payment_method', ['cash', 'card', 'insurance'])->default('cash');
            
            // Additional Information
            $table->text('notes')->nullable(); // ملاحظات إضافية
            $table->text('cancellation_reason')->nullable(); // سبب الإلغاء إذا ألغي
            
            // Timestamps for tracking
            $table->timestamp('confirmed_at')->nullable(); // وقت تأكيد الموعد
            $table->timestamp('completed_at')->nullable(); // وقت إنهاء الموعد
            $table->timestamp('cancelled_at')->nullable(); // وقت إلغاء الموعد
            
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['appointment_date', 'appointment_time']);
            $table->index('status');
            $table->index(['doctor_id', 'appointment_date']);
            $table->index(['patient_id', 'appointment_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};