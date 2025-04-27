<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //        
        Item::create([
            'name' => 'Cetaphil',
            'description' => 'Facewash.',
            'price' => 157000,
            'quantity' => 5, 
            'category_id' => 1,
            'supplier_id' => 1,
            'created_by' => 1,
        ]);

        Item::create([
            'name' => 'Mykonos Luminos',
            'description' => 'Parfum Glow In The Dark.',
            'price' => 163000,
            'quantity' => 2, // Tambahkan stok
            'category_id' => 2,
            'supplier_id' => 2,
            'created_by' => 2,
        ]);
    }
}