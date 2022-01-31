<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 60; $i++) {
            for ($j=0; $j < $faker->numberBetween(5, 20); $j++) {
                Bookmark::create([
                    'user_id' => $i + 1,
                    'book_id' => $faker->numberBetween(1, 60),
                ]);
            }
        }
    }
}
