<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')
          ->constrained('users')
          ->cascadeOnDelete();

   $table->foreignId('clinic_id')->nullable()->constrained('clinics')->cascadeOnDelete();


    // Medical Info
    $table->enum('gender', ['male', 'female'])->nullable();

    $table->text('allergies')->nullable();
    $table->text('chronic_conditions')->nullable();
    $table->text('current_medications')->nullable();

    // Dental History
    $table->text('previous_dental_history')->nullable();
    $table->date('last_dental_visit')->nullable();
    $table->text('current_oral_problems')->nullable();

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
