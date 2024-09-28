<?php

namespace App\Jobs;

use App\Mail\ProjectStatusUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendMailOnStatusChangeJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public $adminMail,
        public $adminName,
        public $projectName,
        public $userName,
        public $status
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->adminMail)->send(new ProjectStatusUpdated($this->adminName, $this->projectName, $this->status, $this->userName));
    }
}
