<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create([
            'name' => 'Keyboard',
            'stock' => 10,
        ]);

        Inventory::create([
            'name' => 'Mouse',
            'stock' => 20,
        ]);

        Inventory::create([
            'name' => 'Monitor',
            'stock' => 5,
        ]);

        Inventory::create([
            'name' => 'CPU',
            'stock' => 3,
        ]);
    }
}
