<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artwork;

class ArtworkSeeder extends Seeder
{
    public function run(): void
    {
        $artworks = [
            [
                'title' => 'Mona Lisa',
                'description' => 'Mona Lisa adalah lukisan terkenal karya Leonardo da Vinci dengan ekspresi wajah misterius. Disimpan di Museum Louvre, Paris.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/Mona_Lisa.jpg',
                'creator_id' => 1,
                'category_id' => 1,
            ],
            [
                'title' => 'The Starry Night',
                'description' => 'Lukisan ekspresif oleh Vincent van Gogh yang menggambarkan langit malam yang berputar-putar di atas kota Saint-Rémy.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg',
                'creator_id' => 2,
                'category_id' => 2,
            ],
            [
                'title' => 'The Persistence of Memory',
                'description' => 'Karya Salvador Dalí yang terkenal dengan jam-jam meleleh, mencerminkan konsep waktu yang surreal.',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/d/dd/The_Persistence_of_Memory.jpg',
                'creator_id' => 3,
                'category_id' => 3,
            ],
            [
                'title' => 'The Scream',
                'description' => 'Karya ikonik Edvard Munch yang menunjukkan sosok yang berteriak dalam suasana emosional dan langit berwarna cerah.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f4/The_Scream.jpg',
                'creator_id' => 4,
                'category_id' => 4,
            ],
        ];

        foreach ($artworks as $artwork) {
            Artwork::create($artwork);
        }
    }
}
