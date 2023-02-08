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

    public function __construct(private EventRepositoryInterface $eventRepository, private EventImageService $eventImageService) {}

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

    public function updateEvent(Collection $input,Model $event){
        $event->load('eventImages');
        $newEventImages = $input['images'] ?? [];
        $newEventImagesArr = array_map(function ($element){
            return $element->getClientOriginalName();
        },$newEventImages);
        $currentEventImagesArr = $event->eventImages->map(function ($el){
                return  basename($el->image);
        })->toArray();
        $toUploadImages = array_diff($newEventImagesArr,$currentEventImagesArr);
        $toRemoveImages = array_intersect($newEventImagesArr,$currentEventImagesArr);
        //foreach ($toRemoveImages as $oldImage){
        //    @unlink(public_path('storage/uploads/' . $genre->image));
        //}
        if(isset($input['image'])){
            $symbol = $input['image'];
            @unlink(public_path('storage/uploads/' . $genre->image));
            $imageName = AppHelper::renameImageFileUpload($symbol);
            $pathPrefix = AppHelper::prepareFileStoragePath();
            $symbol->storeAs("public/uploads/$pathPrefix", $imageName);
            $input['symbol'] = "{$pathPrefix}/{$imageName}";
        }
        //$this->genreRepository->update($input, $genre);
    }
}
