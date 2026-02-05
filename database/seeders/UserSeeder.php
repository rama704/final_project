<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Dr. Ahmed',
                'email' => 'doctor@smilecare.com',
                'password' => '12345678',
                'role' => 'doctor',
                'clinic_id' => 1,
            ],
            [
                'name' => 'Patient User',
                'email' => 'patient@smilecare.com',
                'password' => '12345678',
                'role' => 'patient',
                'clinic_id' => 1,
            ],
            [
                'name' => 'Dr. Hamada',
                'email' => 'dr.hamada@gmail.com',
                'password' => '12345678',
                'role' => 'doctor',
                'clinic_id' => null,
            ],
            
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']], // إذا البريد موجود، ما يضيف
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'], // رح يتشفّر تلقائيًا عبر الميوتور في الـ Model
                    'role' => $userData['role'],
                    'clinic_id' => $userData['clinic_id'] ?? null,
                ]
            );
        }
    }
}
