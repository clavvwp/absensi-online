<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => 'admin123',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@mail.com',
            'password' => 'john123',
            'role' => 'wali_kelas'
        ]);
    }
}
