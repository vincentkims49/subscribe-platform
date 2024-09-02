<?php
namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendEmailJob;

class QueueEmailsForNewPost
{
    public function handle(PostCreated $event)
    {
        SendEmailJob::dispatch($event->post);
    }
}