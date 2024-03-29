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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //Llamamos a los seeders
        $this->call([
            OrganizerSeeder::class,
            ParticipantSeeder::class,
            EventSeeder::class,
            UserSeeder::class,
            UserDetailsSeeder::class,
        ]);
    }
}
