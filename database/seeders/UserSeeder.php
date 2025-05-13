<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'ريان',
                'email' => 'doc@22.com',
                'password' => Hash::make('123'),
                'role' => '1',
            ],
            [
                'name' => 'حسن',
                'email' => 'patient@22.com',
                'password' => Hash::make('123'),
                'role' => '2',
            ],
            [
                'name' => 'احمد',
                'email' => 'admin@22.com',
                'password' => Hash::make('123'),
                'role' => '3',
            ],
        ]);
    }
}
