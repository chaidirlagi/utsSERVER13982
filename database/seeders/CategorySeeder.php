<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
            'name' => 'Skincare',
            'description'=> 'Skincare adalah serangkaian perawatan yang dilakukan untuk menjaga, merawat, dan meningkatkan kesehatan serta penampilan kulit, terutama wajah.',
            'created_by'=> 1,
            'created_at'=> now(),
            'updated_at'=> now()
        ],
        [
            'name' => 'Parfum',
            'description'=> 'Parfum adalah campuran wewangian dari berbagai bahan aromatik yang digunakan untuk memberikan aroma harum pada tubuh dan pakaian.',
            'created_by'=> 2,
            'created_at'=> now(),
            'updated_at'=> now()
        ]
        ]);
    }
}
