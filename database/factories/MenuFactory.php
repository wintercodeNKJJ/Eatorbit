<?php

namespace Database\Factories;

use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\menus>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $meid = Meal::pluck('id')->toArray();
        $resid = Restaurant::pluck('id')->toArray();
        return [
            'meals_id' => $this->faker->randomElement($meid),
            'restaurants_id' => $this->faker->randomElement($resid),
            'id' => $this->faker->unique()->randomNumber(4), 
            'price' => $this->faker->randomNumber(4),
        ];
    }

}