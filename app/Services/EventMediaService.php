<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Interfaces\EventMediaRepositoryInterface;
use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventMediaService {

    public function __construct(private EventMediaRepositoryInterface $eventMediaRepository) {}

    public function uploadImage($event, $image): void
    {
        $pathPrefix = AppHelper::prepareFileStoragePath();
        $imageName = AppHelper::renameImageFileUpload($image);
        $image->storeAs("public/uploads/$pathPrefix", $imageName);
        $this->eventMediaRepository->store(['event_id' => $event->id, 'media' => "{$pathPrefix}/{$imageName}"]);
    }

}
