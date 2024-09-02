<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Website extends Model
{
    protected $fillable = ['name', 'url'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public static function getAll()
    {
        return Cache::remember('all_websites', 3600, function () {
            return self::all();
        });
    }

    public static function getById($id)
    {
        return Cache::remember("website_{$id}", 3600, function () use ($id) {
            return self::findOrFail($id);
        });
    }
}