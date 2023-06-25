<?php

namespace App\Services;


use App\Models\EmailTemplate;


class EmailTemplateService
{
    protected EmailTemplate $model;

    /**
     * @param  \App\Models\EmailTemplate  $emailTemplate
     */
    public function __construct(EmailTemplate $emailTemplate)
    {
        $this->model = $emailTemplate;
    }

    /**
     * @param  array  $data
     *
     * @return \App\Models\EmailTemplate
     */
    public function create(array $data): EmailTemplate
    {
        $template = $this->model;

        $template->title = $data['title'];
        $template->subject = $data['subject'];
        $template->body = $data['body'];

        $template->save();

        return $template;
    }

    /**
     * @param  array  $data
     * @param  int  $id
     *
     * @return mixed
     */
    public function update(array $data, int $id): mixed
    {
        //
    }

    /**
     * @param  int  $id
     *
     * @return mixed
     */
    public function delete(int $id): mixed
    {
        //
    }
}
