<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@farm.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '+1234567890',
            'address' => '123 Admin Street, Farm City, FC 12345',
        ]);

        // Create farmer users
        User::create([
            'name' => 'John Farmer',
            'email' => 'john@farm.com',
            'password' => Hash::make('password'),
            'role' => 'farmer',
            'phone' => '+1234567891',
            'address' => '456 Farm Road, Crop Valley, CV 54321',
        ]);

        User::create([
            'name' => 'Sarah Green',
            'email' => 'sarah@farm.com',
            'password' => Hash::make('password'),
            'role' => 'farmer',
            'phone' => '+1234567892',
            'address' => '789 Harvest Lane, Green Fields, GF 98765',
        ]);

        // Create buyer users
        User::create([
            'name' => 'Mike Buyer',
            'email' => 'mike@buyer.com',
            'password' => Hash::make('password'),
            'role' => 'buyer',
            'phone' => '+1234567893',
            'address' => '321 Market Street, Trade City, TC 11111',
        ]);

        User::create([
            'name' => 'Lisa Market',
            'email' => 'lisa@buyer.com',
            'password' => Hash::make('password'),
            'role' => 'buyer',
            'phone' => '+1234567894',
            'address' => '654 Commerce Ave, Business Town, BT 22222',
        ]);
    }
}