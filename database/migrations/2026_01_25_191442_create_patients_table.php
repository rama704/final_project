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

            // Basic Information
            $table->string('full_name');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();

            // Medical Information
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
