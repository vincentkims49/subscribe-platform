<?php

namespace App\Http\Controller;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = Post::create($request->all());

        return response()->json($post, 201);
    }
}