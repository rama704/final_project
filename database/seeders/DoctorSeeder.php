<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            [
                'full_name' => 'Dr. Ahmad Hassan',
                'email' => 'ahmad.hassan@armodent.com',
                'phone' => '+962-79-123-4567',
                'specialty' => 'General Dentistry',
                'bio' => 'Specialized in general dental care with over 15 years of experience in providing comprehensive oral health services.',
                'years_of_experience' => 15,
            ],
            [
                'full_name' => 'Dr. Sarah Mitchell',
                'email' => 'sarah.mitchell@armodent.com',
                'phone' => '+962-79-234-5678',
                'specialty' => 'Orthodontics',
                'bio' => 'Expert in orthodontics and teeth alignment, helping patients achieve their perfect smile with modern braces and Invisalign.',
                'years_of_experience' => 12,
            ],
            [
                'full_name' => 'Dr. Mohammed Ali',
                'email' => 'mohammed.ali@armodent.com',
                'phone' => '+962-79-345-6789',
                'specialty' => 'Cosmetic Dentistry',
                'bio' => 'Passionate about creating beautiful smiles through veneers, whitening, and aesthetic dental procedures.',
                'years_of_experience' => 10,
            ],
            [
                'full_name' => 'Dr. Layla Khalil',
                'email' => 'layla.khalil@armodent.com',
                'phone' => '+962-79-456-7890',
                'specialty' => 'Pediatric Dentistry',
                'bio' => 'Dedicated to providing gentle and comfortable dental care for children in a friendly environment.',
                'years_of_experience' => 8,
            ],
            [
                'full_name' => 'Dr. Omar Fahmy',
                'email' => 'omar.fahmy@armodent.com',
                'phone' => '+962-79-567-8901',
                'specialty' => 'Oral Surgery',
                'bio' => 'Skilled oral surgeon specializing in dental implants, wisdom teeth removal, and complex extractions.',
                'years_of_experience' => 18,
            ],
            [
                'full_name' => 'Dr. Nora Saeed',
                'email' => 'nora.saeed@armodent.com',
                'phone' => '+962-79-678-9012',
                'specialty' => 'Periodontics',
                'bio' => 'Expert in treating gum diseases and maintaining healthy gums for long-term oral health.',
                'years_of_experience' => 9,
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}