<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\EventRepositoryInterface;

class EventService {

    public function __construct(private EventRepositoryInterface $genreRepository) {}

}
