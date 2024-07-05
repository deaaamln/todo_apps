<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todos = [
            [
                'title' => 'Todo 1',
                'description' => 'Description 1',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 2',
                'description' => 'Description 2',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 3',
                'description' => 'Description 3',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 4',
                'description' => 'Description 4',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 5',
                'description' => 'Description 5',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 6',
                'description' => 'Description 6',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 7',
                'description' => 'Description 7',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 8',
                'description' => 'Description 8',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 9',
                'description' => 'Description 9',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
            [
                'title' => 'Todo 10',
                'description' => 'Description 10',
                'user_id' => 1,
                'todo_category_id' => 1,
            ],
        ];

        foreach ($todos as $todo) {
            \App\Models\Todo::create($todo);
        }
    }
}
