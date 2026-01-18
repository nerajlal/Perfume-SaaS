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
            SuperAdminSeeder::class,
            TenantSeeder::class,
            // CollectionSeeder::class, // Commented out as they might not be multi-tenant ready or we want clean slate
            // ProductSeeder::class,
            // BundleSeeder::class,
            // DiscountSeeder::class,
            // AttributeSeeder::class,
        ]);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@nurah.com',
            'password' => bcrypt('password'),
        ]);
    }
}
