<?php

namespace Database\Factories;

use App\Models\MasterDataFeed;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterDataFeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            MasterDataFeed::URL => $faker->url(),
            MasterDataFeed::FEED_ID => $faker->numberBetween(1, 20),
            MasterDataFeed::IS_DOWNLOADED => false,
            MasterDataFeed::IS_PARSED => false,
            MasterDataFeed::LAST_FEED_ACCESS => now()->toDateTimeString(),
            MasterDataFeed::CREATED_AT => now()->toDateTimeString(),
            MasterDataFeed::UPDATED_AT => now()->toDateTimeString(),
        ];
    }
}
