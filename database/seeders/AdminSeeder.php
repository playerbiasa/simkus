<?php

namespace Database\Seeders;

use App\Models\AdminModel;
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
        AdminModel::create([
            'nama' => 'Muhammad Slamet',
            'username' => 'cakmeth',
            'email' => 'cakmeth@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'status' => 1,
            'remember_token' => rand()
        ]);
    }
}
