<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama' => 'Muhammad Slamet',
            'username' => 'admin1',
            'email' => 'admin1@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'status' => 1,
            'remember_token' => rand()
        ]);

        Admin::create([
            'nama' => 'Adi Cahyono',
            'username' => 'admin2',
            'email' => 'admin2@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'status' => 1,
            'remember_token' => rand()
        ]);

        Admin::create([
            'nama' => 'Humaidi',
            'username' => 'admin3',
            'email' => 'admin3@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'status' => 1,
            'remember_token' => rand()
        ]);
    }
}
