<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Interfaces\EventMediaRepositoryInterface;
use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventMediaService {

    public function __construct(private EventMediaRepositoryInterface $eventMediaRepository) {}


    public function getMediaType($file):string{
        $allowed_video_types = ['mp4', 'mkv'];
        if (in_array($file->getClientOriginalExtension(), $allowed_video_types)) {
            return  "Video";
        }
        return "image";
    }

    public function uploadMedia($event, object|array $media): void
    {
        $media = is_array($media) ? $media : [$media];
        $pathPrefix = AppHelper::prepareFileStoragePath();
        foreach ($media as $element){
            $mediaType = self::getMediaType($element);
            $imageName = AppHelper::renameMediaFileUpload($element);
            $element->storeAs("public/uploads/$pathPrefix", $imageName);
            $inputArr = ['event_id' => $event->id, 'media' => "{$pathPrefix}/{$imageName}", 'type' => $mediaType];
            $this->eventMediaRepository->store($inputArr);
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
