<?php
declare(strict_types=1);

namespace App\Interfaces;


interface EventMediaRepositoryInterface {

    public function removeMediaByName(string|int $eventId, array|string $media);

}
