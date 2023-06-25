<?php

namespace App\Services;


use App\Models\Group;
use App\Repositories\GroupRepository;
use Illuminate\Support\Facades\DB;


class GroupService
{
    protected Group $model;

    /**
     * @param  \App\Models\Group  $group
     */
    public function __construct(Group $group)
    {
        $this->model = $group;
    }

    /**
     * @param  array  $data
     *
     * @return \App\Models\Group
     */
    public function create(array $data): Group
    {
        return DB::transaction(function () use ($data) {
            $this->model->name = $data['name'];
            $this->model->save();

            $this->model->customers()->attach($data['customers']);

            return $this->model;
        });
    }

    /**
     * @param  array  $data
     * @param  int  $id
     *
     * @return mixed
     */
    public function update(array $data, int $id): mixed
    {
        $group = (new GroupRepository())->getById($id);

        return DB::transaction(function () use ($data, $group) {
            $group->name = $data['name'];
            $group->update();

            $group->customers()->sync($data['customers']);

            return $group;
        });
    }

    /**
     * @param  int  $id
     *
     * @return mixed
     */
    public function delete(int $id): mixed
    {
        $group = (new GroupRepository())->getById($id);
        $customers = (new GroupRepository())->getCustomersForGroup($id);

        return DB::transaction(function () use ($group, $customers) {
            $group->delete();

            $group->customers()->detach($customers);

            return $group;
        });
    }
}
