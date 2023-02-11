<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Http\Resources\EventResource;
use App\Http\Resources\UserResource;
use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EventService {

    public function __construct(private EventRepositoryInterface $eventRepository, private EventMediaService $eventImageService) {}

    public function paginateWithQuery(array $input): array
    {
        $columns = [
            'title',
            'thumbnail',
            'status',
            'event_date',
            'created_at',
            'action',
        ];
        $meta = AppHelper::defaultTableInput($input, $columns);
        $resp = $this->eventRepository->paginatedWithQuery($meta);
        return [
            'data' => EventResource::collection($resp['results']),
            'meta' => $resp['meta'],
        ];

    }

    public function organizeEvent(Collection $input): object
    {
        $input['club_id'] = $input['club_id'] ?? auth()->user()->club->id;
        /* thumbnail store start */
        $thumbnail = $input['thumbnail'];
        $pathPrefix = AppHelper::prepareFileStoragePath();
        $thumbnailName = AppHelper::renameImageFileUpload($thumbnail);
        $thumbnail->storeAs("public/uploads/$pathPrefix", $thumbnailName);
        $input['thumbnail'] = "{$pathPrefix}/{$thumbnailName}";
        $event = $this->eventRepository->store($input->only(['title', 'excerpt', 'description', 'thumbnail', 'status', 'location', 'event_date', 'fee' , 'club_id'])->toArray());

        /* image store start*/
        if(isset($input['images'])){
            $images = $input['images'];
            foreach ($images as $image){
                $this->eventImageService->uploadImage($event,$image);
            }
        }
        return $event;
    }

    public function updateEvent(Collection $input,Model $event){
        $event->load('eventMedia');
        $newEventImages = $input['images'] ?? [];
        $newEventImagesArr = array_map(function ($element){
            return $element->getClientOriginalName();
        },$newEventImages);
        $currentEventImagesArr = $event->eventMedia->map(function ($el){
                return  basename($el->media);
        })->toArray();
        $toUploadImages = array_diff($newEventImagesArr,$currentEventImagesArr);
        $toRemoveImages = array_intersect($newEventImagesArr,$currentEventImagesArr);
        //foreach ($toRemoveImages as $oldImage){
        //    @unlink(public_path('storage/uploads/' . $genre->image));
        //}
        if(isset($input['thumbnail'])){
            $thumbnail = $input['thumbnail'];
            @unlink(public_path('storage/uploads/' . $event->thumbnail));
            $imageName = AppHelper::renameImageFileUpload($thumbnail);
            $pathPrefix = AppHelper::prepareFileStoragePath();
            $thumbnail->storeAs("public/uploads/$pathPrefix", $imageName);
            $input['thumbnail'] = "{$pathPrefix}/{$imageName}";
        }
        $this->eventRepository->update($input->toArray(), $event);
    }

    public function deleteEvent(Event $event){
        $event->load('eventMedia');
        @unlink(public_path('storage/uploads/' . $event->thumbnail));
        $eventMedia = $event->eventMedia;
        foreach ($eventMedia as $media){
            @unlink(public_path('storage/uploads/' . $media->file));
        }
        $this->eventRepository->delete($event);
    }
}
