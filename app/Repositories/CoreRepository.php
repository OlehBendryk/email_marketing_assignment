<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;


abstract class CoreRepository
{
    protected mixed $model;

    public function __construct()
    {
        return $this->model = app($this->getModel());
    }

    abstract protected function getModel();

    /**
     * @return mixed
     */
    protected function startConditions(): mixed
    {
        return clone $this->model;
    }

}
