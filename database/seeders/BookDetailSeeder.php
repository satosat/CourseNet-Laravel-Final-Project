<?php

namespace Database\Seeders;

use App\Models\BookDetail;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 50; $i++) {
            BookDetail::create([
                'book_id' => $i + 1,
                'genre' => $faker->word(),
                'year_published' => $faker->year($max = 'now'),
                'page_length' => $faker->numberBetween($min = 100, $max = 800),
                'rent_price' => $faker->numberBetween($min = 5000, $max = 10000),
                'buy_price' => $faker->numberBetween($min = 20000, $max = 100000),
                'rent_stock' => $faker->numberBetween($min = 0, $max = 10),
                'buy_stock' => $faker->numberBetween($min = 0, $max = 100),
            ]);
        }
    }
}
