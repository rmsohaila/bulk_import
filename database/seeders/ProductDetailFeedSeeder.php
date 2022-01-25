<?php

namespace Database\Seeders;

use App\Models\ProductDetailFeed;
use Illuminate\Database\Seeder;

class ProductDetailFeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductDetailFeed::factory()
            ->count(10)
            ->create();
    }
}
