<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Product;
use App\Models\Collection;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Tenant
        $tenant = Tenant::create([
            'name' => 'Nurah Global',
            'domain' => 'nurah.test',
        ]);

        // 2. Create Tenant Admin
        User::create([
            'name' => 'Nurah Admin',
            'email' => 'admin@nurah.in',
            'password' => Hash::make('password'),
            'type' => 'admin',
            'site_name' => 'Nurah Global',
            'tenant_id' => $tenant->id,
        ]);

        // 3. Create Sample Collection
        $collection = Collection::create([
            'name' => 'Signature Collection',
            'slug' => 'signature-collection',
            'tenant_id' => $tenant->id,
        ]);

        // 4. Create Sample Product
        $p1 = Product::create([
            'title' => 'Santal Royal',
            'slug' => 'santal-royal',
            'description' => 'A luxurious woody scent.',
            'status' => 'active',
            'type' => 'perfume',
            'tenant_id' => $tenant->id,
            'collection_id' => $collection->id,
        ]);
        
        \App\Models\ProductVariant::create([
            'product_id' => $p1->id,
            'size' => '50ml',
            'price' => 12000,
            'compare_at_price' => 15000,
            'stock' => 100,
        ]);

         $p2 = Product::create([
            'title' => 'Rose Oud',
            'slug' => 'rose-oud',
            'description' => 'Classic rose with deep oud notes.',
            'status' => 'active',
            'type' => 'perfume',
            'tenant_id' => $tenant->id,
            'collection_id' => $collection->id,
        ]);

        \App\Models\ProductVariant::create([
            'product_id' => $p2->id,
            'size' => '50ml',
            'price' => 8500,
            'stock' => 50,
        ]);
        
        // Create Tenant 2 for Isolation Test
        $tenant2 = Tenant::create([
             'name' => 'Second Store',
        ]);
        
        // Note: Creating User 2 to test isolation properly requires valid email
        User::create([
            'name' => 'Second Store Admin',
            'email' => 'admin@store2.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
            'site_name' => 'Second Store',
            'tenant_id' => $tenant2->id,
        ]);
        
        Product::create([
            'title' => 'Hidden Product',
            'slug' => 'hidden-product',
            'description' => 'Should not be seen by Tenant 1',
            'status' => 'active',
            'tenant_id' => $tenant2->id,
        ]);
    }
}
