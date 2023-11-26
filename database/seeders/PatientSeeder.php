<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creating the patient
        $patient = Patient::create([
            'name' => 'Tems Olatunde',
            'email' => 'patient@gmail.com',
            'password' => Hash::make('patient12345'),
        ]);
        $patient->assignRole('patient');
    }
}
