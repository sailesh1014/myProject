<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Interfaces\EventImageRepositoryInterface;
use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventImageService {

    public function __construct(private EventImageRepositoryInterface $eventImageRepository) {}

    public function uploadImage($event, $image): void
    {
        $pathPrefix = AppHelper::prepareFileStoragePath();
        $imageName = AppHelper::renameImageFileUpload($image);
        $image->storeAs("public/uploads/$pathPrefix", $imageName);
        $this->eventImageRepository->store(['event_id' => $event->id, 'image' => $imageName]);
    }

}
