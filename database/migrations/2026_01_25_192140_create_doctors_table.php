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

    $table->foreignId('user_id')
          ->constrained('users')
          ->cascadeOnDelete();

    $table->foreignId('clinic_id')
          ->constrained('clinics')
          ->cascadeOnDelete();

    $table->string('specialty');
    $table->text('bio')->nullable();
    $table->integer('years_of_experience')->nullable();

    $table->string('image')->nullable();
    $table->json('gallery')->nullable();

    $table->json('education')->nullable();
    $table->json('skills')->nullable();

    $table->string('license_number')->nullable();
    $table->string('university')->nullable();

    $table->json('available_days')->nullable();
    $table->time('available_from')->nullable();
    $table->time('available_to')->nullable();

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};