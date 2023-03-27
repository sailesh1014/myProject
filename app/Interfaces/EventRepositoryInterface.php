<?php
declare(strict_types=1);

namespace App\Interfaces;


interface EventRepositoryInterface {
     function getEventByKey(string|array $status);
    public function paginatedWithQuery($meta, $query = null );


}
