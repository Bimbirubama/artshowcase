<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    // //    $this->call([
    // //     CategorySeeder::class,
    // //     CreatorSeeder::class,
    // //     ArtworkSeeder::class, // jalankan artwork terakhir agar relasi tidak error
    // ])
    $this->call(AdminSeeder::class);
    }
}
