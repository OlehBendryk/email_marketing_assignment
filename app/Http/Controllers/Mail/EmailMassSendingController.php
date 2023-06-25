<?php

namespace App\Http\Controllers\Mail;


use App\Http\Requests\CreateEmailMassSendingRequest;
use App\Jobs\EmailMassSendingJob;
use App\Repositories\EmailMassSendingRepository;
use App\Repositories\EmailTemplateRepository;
use App\Repositories\GroupRepository;
use App\Services\EmailMassSendingService;
use Illuminate\Http\RedirectResponse;


class EmailMassSendingController extends BaseMailController
{
    protected EmailMassSendingService $massSendingService;
    protected EmailMassSendingRepository $emailMassSendingRepository;
    protected EmailTemplateRepository $emailTemplateRepository;
    protected GroupRepository $groupRepository;

    public function __construct(
        EmailMassSendingService $massSendingService,
        EmailMassSendingRepository $emailMassSendingRepository,
        EmailTemplateRepository $emailTemplateRepository,
        GroupRepository $groupRepository
    ) {
        parent::__construct();
        $this->massSendingService = $massSendingService;
        $this->emailMassSendingRepository = $emailMassSendingRepository;
        $this->emailTemplateRepository = $emailTemplateRepository;
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {
        $templates = $this->emailMassSendingRepository->getAllEmailTemplates();

        return view('admin.email_sending.index')
            ->with('templates', $templates);
    }

    public function create()
    {
        $emailTemplates = $this->emailTemplateRepository->getAllEmailTemplates();
        $recipients = $this->groupRepository->getAllGroups();

        return view('admin.email_sending.create')
            ->with('emailTemplates', $emailTemplates)
            ->with('recipients', $recipients);
    }

    public function store(CreateEmailMassSendingRequest $request): RedirectResponse
    {
        $emailSending = $this->massSendingService->create($request->all());

        $group = $emailSending->groups()->get()->first()->name;
        $title = $emailSending->email_templates()->get()->first()->title;

        if (!$request->get('send_to')){
            (new EmailMassSendingJob())->handle($emailSending->id);
        }

        return redirect()->route('email_mass_sending.index')
            ->with('success', "Email: $title has been sent to group: $group");
    }
}
