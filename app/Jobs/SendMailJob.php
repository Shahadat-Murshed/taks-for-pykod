<?php

namespace App\Jobs;

use App\Mail\ProjectCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public $adminMail,
        public $adminName,
        public $projectName,
        public $userName
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->adminMail)->send(new ProjectCreated($this->adminName, $this->projectName, $this->userName));
    }
}
