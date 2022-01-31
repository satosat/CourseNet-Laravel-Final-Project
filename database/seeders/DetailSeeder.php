<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Detail;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 60; $i++) {
            Detail::create([
                'transaction_id' => $i + 1,
                'book_id' => $faker->numberBetween(1, 60),
                'transaction_type' => $faker->numberBetween(0, 1),
                'book_amount' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
