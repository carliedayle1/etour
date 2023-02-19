<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TouristSpot;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'address' => 'Test St. Testing City',
            'email' => 'admin@example.com',
            'isAdmin' => true,
            'password' => bcrypt('admin'),
            'verified' => true
        ]);

        User::factory(10)->create();

        TouristSpot::factory(10)->create();


    }
}
