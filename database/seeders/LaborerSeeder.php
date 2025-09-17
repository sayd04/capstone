<?php

namespace Database\Seeders;

use App\Models\Laborer;
use Illuminate\Database\Seeder;

class LaborerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laborers = [
            ['name' => 'Carlos Rodriguez', 'contact' => '+1234567801', 'hourly_rate' => 15.50],
            ['name' => 'Maria Santos', 'contact' => '+1234567802', 'hourly_rate' => 16.00],
            ['name' => 'James Wilson', 'contact' => '+1234567803', 'hourly_rate' => 14.75],
            ['name' => 'Ana Garcia', 'contact' => '+1234567804', 'hourly_rate' => 17.25],
            ['name' => 'Robert Johnson', 'contact' => '+1234567805', 'hourly_rate' => 15.00],
            ['name' => 'Elena Martinez', 'contact' => '+1234567806', 'hourly_rate' => 16.50],
        ];

        foreach ($laborers as $laborer) {
            Laborer::create($laborer);
        }
    }
}