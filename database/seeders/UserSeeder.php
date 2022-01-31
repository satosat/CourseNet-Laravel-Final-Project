<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            User::create([
                'name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'password' => $faker->password($minLength = 8),
            ]);
        }
    }
}
