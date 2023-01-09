<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $index)  {
            DB::table('products')->insert([
                'name' => $faker->city,
                'slug' => $faker->unique()->slug,
                'details' => $faker->paragraph($nb =2),
                'price' => $faker->numberBetween($min = 500, $max = 8000),
                'description'=> $faker->paragraph($nb =8)
            ]);
        }
    }
}
