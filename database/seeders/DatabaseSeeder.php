<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(50)->create();
        \App\Models\Plant::factory(20)->create();
        \App\Models\Item::factory(20)->create();
        \App\Models\Stock::factory(10)->create();
        \App\Models\materi1::factory(10)->create();
        \App\Models\materi2::factory(10)->create();
        \App\Models\materi3::factory(10)->create();

        Category::create([
            'name' => 'Programming'
        ]);
        Category::create([
            'name' => 'Web Design'
        ]);
        Category::create([
            'name' => 'Personal'
        ]);
    }
}
