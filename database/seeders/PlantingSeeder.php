<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Planting;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlantingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = Field::all();
        $crops = ['Corn', 'Wheat', 'Soybeans', 'Tomatoes', 'Potatoes', 'Carrots', 'Lettuce', 'Peppers'];

        foreach ($fields as $field) {
            // Create 1-2 plantings per field
            $plantingCount = rand(1, 2);
            for ($i = 0; $i < $plantingCount; $i++) {
                $plantingDate = Carbon::now()->subDays(rand(30, 120));
                $expectedHarvestDate = $plantingDate->copy()->addDays(rand(60, 120));

                Planting::create([
                    'field_id' => $field->id,
                    'crop_type' => collect($crops)->random(),
                    'planting_date' => $plantingDate,
                    'expected_harvest_date' => $expectedHarvestDate,
                    'status' => collect(['planted', 'growing', 'ready'])->random(),
                ]);
            }
        }
    }
}