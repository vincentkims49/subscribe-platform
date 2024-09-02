<?php

namespace App\Contracts;

use App\Models\Post;

interface EmailServiceInterface
{
    public function sendNewPostEmails(Post $post);
}

namespace App\Services;

use App\Contracts\EmailServiceInterface;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;

class EmailService implements EmailServiceInterface
{
    public function sendNewPostEmails(Post $post)
    {
        $subscribers = Subscription::where('website_id', $post->website_id)->get();

        foreach ($subscribers as $subscriber) {
            Mail::raw("New post: {$post->title}\n\n{$post->description}", function ($message) use ($subscriber, $post) {
                $message->to($subscriber->email)
                    ->subject("New post on {$post->website->name}");
            });
        }
    }
}