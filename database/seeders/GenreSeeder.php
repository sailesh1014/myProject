<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder {

    public function run()
    {
        Genre::factory(10)->create();
    }
}
