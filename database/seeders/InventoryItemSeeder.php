<?php

namespace Database\Seeders;

use App\Models\InventoryItem;
use Illuminate\Database\Seeder;

class InventoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // Seeds
            ['name' => 'Corn Seeds', 'category' => 'Seeds', 'quantity' => 500, 'price' => 2.50, 'unit' => 'kg', 'min_stock' => 50],
            ['name' => 'Wheat Seeds', 'category' => 'Seeds', 'quantity' => 300, 'price' => 3.00, 'unit' => 'kg', 'min_stock' => 30],
            ['name' => 'Tomato Seeds', 'category' => 'Seeds', 'quantity' => 100, 'price' => 5.00, 'unit' => 'kg', 'min_stock' => 10],
            
            // Fertilizers
            ['name' => 'Nitrogen Fertilizer', 'category' => 'Fertilizers', 'quantity' => 200, 'price' => 25.00, 'unit' => 'bag', 'min_stock' => 20],
            ['name' => 'Phosphorus Fertilizer', 'category' => 'Fertilizers', 'quantity' => 150, 'price' => 30.00, 'unit' => 'bag', 'min_stock' => 15],
            ['name' => 'Organic Compost', 'category' => 'Fertilizers', 'quantity' => 80, 'price' => 15.00, 'unit' => 'bag', 'min_stock' => 10],
            
            // Tools
            ['name' => 'Garden Hoe', 'category' => 'Tools', 'quantity' => 25, 'price' => 45.00, 'unit' => 'piece', 'min_stock' => 5],
            ['name' => 'Pruning Shears', 'category' => 'Tools', 'quantity' => 30, 'price' => 25.00, 'unit' => 'piece', 'min_stock' => 5],
            ['name' => 'Watering Can', 'category' => 'Tools', 'quantity' => 20, 'price' => 35.00, 'unit' => 'piece', 'min_stock' => 3],
            
            // Pesticides
            ['name' => 'Organic Pesticide', 'category' => 'Pesticides', 'quantity' => 60, 'price' => 40.00, 'unit' => 'liter', 'min_stock' => 10],
            ['name' => 'Fungicide', 'category' => 'Pesticides', 'quantity' => 45, 'price' => 35.00, 'unit' => 'liter', 'min_stock' => 8],
            
            // Fresh Produce
            ['name' => 'Fresh Tomatoes', 'category' => 'Produce', 'quantity' => 1000, 'price' => 4.50, 'unit' => 'kg', 'min_stock' => 50],
            ['name' => 'Fresh Corn', 'category' => 'Produce', 'quantity' => 800, 'price' => 3.20, 'unit' => 'kg', 'min_stock' => 40],
            ['name' => 'Fresh Lettuce', 'category' => 'Produce', 'quantity' => 200, 'price' => 6.00, 'unit' => 'kg', 'min_stock' => 20],
            ['name' => 'Fresh Carrots', 'category' => 'Produce', 'quantity' => 600, 'price' => 2.80, 'unit' => 'kg', 'min_stock' => 30],
        ];

        foreach ($items as $item) {
            InventoryItem::create($item);
        }
    }
}