<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.ru',
            'password' => bcrypt('admin')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.ru',
            'password' => bcrypt('test')
        ]);
    }
}
