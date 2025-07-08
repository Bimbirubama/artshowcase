<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Creator;

class CreatorSeeder extends Seeder
{
    public function run(): void
    {
        Creator::insert([
            [
                'name'  => 'Leonardo da Vinci',
                'email' => 'leonardo@example.com',
                'bio'   => 'Seorang seniman, ilmuwan, dan penemu asal Italia yang dikenal karena lukisan Mona Lisa dan The Last Supper.',
            ],
            [
                'name'  => 'Vincent van Gogh',
                'email' => 'vangogh@example.com',
                'bio'   => 'Pelukis Belanda yang terkenal karena gaya post-impresionisme dan karya seperti The Starry Night.',
            ],
            [
                'name'  => 'Salvador Dalí',
                'email' => 'dali@example.com',
                'bio'   => 'Seniman surealis asal Spanyol yang dikenal karena lukisan The Persistence of Memory.',
            ],
            [
                'name'  => 'Edvard Munch',
                'email' => 'munch@example.com',
                'bio'   => 'Seniman Norwegia yang terkenal karena karya ikoniknya The Scream.',
            ],
        ]);
    }
}
