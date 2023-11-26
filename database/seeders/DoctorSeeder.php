<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creating the doctor user
        $doctor = Doctor::create([
            'name' => 'David Hanselhof',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('doctor12345')
        ]);
        $doctor->assignRole('doctor');
    }
}
