<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $patients = [
            [
                'full_name' => 'John Anderson',
                'gender' => 'male',
                'date_of_birth' => '1985-03-15',
                'phone' => '+962-77-111-2222',
                'email' => 'john.anderson@email.com',
                'address' => '123 Main Street, Amman, Jordan',
                'allergies' => 'Penicillin',
                'chronic_conditions' => 'Hypertension',
                'current_medications' => 'Lisinopril 10mg daily',
                'previous_dental_history' => 'Root canal treatment in 2020, Regular cleanings',
                'last_dental_visit' => '2024-11-15',
                'current_oral_problems' => 'None',
            ],
            [
                'full_name' => 'Emma Wilson',
                'gender' => 'female',
                'date_of_birth' => '1992-07-22',
                'phone' => '+962-77-222-3333',
                'email' => 'emma.wilson@email.com',
                'address' => '456 Oak Avenue, Amman, Jordan',
                'allergies' => 'None',
                'chronic_conditions' => 'None',
                'current_medications' => 'None',
                'previous_dental_history' => 'Braces for 2 years (2015-2017)',
                'last_dental_visit' => '2024-12-01',
                'current_oral_problems' => 'Mild tooth sensitivity',
            ],
            [
                'full_name' => 'Michael Brown',
                'gender' => 'male',
                'date_of_birth' => '1978-11-30',
                'phone' => '+962-77-333-4444',
                'email' => 'michael.brown@email.com',
                'address' => '789 Cedar Lane, Amman, Jordan',
                'allergies' => 'Latex',
                'chronic_conditions' => 'Type 2 Diabetes',
                'current_medications' => 'Metformin 500mg twice daily',
                'previous_dental_history' => 'Multiple fillings, Crown on upper molar',
                'last_dental_visit' => '2024-10-20',
                'current_oral_problems' => 'Gum inflammation',
            ],
            [
                'full_name' => 'Sophia Martinez',
                'gender' => 'female',
                'date_of_birth' => '2005-05-18',
                'phone' => '+962-77-444-5555',
                'email' => 'sophia.martinez@email.com',
                'address' => '321 Pine Road, Amman, Jordan',
                'allergies' => 'None',
                'chronic_conditions' => 'None',
                'current_medications' => 'None',
                'previous_dental_history' => 'Regular check-ups, No major procedures',
                'last_dental_visit' => '2024-09-10',
                'current_oral_problems' => 'Wisdom teeth coming in',
            ],
            [
                'full_name' => 'David Thompson',
                'gender' => 'male',
                'date_of_birth' => '1995-09-05',
                'phone' => '+962-77-555-6666',
                'email' => 'david.thompson@email.com',
                'address' => '654 Maple Street, Amman, Jordan',
                'allergies' => 'Sulfa drugs',
                'chronic_conditions' => 'Asthma',
                'current_medications' => 'Albuterol inhaler as needed',
                'previous_dental_history' => 'Teeth whitening in 2023',
                'last_dental_visit' => '2024-08-25',
                'current_oral_problems' => 'None',
            ],
            [
                'full_name' => 'Olivia Davis',
                'gender' => 'female',
                'date_of_birth' => '1988-12-12',
                'phone' => '+962-77-666-7777',
                'email' => 'olivia.davis@email.com',
                'address' => '987 Elm Boulevard, Amman, Jordan',
                'allergies' => 'None',
                'chronic_conditions' => 'None',
                'current_medications' => 'Birth control pills',
                'previous_dental_history' => 'Veneers on front teeth, Regular cleanings',
                'last_dental_visit' => '2024-12-15',
                'current_oral_problems' => 'None',
            ],
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }
}