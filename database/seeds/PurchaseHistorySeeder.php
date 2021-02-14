<?php

use Illuminate\Database\Seeder;

class PurchaseHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\PurchaseHistory::class, 30)->create();
    }
}
