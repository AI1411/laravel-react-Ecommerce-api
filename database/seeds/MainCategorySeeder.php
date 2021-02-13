<?php

use Illuminate\Database\Seeder;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\MainCategory::class, 3)->create();
    }
}
