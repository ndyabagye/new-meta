<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creating the super admin user
        $superAdmin = User::create([
            'name' => 'Ndyabagye Henry',
            'email' => 'ndyabagyehenrytusi@gmail.com',
            'password' => Hash::make('password')
        ]);

        $superAdmin->assignRole('super_admin');

        //creating the admin user
        $admin = User::create([
            'name' => 'Tobias Matthew',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345')
        ]);
        $admin->assignRole('admin');
    }
}
