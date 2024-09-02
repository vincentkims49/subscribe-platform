<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::post('/posts', [PostController::class, 'store']);
Route::post('/subscriptions', [SubscriptionController::class, 'store']);