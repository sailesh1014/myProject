<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Interfaces\EventMediaRepositoryInterface;
use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventMediaService {

    public function __construct(private EventMediaRepositoryInterface $eventMediaRepository) {}

    public function uploadMedia($event, object|array $media): void
    {
        $media = is_array($media) ? $media : [$media];
        $pathPrefix = AppHelper::prepareFileStoragePath();
        foreach ($media as $element){
            $imageName = AppHelper::renameImageFileUpload($element);
            $element->storeAs("public/uploads/$pathPrefix", $imageName);
            $this->eventMediaRepository->store(['event_id' => $event->id, 'media' => "{$pathPrefix}/{$imageName}"]);
        }
    }

    public function removeMedia(string|int $eventId,string|array $media): void {
        $this->eventMediaRepository->removeMediaByName($eventId,$media);
        $media = is_array($media) ? $media : [$media];
        foreach ($media as $element){
            @unlink(public_path('storage/uploads/' . $element));
        }
    }

}
