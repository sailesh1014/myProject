<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Helpers\AppHelper;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{

    protected  $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all();
    }


    public function store($input): object
    {
        return $this->model->create($input);
    }


    public function find($id, bool $failure = true)
    {
        if ($failure) {
            return $this->model->findOrFail($id);
        } else {
            return $this->model->find($id);
        }
    }

    public function update($input, $modelObj)
    {
        $modelObj->update($input);

        return $modelObj;
    }


    public function delete(Model $modelObj): ?bool
    {
        return $modelObj->delete();
    }


    public function offsetAndSort($query, $meta): array
    {
        $meta['recordsTotal'] =  $meta['recordsFiltered'] =  $query->count();
        $query->orderBy($meta['order'], $meta['dir']);

        if ($meta['length'] != '-1') {
            $query->offset($meta['start'])->limit($meta['length']);
        }

        $results = $query->get();

        return [
            'results' => $results,
            'meta' => $meta,
        ];
    }


}
