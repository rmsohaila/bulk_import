<?php

namespace Database\Seeders;

use App\Models\MasterDataFeed;
use Illuminate\Database\Seeder;

class MasterDataFeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterDataFeed::factory()
            ->count(20)
            ->create();
    }
}
