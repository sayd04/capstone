<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run(): void
    {
        echo "TestSeeder is running!\n";
        dump("This is a test seeder");
    }
}