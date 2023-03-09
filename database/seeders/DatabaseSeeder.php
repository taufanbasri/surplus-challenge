<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(10)->create();
        $images = Image::factory(10)->create();
        $products = Product::factory(10)->create();

        foreach ($products as $product) {
            $product->categories()->attach($categories->random(2)->pluck('id')->toArray());
            $product->images()->attach($images->random(2)->pluck('id')->toArray());
        }
    }
}
