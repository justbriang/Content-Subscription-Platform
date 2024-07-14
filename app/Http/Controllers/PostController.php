<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Mail\PostNotificationMail;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $posts = Cache::remember('posts', 60, function () {
            return Post::all();
        });

        return response()->json($posts);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // app/Http/Controllers/PostController.php
    /**
     * Create a new post for a specific website.
     *
     * @bodyParam title string required The title of the post. Example: Exciting News!
     * @bodyParam content string required The content of the post. Example: Today we launched our new product...
     * @bodyParam websiteId int required The ID of the website.

     *
     * @response {
     *   "message": "Post created successfully."
     * }
     *
     * @response 422 scenario="validation error" {
     *  "message": "The title field is required."
     * }
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'websiteId' => 'required|exists:websites,id',
        ]);

        $website = Website::find($request->websiteId);

        $website->posts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);


        //invalidate cache
        PostCreated::dispatch();

        return response()->json(['message' => 'Post created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post-details', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
