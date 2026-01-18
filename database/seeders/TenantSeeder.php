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
        // Loop to create 3 Stores
        for ($i = 1; $i <= 3; $i++) {
            $isDemo = ($i === 1);
            $tenantName = $isDemo ? 'Nurah Global' : "Store $i Perfumes";
            $domain = $isDemo ? 'nurah.test' : "store{$i}.test";
            
            // 1. Create Tenant
            $tenant = Tenant::create([
                'name' => $tenantName,
                'domain' => $domain,
            ]);

            // 2. Create Tenant Admin
            User::create([
                'name' => "$tenantName Admin",
                'email' => $isDemo ? 'admin@nurah.in' : "admin@store{$i}.com",
                'password' => Hash::make('password'),
                'type' => 'admin',
                'site_name' => $tenantName,
                'tenant_id' => $tenant->id,
            ]);

            // 3. Create 3 Collections
            $collections = [];
            for ($c = 1; $c <= 3; $c++) {
                $collections[] = Collection::create([
                    'name' => "Collection $c ($tenantName)",
                    'slug' => \Illuminate\Support\Str::slug("col-{$i}-{$c}"),
                    'tenant_id' => $tenant->id,
                ]);
            }

            // 4. Create 3 Products per Collection (Total 9)
            $products = [];
            foreach ($collections as $col) {
                for ($p = 1; $p <= 3; $p++) {
                    $prod = Product::create([
                        'title' => "Product {$p} of {$col->name}",
                        'slug' => \Illuminate\Support\Str::slug("prod-{$i}-{$col->id}-{$p}"),
                        'description' => "This is a seeded product for $tenantName.",
                        'status' => 'active',
                        'type' => 'perfume',
                        'tenant_id' => $tenant->id,
                        'collection_id' => $col->id,
                    ]);
                    
                    \App\Models\ProductVariant::create([
                        'product_id' => $prod->id,
                        'size' => '50ml',
                        'price' => rand(1000, 5000),
                        'compare_at_price' => rand(5500, 8000),
                        'stock' => rand(10, 100),
                        'sku' => "SKU-{$i}-{$prod->id}",
                    ]);
                    $products[] = $prod;
                }
            }

            // 5. Create 1 Bundle
            if (count($products) >= 2) {
                $bundle = \App\Models\Bundle::create([
                    'title' => "Signature Bundle ({$tenantName})",
                    'slug' => \Illuminate\Support\Str::slug("bundle-{$i}"),
                    'description' => "A perfect combination of our best scents.",
                    'status' => 'active',
                    'discount_type' => 'percentage',
                    'discount_value' => 15, // 15% off
                    'tenant_id' => $tenant->id,
                ]);

                // Attach 2 Random Products
                $bundleProducts = collect($products)->random(2);
                foreach ($bundleProducts as $bp) {
                    $bundle->products()->attach($bp->id, ['quantity' => 1]);
                }
            }

            // 6. Create 3 Customers
            $customers = [];
            for ($u = 1; $u <= 3; $u++) {
                $customers[] = User::create([
                    'name' => "Customer {$u} of Store {$i}",
                    'email' => "cust{$u}@store{$i}.com",
                    'password' => Hash::make('password'),
                    'type' => 'customer',
                    'tenant_id' => $tenant->id,
                ]);
            }

            // 6. Create 3 Orders
            foreach ($customers as $index => $customer) {
                $order = \App\Models\Order::create([
                    'tenant_id' => $tenant->id,
                    'user_id' => $customer->id,
                    'order_number' => "ORD-{$i}-" . ($index+1) . "-" . time(),
                    'status' => 'processing',
                    'subtotal' => 1000,
                    'total_amount' => 1100,
                    'customer_name' => $customer->name,
                    'customer_email' => $customer->email,
                    'customer_phone' => '1234567890',
                    'shipping_address' => json_encode(['address' => '123 St, City']),
                ]);

                // Add Order Item (1 random product)
                if (!empty($products)) {
                    $prod = $products[0];
                    $variant = $prod->variants->first();
                    \Illuminate\Support\Facades\DB::table('order_items')->insert([
                        'order_id' => $order->id,
                        'product_id' => $prod->id,
                        'name' => $prod->title,
                        'quantity' => 1,
                        'price' => $variant ? $variant->price : 1000,
                        'total' => $variant ? $variant->price : 1000,
                        'type' => 'product',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
