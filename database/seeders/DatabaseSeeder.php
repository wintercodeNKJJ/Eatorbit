<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Client::factory(10)->create();
        // \App\Models\Manager::factory(10)->create();
        // \App\Models\Notice::factory(10)->create();
        // \App\Models\Meal::factory(100)->create();
        //\App\Models\Restaurant::factory(40)->create();
        //\App\Models\Menu::factory(400)->create();
        // \App\Models\Command::factory(400)->create();
        \App\Models\Reserve::factory(400)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}