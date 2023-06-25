<?php

namespace App\Repositories;


use App\Models\Customer as Model;
use Illuminate\Support\Collection;


class CustomerRepository extends CoreRepository
{
    protected function getModel()
    {
        return Model::class;
    }

    public function getAllWithPagination(): mixed
    {
        $column = ['id', 'first_name', 'last_name', 'email', 'sex', 'birth_date'];

        return $this->startConditions()
            ->select($column)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }

    public function getById(int $id): mixed
    {
        return $this->startConditions()
            ->where('id', $id)
            ->first();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getFullName(): Collection
    {
        return $this->startConditions()
            ->all()
            ->pluck('full_name', 'id');
    }
}
