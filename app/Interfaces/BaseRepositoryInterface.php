<?php
declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all();

    public function store($input);

    public function find($id, bool $failure = true);

    public function update($input, $modelObj);

    public function firstOrCreate(array $condition, array $data);

    public function delete(Model $modelObj): ?bool;

    public function where(array $condition, bool $single = false);


}
