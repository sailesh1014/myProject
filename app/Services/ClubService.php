<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\ClubRepositoryInterface;

class ClubService {

    public function __construct(private ClubRepositoryInterface $clubRepository) {}

    public function createNewClub(array $input): object
    {
        return $this->clubRepository->store($input);
    }

    public function updateOrCreate(array $conditionArr, array $input,){
        return $this->clubRepository->updateOrCreate($conditionArr, $input);

    }

    public function delete($club): void
    {
        $modelObj = $club;
        if(is_string($club)){
            $modelObj = $this->clubRepository->find($club);
        }
        $this->clubRepository->delete($modelObj);
    }

}
