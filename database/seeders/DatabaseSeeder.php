<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Tax;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Role::factory(1)->create(["role" => "customer"]);
        \App\Models\User::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'hieu@gmail.com',
        ]);

        Product::factory(50)->create();
        Category::factory(20)->create();
        Discount::factory()->create(["name" => "new member", "value" => 200]);
        Tax::create(["name" => "new member", "value" => 200]);
    }
}
