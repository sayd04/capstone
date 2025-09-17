<?php

namespace Database\Seeders;

use App\Models\RiceVariety;
use Illuminate\Database\Seeder;

class RiceVarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $riceVarieties = [
            [
                'name' => 'IR64',
                'type' => 'Long grain',
                'description' => 'High-yielding variety suitable for irrigated lowland conditions',
                'growth_duration_days' => 115,
                'expected_yield_per_hectare' => 6.5,
                'season' => 'both',
                'characteristics' => [
                    'grain_length' => '5.5-6.0mm',
                    'amylose_content' => '25-28%',
                    'cooking_quality' => 'Good',
                    'disease_resistance' => ['Blast', 'Bacterial blight']
                ],
                'is_active' => true,
            ],
            [
                'name' => 'PSB Rc82',
                'type' => 'Medium grain',
                'description' => 'Premium quality rice with good eating quality',
                'growth_duration_days' => 120,
                'expected_yield_per_hectare' => 7.2,
                'season' => 'dry',
                'characteristics' => [
                    'grain_length' => '5.0-5.5mm',
                    'amylose_content' => '22-25%',
                    'cooking_quality' => 'Excellent',
                    'disease_resistance' => ['Brown planthopper', 'Tungro']
                ],
                'is_active' => true,
            ],
            [
                'name' => 'NSIC Rc222',
                'type' => 'Long grain',
                'description' => 'High-yielding variety with good grain quality',
                'growth_duration_days' => 110,
                'expected_yield_per_hectare' => 6.8,
                'season' => 'wet',
                'characteristics' => [
                    'grain_length' => '5.8-6.2mm',
                    'amylose_content' => '24-27%',
                    'cooking_quality' => 'Good',
                    'disease_resistance' => ['Blast', 'Brown spot']
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Jasmine Rice',
                'type' => 'Long grain',
                'description' => 'Aromatic rice variety with excellent cooking quality',
                'growth_duration_days' => 125,
                'expected_yield_per_hectare' => 5.5,
                'season' => 'both',
                'characteristics' => [
                    'grain_length' => '6.0-7.0mm',
                    'amylose_content' => '18-20%',
                    'cooking_quality' => 'Premium',
                    'aroma' => 'Strong',
                    'disease_resistance' => ['Bacterial blight']
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Red Rice Variety',
                'type' => 'Medium grain',
                'description' => 'Nutritious red rice with high antioxidant content',
                'growth_duration_days' => 130,
                'expected_yield_per_hectare' => 4.8,
                'season' => 'both',
                'characteristics' => [
                    'grain_length' => '4.5-5.0mm',
                    'color' => 'Red bran',
                    'nutrition' => 'High fiber and antioxidants',
                    'cooking_quality' => 'Good',
                    'disease_resistance' => ['Blast', 'Brown spot']
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Black Glutinous Rice',
                'type' => 'Short grain',
                'description' => 'Special variety for desserts and traditional dishes',
                'growth_duration_days' => 140,
                'expected_yield_per_hectare' => 4.2,
                'season' => 'dry',
                'characteristics' => [
                    'grain_length' => '4.0-4.5mm',
                    'color' => 'Black',
                    'texture' => 'Glutinous',
                    'cooking_quality' => 'Specialty',
                    'use' => 'Desserts and traditional food'
                ],
                'is_active' => true,
            ]
        ];

        foreach ($riceVarieties as $variety) {
            RiceVariety::create($variety);
        }
    }
}