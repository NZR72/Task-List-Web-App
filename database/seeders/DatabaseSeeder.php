<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // if(User::count()<20) {
        //     User::factory(20 - User::count())->create();
        // }
        // if(Task::count()<20) {
        //     Task::factory(20 - Task::count())->create();
        // }
        User::factory(20)->create();
        Task::factory(20)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
