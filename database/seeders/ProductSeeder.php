<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
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
        $faker = FakerFactory::create();

        for($i = 0; $i<100; $i++) {
            $data = [
                'name' => $faker->name(),
                'price' => 149000,
                'quantity' => 99,
                'category_id' => rand(0,9)
            ];
            DB::table('products')->insert($data);
        }
    }
}
