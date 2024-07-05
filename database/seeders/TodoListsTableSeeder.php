<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todolists = [
            [
                'user_id' => 1,
                'todo_id' => 1,
                'status' => 'dibuat',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 2,
                'status' => 'dibuat',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 2,
                'status' => 'proses',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 3,
                'status' => 'proses',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 1,
                'status' => 'selesai',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 3,
                'status' => 'dibuat',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 6,
                'status' => 'proses',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 8,
                'status' => 'selesai',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 10,
                'status' => 'selesai',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 7,
                'status' => 'dibuat',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 5,
                'status' => 'proses',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 5,
                'status' => 'selesai',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 4,
                'status' => 'dibuat',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 4,
                'status' => 'proses',
                'date_time' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'todo_id' => 7,
                'status' => 'proses',
                'date_time' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($todolists as $todolist) {
            \App\Models\TodoList::create($todolist);
        }
    }
}
