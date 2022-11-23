<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(15)->create();

        $categories = \App\Models\Category::factory(15)->create();

        \App\Models\Post::factory(10)
            ->hasAttached($categories->random(3)->all())
            ->create();
    }
}
