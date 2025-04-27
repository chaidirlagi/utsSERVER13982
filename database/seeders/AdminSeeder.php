<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
            'username' => 'admin1',
            'password' => Hash::make('admin1'),
            'email' => 'admin1@gmail.com',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],
        [
            'username' => 'admin2',
            'password' => Hash::make('admin2'),
            'email' => 'admin2@gmail.com',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]
        ]);
    }
}
