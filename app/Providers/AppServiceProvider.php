<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Subscription;



class AppServiceProvider extends ServiceProvider
{
    protected $listen = [
        PostCreated::class => [
            QueueEmailsForNewPost::class,
        ],
    ];
    
    public function boot()
    {
        Schema::defaultStringLength(191);
    
        if (!class_exists(\App\Models\Subscription::class)) {
            dd('Subscription model does not exist.');
        }
    
        Subscription::creating(function ($subscription) {
            $existingSubscription = Subscription::where('website_id', $subscription->website_id)
                ->where('email', $subscription->email)
                ->first();
        
            if ($existingSubscription) {
                return false; 
            }
        });
    }
    
}
