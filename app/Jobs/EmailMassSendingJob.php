<?php

namespace App\Jobs;


use App\Models\EmailMassSending;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class EmailMassSendingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function handle(int $id): void
    {
        $emailSending = EmailMassSending::findOrFail($id);
        $group = $emailSending->groups()->get()->first();
        $emailTemplate = $emailSending->email_templates()->get()->first();

        $recipients = $group->customers()->get();

        foreach ($recipients as $recipient) {
            Mail::to($recipient->email)->queue(new SendMail($emailTemplate, $recipient));
        }

        $emailSending->status = true;
        $emailSending->save();
    }
}
