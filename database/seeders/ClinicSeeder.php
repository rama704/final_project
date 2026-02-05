<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clinic;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Clinic::create([
    'name' => 'Smile Care Clinic',
    'address' => 'Ramallah',
    'phone' => '0599000000',
    'email' => 'info@smilecare.com',
     'opening_time' => '08:00:00',  // أضف هذا
    'closing_time' => '17:00:00',  // لو فيه closing_time أيضًا
     'working_days' => 'Mon,Tue,Wed,Thu,Fri'  // <--- أضف هذا
]);

    }}
