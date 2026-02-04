<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = Doctor::all();
        $patients = User::where('role', 'patient')->get();

        if ($doctors->isEmpty() || $patients->isEmpty()) {
            return;
        }

        // 🟢 مواعيد مكتملة (completed)
        for ($i = 1; $i <= 10; $i++) {
            $doctor = $doctors->random();
            $patient = $patients->random();
            $date = now()->subDays(rand(1, 30));

            Appointment::create([
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
                'patient_name' => $patient->name,
                'patient_email' => $patient->email,
                'patient_phone' => $patient->phone ?? '+1 (555) 123-4567',
                'patient_age' => rand(18, 65),
                'appointment_date' => $date->toDateString(),
                'appointment_time' => $this->generateTimeSlot(),
                'service_type' => $this->randomServiceType(),
                'payment_method' => $this->randomPaymentMethod(),
                'status' => 'completed', // ✅ enum صحيح
                'notes' => 'Regular checkup appointment.',
                'completed_at' => $date->copy()->addHour(),
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            $doctor = $doctors->random();
            $patient = $patients->random();
            $date = now()->addDays(rand(1, 14));

            Appointment::create([
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
                'patient_name' => $patient->name,
                'patient_email' => $patient->email,
                'patient_phone' => $patient->phone ?? '+1 (555) 123-4567',
                'patient_age' => rand(18, 65),
                'appointment_date' => $date->toDateString(),
                'appointment_time' => $this->generateTimeSlot(),
                'service_type' => $this->randomServiceType(),
                'payment_method' => $this->randomPaymentMethod(),
                'status' => 'pending', 
                'notes' => 'Scheduled appointment.',
                'confirmed_at' => null,
            ]);
        }

        // 🔵 مواعيد مؤكدة (confirmed)
        for ($i = 1; $i <= 3; $i++) {
            $doctor = $doctors->random();
            $patient = $patients->random();
            $date = now()->addDays(rand(1, 7));

            Appointment::create([
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
                'patient_name' => $patient->name,
                'patient_email' => $patient->email,
                'patient_phone' => $patient->phone ?? '+1 (555) 123-4567',
                'patient_age' => rand(18, 65),
                'appointment_date' => $date->toDateString(),
                'appointment_time' => $this->generateTimeSlot(),
                'service_type' => $this->randomServiceType(),
                'payment_method' => $this->randomPaymentMethod(),
                'status' => 'confirmed', // ✅ enum صحيح
                'notes' => 'Confirmed appointment.',
                'confirmed_at' => now(),
            ]);
        }

        // 🔴 مواعيد ملغاة (cancelled)
        for ($i = 1; $i <= 2; $i++) {
            $doctor = $doctors->random();
            $patient = $patients->random();
            $date = now()->addDays(rand(1, 10));

            Appointment::create([
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
                'patient_name' => $patient->name,
                'patient_email' => $patient->email,
                'patient_phone' => $patient->phone ?? '+1 (555) 123-4567',
                'patient_age' => rand(18, 65),
                'appointment_date' => $date->toDateString(),
                'appointment_time' => $this->generateTimeSlot(),
                'service_type' => $this->randomServiceType(),
                'payment_method' => $this->randomPaymentMethod(),
                'status' => 'cancelled',
                'notes' => 'Appointment cancelled by patient.',
                'cancelled_at' => now(),
            ]);
        }
    }

    private function generateTimeSlot(): string
    {
        $times = ['09:00', '10:00', '11:00', '14:00', '15:00', '16:00'];
        return $times[array_rand($times)];
    }

    private function randomServiceType(): string
    {
        $services = [
            'teeth_cleaning',
            'filling',
            'extraction',
            'braces',
            'root_canal',
            'whitening',
            'checkup',
            'emergency',
            'other'
        ];
        return $services[array_rand($services)];
    }

    private function randomPaymentMethod(): string
    {
        $methods = ['cash', 'card', 'insurance'];
        return $methods[array_rand($methods)];
    }
}
