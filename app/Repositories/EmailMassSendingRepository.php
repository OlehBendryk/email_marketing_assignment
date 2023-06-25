<?php

namespace App\Repositories;


use App\Models\EmailMassSending as Model;
use Illuminate\Database\Eloquent\Collection;


class EmailMassSendingRepository extends CoreRepository
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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllEmailTemplates(): Collection
    {
        return $this->startConditions()->all();
    }
}
