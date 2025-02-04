<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ip;
use App\Models\Malware;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Ip::factory(10)->create();
        Malware::factory(10)->create();
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
