<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned()->between(1, 5); // التقييم من 1-5
            $table->text('review')->nullable(); // نص المراجعة
            $table->timestamps();
            
            $table->unique(['patient_id', 'doctor_id']); // منع تقييم مزدوج من نفس المريض
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};