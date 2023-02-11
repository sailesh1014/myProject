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

}
