<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $websites = Cache::remember('websites', 60, function () {
        //     return Website::all();
        // });

        $websites = Website::all();

        return response()->json($websites);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // app/Http/Controllers/WebsiteController.php
    /**
     * Create a new specific website.
     *
     * @bodyParam name string required The name of the website. Example: unisev2
     * @bodyParam url string required The url of the website. Example: www.unisev2.com

     *
     * @response {
     *   "message": "Website Created Successfully."
     * }
     *
     * @response 422 scenario="validation error" {
     *  "message": "The name field is required."
     * }
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:websites,name',
            'url' => 'required|unique:websites,url',
        ]);

        $website = Website::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);


        return response()->json(['message' => 'Website Created Successfully.']);
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
