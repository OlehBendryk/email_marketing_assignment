<?php

namespace App\Console\Commands;

use App\Jobs\EmailMassSendingJob;
use App\Models\EmailMassSending;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckingEmailStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:email-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking sending email status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $query = EmailMassSending::query();
        $query->where('status','=', 0)->where('send_to', '<', Carbon::now());

        foreach ($query->cursor() as $emailSending){
            (new EmailMassSendingJob())->handle($emailSending->id);
        }
    }
}
