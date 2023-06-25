<?php

namespace App\Repositories;


use App\Models\Group as Model;
use Illuminate\Database\Eloquent\Collection;


class GroupRepository extends CoreRepository
{
    protected function getModel()
    {
        return Model::class;
    }

    /**
     * @return mixed
     */
    public function getAllWithPagination(): mixed
    {
        $columns = ['id', 'name'];

        return $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }

    /**
     * @param  int  $id
     *
     * @return mixed
     */
    public function getById(int $id): mixed
    {
        return $this->startConditions()
            ->where('id', $id)
            ->first();
    }

    /**
     * @param  int  $id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCustomersForGroup(int $id): Collection
    {
        return $this->getById($id)->customers()->where('group_id', $id)->get();
    }

    /**
     * @return mixed
     */
    public function getAllGroups(): mixed
    {
        return $this->startConditions()->all()->pluck('name', 'id');
    }
}
