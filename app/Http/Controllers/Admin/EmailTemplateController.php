<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\CreateEmailTemplateRequest;
use App\Repositories\EmailTemplateRepository;
use App\Services\EmailTemplateService;
use Illuminate\Http\RedirectResponse;


class EmailTemplateController extends BaseController
{
    private EmailTemplateService $emailTemplateService;
    private EmailTemplateRepository $emailTemplateRepository;

    public function __construct(
        EmailTemplateService $emailTemplateService,
        EmailTemplateRepository $emailTemplateRepository
    ) {
        parent::__construct();
        $this->emailTemplateService = $emailTemplateService;
        $this->emailTemplateRepository = $emailTemplateRepository;
    }

    public function index()
    {
        $templates = $this->emailTemplateRepository->getAllWithPagination();

        return view('admin.email_templates.index')
            ->with('templates', $templates);
    }

    public function create()
    {
        return view('admin.email_templates.create');
    }

    public function store(CreateEmailTemplateRequest $request): RedirectResponse
    {
        $template = $this->emailTemplateService->create($request->all());

        return redirect()
            ->route('email_template.index')
            ->with('success', "Template $template->title was created");
    }
}
