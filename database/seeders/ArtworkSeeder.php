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
            [
                'title' => 'Girl with a Pearl Earring',
                'description' => 'Lukisan karya Johannes Vermeer yang menampilkan seorang gadis dengan anting mutiara yang terkenal.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/d/d7/Meisje_met_de_parel.jpg',
                'creator_id' => 5,
                'category_id' => 1,
            ],
            [
                'title' => 'Guernica',
                'description' => 'Lukisan karya Pablo Picasso yang menggambarkan penderitaan akibat perang di kota Guernica, Spanyol.',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/7/74/PicassoGuernica.jpg',
                'creator_id' => 6,
                'category_id' => 2,
            ],
            [
                'title' => 'The Night Watch',
                'description' => 'Lukisan karya Rembrandt yang menggambarkan sekelompok penjaga kota dalam suasana dramatis.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Rembrandt_-_De_Nachtwacht_-_Google_Art_Project.jpg',
                'creator_id' => 7,
                'category_id' => 3,
            ],
            [
                'title' => 'American Gothic',
                'description' => 'Lukisan karya Grant Wood yang menampilkan pasangan petani dengan latar rumah bergaya Gotik.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Grant_Wood_-_American_Gothic_-_Google_Art_Project.jpg',
                'creator_id' => 8,
                'category_id' => 4,
            ],
            [
                'title' => 'The Birth of Venus',
                'description' => 'Lukisan karya Sandro Botticelli yang menggambarkan kelahiran Dewi Venus dari laut.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1c/Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg',
                'creator_id' => 9,
                'category_id' => 1,
            ],
            [
                'title' => 'The Kiss',
                'description' => 'Lukisan karya Gustav Klimt yang menampilkan pasangan yang berciuman dengan latar emas yang kaya.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/7e/Gustav_Klimt_016.jpg',
                'creator_id' => 10,
                'category_id' => 2,
            ],
            [
                'title' => 'Las Meninas',
                'description' => 'Lukisan karya Diego Velázquez yang menggambarkan adegan di istana Spanyol dengan detail yang rumit.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Las_Meninas_01.jpg',
                'creator_id' => 11,
                'category_id' => 3,
            ],
            [
                'title' => 'The Garden of Earthly Delights',
                'description' => 'Triptych karya Hieronymus Bosch yang menggambarkan surga, bumi, dan neraka dengan detail fantastis.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/0/0d/El_jard%C3%ADn_de_las_Delicias_El_Bosco.jpg',
                'creator_id' => 12,
                'category_id' => 4,
            ],
            [
                'title' => 'Whistler\'s Mother',
                'description' => 'Lukisan karya James McNeill Whistler yang menampilkan ibu seniman dalam pose duduk yang tenang.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1a/Whistlers_Mother_high_res.jpg',
                'creator_id' => 13,
                'category_id' => 1,
            ],
        ];

        foreach ($artworks as $artwork) {
            Artwork::create($artwork);
        }
    }
}
