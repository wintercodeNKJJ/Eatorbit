<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\Notice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\restaurants>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $mid = Manager::pluck('id')->toArray();
        $nid = Notice::pluck('id')->toArray();
        $pics = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25);
        return [
            'name' => $this->faker->firstName(),
            'location' => $this->faker->address(),
            'managers_id' => $this->faker->randomElement($mid), 
            'notices_id' => $this->faker->randomElement($nid),
            'profile' => $this->faker->randomElement($pics)
        ];
    }
}