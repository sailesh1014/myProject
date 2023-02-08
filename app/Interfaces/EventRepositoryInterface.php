<?php
declare(strict_types=1);

namespace App\Interfaces;


interface EventRepositoryInterface {

    public function paginatedWithQuery($meta, $query = null );

}
