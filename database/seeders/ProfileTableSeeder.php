<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'user_id' => 1,
            'date_of_birth' => date('Y-m-d H:i:s'),
            'gender' => 'Perempuan',
            'photo' => 'images/user-2.jpg',
        ]);
    }
}
