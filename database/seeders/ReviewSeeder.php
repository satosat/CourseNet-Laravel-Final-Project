<?php

namespace Database\Seeders;

use App\Models\Review;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 150; $i++) {
            Review::create([
                'user_id' => $faker->numberBetween(1, 10),
                'book_id' => $i % 50 + 1, // 3 reviews for each book
                'rating' => $faker->numberBetween(1, 10),
                'comment' => $faker->sentence(15),
            ]);
        }
    }
}
