<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RiceFarmingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing users
        User::truncate();

        // Create admin user
        User::create([
            'name' => 'System Administrator',
            'email' => 'admin@ricefarm.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '+63-917-123-4567',
            'address' => 'Department of Agriculture, Quezon City, Philippines',
        ]);

        // Create rice farmers
        User::create([
            'name' => 'Juan Dela Cruz',
            'email' => 'juan.farmer@ricefarm.com',
            'password' => Hash::make('farmer123'),
            'role' => 'farmer',
            'phone' => '+63-917-234-5678',
            'address' => 'Barangay San Isidro, Nueva Ecija, Philippines',
        ]);

        User::create([
            'name' => 'Maria Santos',
            'email' => 'maria.farmer@ricefarm.com',
            'password' => Hash::make('farmer123'),
            'role' => 'farmer',
            'phone' => '+63-917-345-6789',
            'address' => 'Barangay Maligaya, Cabanatuan City, Nueva Ecija, Philippines',
        ]);

        User::create([
            'name' => 'Pedro Reyes',
            'email' => 'pedro.farmer@ricefarm.com',
            'password' => Hash::make('farmer123'),
            'role' => 'farmer',
            'phone' => '+63-917-456-7890',
            'address' => 'Barangay Rizal, Tarlac City, Tarlac, Philippines',
        ]);

        // Create marketplace users (buyers)
        User::create([
            'name' => 'Anna Gonzales',
            'email' => 'anna.buyer@ricefarm.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
            'phone' => '+63-917-567-8901',
            'address' => 'Makati City, Metro Manila, Philippines',
        ]);

        User::create([
            'name' => 'Roberto Cruz',
            'email' => 'roberto.buyer@ricefarm.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
            'phone' => '+63-917-678-9012',
            'address' => 'Cebu City, Cebu, Philippines',
        ]);

        User::create([
            'name' => 'Grace Mendoza',
            'email' => 'grace.buyer@ricefarm.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
            'phone' => '+63-917-789-0123',
            'address' => 'Davao City, Davao del Sur, Philippines',
        ]);
    }
}