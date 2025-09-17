<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\User;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $farmers = User::where('role', 'farmer')->get();

        foreach ($farmers as $farmer) {
            // Create 2-3 fields per farmer
            $fieldCount = rand(2, 3);
            for ($i = 1; $i <= $fieldCount; $i++) {
                Field::create([
                    'user_id' => $farmer->id,
                    'location' => "Field {$i} - " . $farmer->name,
                    'soil_type' => collect(['Clay', 'Sandy', 'Loam', 'Silt'])->random(),
                    'size' => rand(50, 500) / 10, // 5.0 to 50.0 hectares
                ]);
            }
        }
    }
}