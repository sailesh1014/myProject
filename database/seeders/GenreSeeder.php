<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder {

    public function run()
    {
        Genre::upsert([
            ['name'       => 'Rock',
             'excerpt'    => 'Description about rock',
             'created_at' => now(),
             'updated_at' => now()
            ],
            ['name'       => 'Pop',
             'excerpt'    => 'Description about pop',
             'created_at' => now(),
             'updated_at' => now()
            ],
        ], ['name'], ['excerpt', 'updated_at']);
        Genre::factory(10)->create();
    }
}
