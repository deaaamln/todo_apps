<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Home',
                'user_id' => 1,
            ],
            [
                'name' => 'Work',
                'user_id' => 1,
            ],
            [
                'name' => 'HTML5',
                'user_id' => 1,
            ],
            [
                'name' => 'CSS3',
                'user_id' => 1,
            ],
            [
                'name' => 'JavaScript',
                'user_id' => 1,
            ],
            [
                'name' => 'Python',
                'user_id' => 1,
            ],
            [
                'name' => 'Laravel',
                'user_id' => 1,
            ],
            [
                'name' => 'React Native',
                'user_id' => 1,
            ],
            [
                'name' => 'Flutter',
                'user_id' => 1,
            ],
            [
                'name' => 'MySQL',
                'user_id' => 1,
            ],
            [
                'name' => 'MongoDB',
                'user_id' => 1,
            ],
            [
                'name' => 'Twitter',
                'user_id' => 1,
            ],
            [
                'name' => 'Bootstrap',
                'user_id' => 1,
            ],
            [
                'name' => 'Tailwind',
                'user_id' => 1,
            ],
            [
                'name' => 'Kotlin',
                'user_id' => 1,
            ],
            [
                'name' => 'Dart',
                'user_id' => 1,
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\TodoCategory::create($category);
        }
    }
}
