<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Lukisan Renaisans'],
            ['name' => 'Ekspresionisme'],
            ['name' => 'Surealisme'],
        ]);
    }
}
