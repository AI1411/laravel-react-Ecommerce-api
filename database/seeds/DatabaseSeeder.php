<?php

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
            UserSeeder::class,
            MessageSeeder::class,
            MainCategorySeeder::class,
            CategorySeeder::class,
            CartSeeder::class,
            PurchaseHistorySeeder::class,
            FavoriteSeeder::class,
        ]);

    }
}
