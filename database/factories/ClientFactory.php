<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\clients>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pass = ['0Jordan.','1Elvira.','2Derliche.','3Mahelle.'];
        $pics = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25);
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'profilePicture' => $this->faker->randomElement($pics),
            'password' => Hash::make($this->faker->randomElement($pass)), // password
            'remember_token' => Str::random(10),
        ];
    }
}