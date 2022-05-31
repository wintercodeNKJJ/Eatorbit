<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\managers>
 */
class ManagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pass = ['0Jordan.','1Elvira.','2Derliche.','3Mahelle.'];
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'profilePicture' => '#',
            'password' => $this->faker->randomElement($pass), // password
            'remember_token' => Str::random(10),
        ];
    }
}