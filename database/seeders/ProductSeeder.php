<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Product::create([
                'name' => $fake->name,
                'description' => $fake->text,
                'image' => $fake->imageUrl,
                'price' => $fake->randomNumber(2),
                'available' => $fake->boolean,
                'stock' => $fake->randomNumber(2),
            ]);
        }
    }
}
