<?php

namespace App\Services;


use App\Models\EmailMassSending;
use App\Models\EmailTemplate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;


class EmailMassSendingService
{
    protected EmailMassSending $emailMassSending;
    protected EmailTemplate $emailTemplate;

    /**
     */
    public function __construct(
        EmailMassSending $emailMassSending,
        EmailTemplate $emailTemplate
    ) {
        $this->emailMassSending = $emailMassSending;
        $this->emailTemplate = $emailTemplate;
    }

    public function create(array $data): EmailMassSending
    {
        $this->emailMassSending->email_template_id = $data['email_template_id'];
        $this->emailMassSending->group_id = $data['group_id'];
        $this->emailMassSending->send_to = $data['send_to'];

        $this->emailMassSending->save();

        return $this->emailMassSending;
    }

    /**
     * @throws EmailSendingException
     */
    function sendEmail(string $subject, string $body, string $email): RedirectResponse
    {
        return redirect()
            ->back()
            ->with('success', 'Mass emails has been dispatched succesfully.');
    }
}
