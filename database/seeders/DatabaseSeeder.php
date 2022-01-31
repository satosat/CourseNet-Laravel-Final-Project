<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BookSeeder::class,
            BookDetailSeeder::class,
            UserSeeder::class,
            BookmarkSeeder::class,
            ReviewSeeder::class,
            TransactionSeeder::class,
            DetailSeeder::class,
        ]);
    }
}
