<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{

    public function run()
    {
        Club::all()->each(function ($club){
            Event::factory(1)->create([
                'club_id'       =>      $club->id,
            ]);
        });
    }
}
