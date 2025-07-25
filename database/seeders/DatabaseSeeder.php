<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'author',
            'email' => 'author@test.com',
            'role' => 'author',
            'password' => Hash::make('12345678'),
        ]);


        $this->call([
            PostSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
        ]);
    }
}
