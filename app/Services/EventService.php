<?php
declare(strict_types=1);

namespace App\Services;

use App\Constants\UserRole;
use App\Helpers\AppHelper;
use App\Http\Resources\EventResource;
use App\Http\Resources\UserResource;
use App\Interfaces\EventRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EventService {

    public function __construct(protected EventRepositoryInterface $eventRepository, protected EventMediaService $eventMediaService, protected  UserRepositoryInterface $userRepository) {}

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
        $thumbnailName = AppHelper::renameMediaFileUpload($thumbnail);
        $thumbnail->storeAs("public/uploads/$pathPrefix", $thumbnailName);
        $input['thumbnail'] = "{$pathPrefix}/{$thumbnailName}";
        $event = $this->eventRepository->store($input->only(['title', 'excerpt', 'description', 'thumbnail', 'status', 'location', 'event_date', 'fee' , 'club_id', 'preference'])->toArray());

        /* image store start*/
        if(isset($input['media'])){
                $this->eventMediaService->uploadMedia($event,$input['media']);
        }
        return $event;
    }

    public function updateEvent(Collection $input,Model $event){
        $event->load('eventMedia');
        $newEventMedia = $input['media'] ?? [];
        $newEventMediaArr = array_reduce($newEventMedia,function ($carry,$element){
            $carry[$element->getClientOriginalName()] = $element;
            return $carry;
        },[]);
        /*  'image.png' => '2023/12/image.png'  */
        $currentEventMediaArr = $event->eventMedia->reduce(function ($carry,$element){
                $carry[basename($element->media)] = $element->media;
                return  $carry;
        },[]);


        $currentEventMediaArrKeys = array_keys($currentEventMediaArr);
        $newEventMediaArrKeys = array_keys($newEventMediaArr);
        $toUploadMediaKeys = array_diff($newEventMediaArrKeys,$currentEventMediaArrKeys);
        $toRemoveMediaKeys = array_diff($currentEventMediaArrKeys,$newEventMediaArrKeys);

        $toUploadMedia = array_intersect_key($newEventMediaArr,array_flip($toUploadMediaKeys));
        $toRemoveMedia = array_intersect_key($currentEventMediaArr,array_flip($toRemoveMediaKeys));
        $this->eventMediaService->uploadMedia($event,$toUploadMedia);
        $this->eventMediaService->removeMedia($event->id,$toRemoveMedia);

        if(isset($input['thumbnail'])){
            $thumbnail = $input['thumbnail'];
            @unlink(public_path('storage/uploads/' . $event->thumbnail));
            $imageName = AppHelper::renameMediaFileUpload($thumbnail);
            $pathPrefix = AppHelper::prepareFileStoragePath();
            $thumbnail->storeAs("public/uploads/$pathPrefix", $imageName);
            $input['thumbnail'] = "{$pathPrefix}/{$imageName}";
        }
        $this->eventRepository->update($input->toArray(), $event);
    }

    public function deleteEvent(Event $event): void
    {
        $event->load('eventMedia');
        @unlink(public_path('storage/uploads/' . $event->thumbnail));
        $eventMedia = $event->eventMedia->pluck('media')->toArray();
        $this->eventMediaService->removeMedia($event->id,$eventMedia);
        $this->eventRepository->delete($event);
    }
    public function getEventByKey(string|array $status)
    {
        return $this->eventRepository->getEventByKey($status);
    }
    public function getFavourableArtist(Event $event)
    {
        $artistPreference = $event->preference;
        $roleService = resolve(RoleService::class);
        $artistRoleId = $roleService->getRoleByKey(UserRole::ARTIST)->id;
        $condition = ['role_id' => $artistRoleId, 'preference' => $artistPreference];
        return $this->userRepository->where($condition);
    }



}
