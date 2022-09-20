<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;

class SendNotifyMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $entry;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($entry)
    {
        $this->entry = $entry;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->entry->user->email)
        ->send(new NotifyMail($this->entry));
    }
}
