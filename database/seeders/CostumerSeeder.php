<?php

namespace Database\Seeders;

use App\Models\Costumer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostumerSeeder extends Seeder
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
            Costumer::create([
                'name' => $fake->name,
                'email' => $fake->email,
                'phone' => $fake->phoneNumber,
                'address' => $fake->address,
            ]);
        }
    }
}
