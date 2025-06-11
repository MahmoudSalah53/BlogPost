<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Health',
            'Travel',
            'Food',
            'Education',
            'Business',
            'Lifestyle',
            'Sports',
            'Science',
            'Entertainment'
        ];

        foreach ($categories as $name) {
            DB::table('categories')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}