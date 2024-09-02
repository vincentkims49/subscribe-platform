<?php

namespace App\Http\Controller;

use App\Models\Subscription;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'email' => 'required|email|max:255',
        ]);

        $subscription = Subscription::create($request->all());

        return response()->json($subscription, 201);
    }
}