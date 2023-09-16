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
            'username' => 'adminsimku',
            'email' => 'adminsimku@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'status' => 1,
            'remember_token' => rand()
        ]);
    }
}
