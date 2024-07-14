<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $subscribers = Cache::remember('subscribers', 60, function () {
        //     return Subscriber::all();
        // });

        $subscribers = Subscriber::all();
        return response()->json($subscribers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // app/Http/Controllers/SubscriberController.php
    /**
     * Create a new subscription for a specific website.
     *
     * @bodyParam email string required The email of the user. Example: john@example.com
     * @bodyParam websiteId int required The ID of the website.

     *
     * @response {
     *   "message": "Subscription successful."
     * }
     *
     * @response 422 scenario="validation error" {
     *  "message": "The email field is required."
     * }
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
            'websiteId' => 'required|exists:websites,id',
        ]);

        $website = Website::find($request->websiteId);

        $website->subscribers()->create([
            'email' => $request->input('email'),
        ]);

        return response()->json(['message' => 'Subscription successful.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
