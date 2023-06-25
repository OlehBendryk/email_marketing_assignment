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
