<?php

namespace App\Jobs;

use App\TextMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Pheanstalk\Pheanstalk;

class SendText implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $message;

    public function __construct(TextMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $p = new Pheanstalk('127.0.0.1');
        $p->useTube('testtube')
          ->put($this->message->send());
        $job = $pheanstalk->watch('testtube')
                          ->reserve();
        $pheanstalk->delete($job);
    }
}
