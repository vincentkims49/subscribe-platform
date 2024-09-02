<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
use App\Models\Post;
use Illuminate\Console\Command;

class SendEmailsCommand extends Command
{
    protected $signature = 'emails:send';
    protected $description = 'Send emails for new posts';

    public function handle()
    {
        $newPosts = Post::where('created_at', '>=', now()->subDay())->get();

        foreach ($newPosts as $post) {
            SendEmailJob::dispatch($post);
        }

        $this->info('Emails queued for sending.');
    }
}