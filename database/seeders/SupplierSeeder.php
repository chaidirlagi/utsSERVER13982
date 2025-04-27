<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('suppliers')->insert([
            [
            
                'name' => 'Cetaphil Indonesia',
                'contact_info' => '088899991',
                'created_by'=> 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mykonos',
                'contact_info' => '087777777',
                'created_by'=> 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ]
        ); 
    }
}
