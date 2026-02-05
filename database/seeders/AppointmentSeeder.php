<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Appointment::create([
        'clinic_id' => 1,
        'doctor_id' => 1,
        'patient_id' => 1,
        'appointment_date' => now()->addDay()->toDateString(),
        'appointment_time' => '10:00',
        'status' => 'confirmed',
        'service_type' => 'checkup',
        'payment_method' => 'cash',
    ]);
    }
}
