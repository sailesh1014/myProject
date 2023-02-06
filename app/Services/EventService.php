<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Interfaces\EventRepositoryInterface;
use Illuminate\Support\Collection;

class EventService {

    public function __construct(private EventRepositoryInterface $eventRepository, private EventImageService $eventImageService) {}

    public function organizeEvent(Collection $input): object
    {
        $input['user_id'] = auth()->user()->id;
        /* thumbnail store start */
        $thumbnail = $input['thumbnail'];
        $pathPrefix = AppHelper::prepareFileStoragePath();
        $thumbnailName = AppHelper::renameImageFileUpload($thumbnail);
        $thumbnail->storeAs("public/uploads/$pathPrefix", $thumbnailName);
        $input['thumbnail'] = "{$pathPrefix}/{$thumbnailName}";
        $event = $this->eventRepository->store($input->only(['title', 'excerpt', 'description', 'thumbnail', 'status', 'location', 'event_date', 'fee' , 'user_id'])->toArray());

        /* image store start*/
        if(isset($input['images'])){
            $images = $input['images'];
            foreach ($images as $image){
                $this->eventImageService->uploadImage($event,$image);
            }
        }
        return $event;
    }

}
