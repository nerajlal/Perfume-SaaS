<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CollectionSeeder::class,
            ProductSeeder::class,
            BundleSeeder::class,
            DiscountSeeder::class,
            AttributeSeeder::class,
        ]);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@nurah.com',
            'password' => bcrypt('password'),
        ]);
    }
}
