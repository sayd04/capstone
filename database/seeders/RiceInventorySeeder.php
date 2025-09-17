<?php

namespace Database\Seeders;

use App\Models\InventoryItem;
use App\Models\RiceVariety;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RiceInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $riceVarieties = RiceVariety::all();

        // Rice Seeds
        foreach ($riceVarieties as $variety) {
            InventoryItem::create([
                'name' => $variety->name . ' Seeds',
                'category' => 'rice_seeds',
                'rice_variety_id' => $variety->id,
                'quality_grade' => 'premium',
                'product_description' => 'High quality certified seeds for ' . $variety->name,
                'is_organic' => false,
                'quantity' => rand(100, 500),
                'price' => rand(80, 150),
                'unit' => 'kg',
                'min_stock' => 20,
            ]);
        }

        // Fertilizers for rice farming
        $fertilizers = [
            ['name' => 'Urea (46-0-0)', 'price' => 25.50, 'description' => 'Nitrogen fertilizer for vegetative growth'],
            ['name' => 'Complete Fertilizer (14-14-14)', 'price' => 32.00, 'description' => 'Balanced NPK fertilizer for rice'],
            ['name' => 'Potassium Chloride (0-0-60)', 'price' => 28.75, 'description' => 'Potassium fertilizer for grain filling'],
            ['name' => 'Organic Rice Fertilizer', 'price' => 45.00, 'description' => 'Organic fertilizer for sustainable rice farming'],
        ];

        foreach ($fertilizers as $fertilizer) {
            InventoryItem::create([
                'name' => $fertilizer['name'],
                'category' => 'fertilizers',
                'product_description' => $fertilizer['description'],
                'is_organic' => str_contains($fertilizer['name'], 'Organic'),
                'quantity' => rand(50, 200),
                'price' => $fertilizer['price'],
                'unit' => 'bag',
                'min_stock' => 10,
            ]);
        }

        // Rice farming pesticides and herbicides
        $pesticides = [
            ['name' => 'Rice Bug Insecticide', 'category' => 'pesticides', 'price' => 85.00],
            ['name' => 'Brown Planthopper Control', 'category' => 'pesticides', 'price' => 95.00],
            ['name' => 'Rice Blast Fungicide', 'category' => 'pesticides', 'price' => 78.50],
            ['name' => 'Weed Killer for Rice Fields', 'category' => 'herbicides', 'price' => 120.00],
            ['name' => 'Pre-emergent Herbicide', 'category' => 'herbicides', 'price' => 110.00],
        ];

        foreach ($pesticides as $pesticide) {
            InventoryItem::create([
                'name' => $pesticide['name'],
                'category' => $pesticide['category'],
                'product_description' => 'Effective control for rice farming',
                'is_organic' => false,
                'quantity' => rand(20, 100),
                'price' => $pesticide['price'],
                'unit' => 'liter',
                'min_stock' => 5,
            ]);
        }

        // Rice farming tools
        $tools = [
            ['name' => 'Rice Transplanter (Hand)', 'price' => 450.00],
            ['name' => 'Rice Harvesting Sickle', 'price' => 125.00],
            ['name' => 'Paddy Weeder', 'price' => 85.00],
            ['name' => 'Water Level Gauge', 'price' => 65.00],
            ['name' => 'Rice Moisture Meter', 'price' => 2500.00],
        ];

        foreach ($tools as $tool) {
            InventoryItem::create([
                'name' => $tool['name'],
                'category' => 'farm_tools',
                'product_description' => 'Essential tool for rice farming operations',
                'is_organic' => false,
                'quantity' => rand(5, 25),
                'price' => $tool['price'],
                'unit' => 'piece',
                'min_stock' => 2,
            ]);
        }

        // Rice products for marketplace
        foreach ($riceVarieties as $variety) {
            // Milled Rice
            InventoryItem::create([
                'name' => $variety->name . ' - Premium Milled Rice',
                'category' => 'milled_rice',
                'rice_variety_id' => $variety->id,
                'quality_grade' => 'premium',
                'product_description' => 'Premium quality milled ' . $variety->name . ' rice',
                'is_organic' => false,
                'harvest_date' => Carbon::now()->subDays(rand(30, 90)),
                'moisture_content' => rand(120, 140) / 10, // 12.0% - 14.0%
                'quantity' => rand(500, 2000),
                'price' => rand(45, 65),
                'unit' => 'kg',
                'min_stock' => 50,
            ]);

            // Brown Rice
            InventoryItem::create([
                'name' => $variety->name . ' - Brown Rice',
                'category' => 'brown_rice',
                'rice_variety_id' => $variety->id,
                'quality_grade' => 'grade_a',
                'product_description' => 'Nutritious brown ' . $variety->name . ' rice with bran intact',
                'is_organic' => rand(0, 1),
                'harvest_date' => Carbon::now()->subDays(rand(30, 90)),
                'moisture_content' => rand(130, 150) / 10, // 13.0% - 15.0%
                'quantity' => rand(200, 800),
                'price' => rand(55, 75),
                'unit' => 'kg',
                'min_stock' => 25,
            ]);
        }

        // Organic rice products
        $organicVarieties = $riceVarieties->take(3);
        foreach ($organicVarieties as $variety) {
            InventoryItem::create([
                'name' => 'Organic ' . $variety->name . ' Rice',
                'category' => 'organic_rice',
                'rice_variety_id' => $variety->id,
                'quality_grade' => 'premium',
                'product_description' => 'Certified organic ' . $variety->name . ' rice, grown without synthetic chemicals',
                'is_organic' => true,
                'harvest_date' => Carbon::now()->subDays(rand(15, 60)),
                'moisture_content' => rand(120, 140) / 10,
                'quantity' => rand(100, 500),
                'price' => rand(75, 95),
                'unit' => 'kg',
                'min_stock' => 20,
            ]);
        }
    }
}