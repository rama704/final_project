<?php

namespace Database\Seeders;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {Doctor::create([
    'user_id' => 2,
    'clinic_id' => 1,
    'specialty' => 'Dentist', // غيرت من specialization لـ specialty
    'years_of_experience' => 5,
    // باقي الحقول...
]);

    }
}
