<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Clear the table before seeding
        // DB::table('categories')->truncate();

        // Insert sample data
        DB::table('categories')->insert([
            [
                'name' => 'Technology',
                'slug' => Str::slug('Technology'),
                'description' => 'All about technology and innovation.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health & Fitness',
                'slug' => Str::slug('Health & Fitness'),
                'description' => 'Tips and advice for a healthy lifestyle.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Travel',
                'slug' => Str::slug('Travel'),
                'description' => 'Explore the world and discover new places.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Food & Cooking',
                'slug' => Str::slug('Food & Cooking'),
                'description' => 'Delicious recipes and cooking techniques.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Education',
                'slug' => Str::slug('Education'),
                'description' => 'Learn new skills and expand your knowledge.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
