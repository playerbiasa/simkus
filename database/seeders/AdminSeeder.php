<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama' => 'Admin SIMKU',
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'status' => 1,
            'remember_token' => rand()
        ]);

        Admin::create([
            'nama' => 'Admin SIMKU 2',
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'status' => 1,
            'remember_token' => rand()
        ]);
    }
}
