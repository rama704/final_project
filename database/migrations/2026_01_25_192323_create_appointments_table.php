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

    $table->foreignId('clinic_id')->constrained()->cascadeOnDelete();
    $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
    $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();

    $table->date('appointment_date');
    $table->time('appointment_time');

    $table->enum('status', [
        'pending',
        'confirmed',
        'completed',
        'cancelled',
        'no_show'
    ])->default('pending');

    $table->string('patient_name')->nullable();
    $table->string('patient_email')->nullable();
    $table->string('patient_phone')->nullable();
    $table->integer('patient_age')->nullable();

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

    $table->text('notes')->nullable();
    $table->text('cancellation_reason')->nullable();

    $table->timestamp('confirmed_at')->nullable();
    $table->timestamp('completed_at')->nullable();
    $table->timestamp('cancelled_at')->nullable();

    $table->timestamps();

    $table->index(['appointment_date', 'appointment_time']);
    $table->index('status');
    $table->index(['doctor_id', 'appointment_date']);
    $table->index(['patient_id', 'appointment_date']);
    $table->index(['clinic_id', 'appointment_date']);
});
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
