<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
        ClinicSeeder::class,
        UserSeeder::class,
        DoctorSeeder::class,
        PatientSeeder::class,
        AppointmentSeeder::class,
        ]);
    }
}