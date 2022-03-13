<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $userEmail;

    /**
     * Create a new job instance.
     *
     * @param $data
     */
    public function __construct($data, $userEmail)
    {
        $this->data = $data;
        $this->userEmail = $userEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // foreach ($this->users as $user) {
        //     Mail::to($user->email)->send(new MailNotify($this->data));
        // }
        Mail::to($this->userEmail)->send(new MailNotify($this->data));
    }
}
