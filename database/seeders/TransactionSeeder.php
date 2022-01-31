<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 50; $i++) {
            Transaction::create([
                'user_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
