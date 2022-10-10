<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Category::factory(1)->create();
        Topic::factory(1)->create();
        User::factory()->create(
            [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make("password"),
            ]
        );
    }
}
