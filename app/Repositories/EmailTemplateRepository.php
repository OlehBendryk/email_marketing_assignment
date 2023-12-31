<?php

namespace App\Repositories;


use App\Models\EmailTemplate as Model;
use Illuminate\Support\Collection;


class EmailTemplateRepository extends CoreRepository
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
        $columns = ['id', 'title', 'subject', 'body'];

        return $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllEmailTemplates(): Collection
    {
        return $this->startConditions()->all()->pluck('title', 'id');
    }
}
