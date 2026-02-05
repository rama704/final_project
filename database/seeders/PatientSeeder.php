<?php

namespace Database\Seeders;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
        'user_id' => 3,
        'gender' => 'male',
        'clinic_id' => 1,
        
    ]);
    }
}
