<?php

namespace Database\Factories;

use App\Models\ProductDetailFeed;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDetailFeedFactory extends Factory
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
            ProductDetailFeed::FEED_ID => $faker->numberBetween(1, 20),
            ProductDetailFeed::KATEGORINAVN => $faker->word(),
            ProductDetailFeed::FORHANDLER => $faker->word(),
            ProductDetailFeed::BRAND => $faker->word(),
            ProductDetailFeed::PRODUKTNAVN => $faker->word(),
            ProductDetailFeed::PRODUKTID => $faker->numberBetween(1, 1000),
            ProductDetailFeed::EAN => $faker->buildingNumber(),
            ProductDetailFeed::BESKRIVELSE => $faker->sentence(10),
            ProductDetailFeed::NYPRIS => $faker->randomFloat(2, 1, 100),
            ProductDetailFeed::GLPRIS => $faker->randomFloat(2, 1, 100),
            ProductDetailFeed::LAGERANTAL => $faker->randomLetter(),
            ProductDetailFeed::LEVERINGSTID => $faker->time(),
            ProductDetailFeed::BILLEDURL => $faker->url(),
            ProductDetailFeed::VAREURL => $faker->url(),
            ProductDetailFeed::FRAGTOMK => $faker->randomFloat(2, 1, 10),
        ];
    }
}
