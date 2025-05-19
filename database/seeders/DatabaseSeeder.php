<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Delivery;
use App\Models\Package;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        
        // Create Cities
        $johannesburg = City::create(['name' => 'Johannesburg']);
        $capetown = City::create(['name' => 'Cape Town']);

        // Create Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@plusmove.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'city_id' => $johannesburg->id,
        ]);

        // Create Driver
        $driver = User::create([
            'name' => 'Driver Dave',
            'email' => 'driver@plusmove.com',
            'password' => bcrypt('password'),
            'role' => 'driver',
            'city_id' => $johannesburg->id,
        ]);

        // Create Customer
        $customer = User::create([
            'name' => 'Customer Carl',
            'email' => 'customer@plusmove.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
            'city_id' => $johannesburg->id,
        ]);

        // Create Delivery
        $delivery = Delivery::create([
            'driver_id' => $driver->id,
            'city_id' => $johannesburg->id,
            'date' => now(),
            'status' => 'pending',
        ]);

        // Create Packages
        Package::create([
            'customer_id' => $customer->id,
            'delivery_id' => $delivery->id,
            'status' => 'pending',
            'weight' => 5.4,
            'notes' => 'Fragile',
        ]);

        Package::create([
            'customer_id' => $customer->id,
            'delivery_id' => $delivery->id,
            'status' => 'pending',
            'weight' => 2.3,
        ]);
    }

}
