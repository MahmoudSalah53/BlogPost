<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run (): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => \Hash::make('12345678'),
        ]);
        $this->call([
            PostSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
        ]);
    }
}
