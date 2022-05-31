<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meals>
 */
class ReserveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $mid = Restaurant::pluck('id')->toArray();
        $nid = Client::pluck('id')->toArray();
        return [
            'restaurants_id' => $this->faker->randomElement($mid), 
            'clients_id' => $this->faker->randomElement($nid),
            'Targetdate' => $this->faker->date(),
            'Canceldate' => $this->faker->date(),
            'numOfSites' => $this->faker->randomNumber(2),
            'transactionID' => $this->faker->randomElement(['1123433','986456','0000087']),
            'status' => $this->faker->randomElement(['initiated','good','complited']),
            'cost' => $this->faker->randomNumber(4)
        ];
    }
}