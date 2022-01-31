<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
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
            Book::create([
                'title' => $faker->words($nb = 2, $asText = true),
                'author' => $faker->name(),
                'publisher' => $faker->company(),
            ]);
        }
    }
}
