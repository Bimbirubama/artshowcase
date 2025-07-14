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
            [
                'name'  => 'Johannes Vermeer',
                'email' => 'vermeer@example.com',
                'bio'   => 'Seniman Belanda yang dikenal dengan lukisan Girl with a Pearl Earring.',
            ],
            [
                'name'  => 'Pablo Picasso',
                'email' => 'picasso@example.com',
                'bio'   => 'Seniman Spanyol yang terkenal dengan karya-karya kubisme dan lukisan Guernica.',
            ],
            [
                'name'  => 'Rembrandt van Rijn',
                'email' => 'rembrandt@example.com',
                'bio'   => 'Pelukis dan pencetak Belanda yang terkenal dengan lukisan The Night Watch.',
            ],
            [
                'name'  => 'Grant Wood',
                'email' => 'grantwood@example.com',
                'bio'   => 'Seniman Amerika yang dikenal dengan lukisan American Gothic.',
            ],
            [
                'name'  => 'Sandro Botticelli',
                'email' => 'botticelli@example.com',
                'bio'   => 'Pelukis Italia yang terkenal dengan lukisan The Birth of Venus.',
            ],
            [
                'name'  => 'Gustav Klimt',
                'email' => 'klimt@example.com',
                'bio'   => 'Seniman Austria yang dikenal dengan lukisan The Kiss.',
            ],
            [
                'name'  => 'Diego Velázquez',
                'email' => 'velazquez@example.com',
                'bio'   => 'Pelukis Spanyol yang terkenal dengan lukisan Las Meninas.',
            ],
            [
                'name'  => 'Hieronymus Bosch',
                'email' => 'bosch@example.com',
                'bio'   => 'Seniman Belanda yang dikenal dengan karya-karya surealis seperti The Garden of Earthly Delights.',
            ],
            [
                'name'  => 'James McNeill Whistler',
                'email' => 'whistler@example.com',
                'bio'   => 'Seniman Amerika yang terkenal dengan lukisan Whistler\'s Mother.',
            ],
        ]);
    }
}
