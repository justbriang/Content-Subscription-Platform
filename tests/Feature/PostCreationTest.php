<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_create_post()
    {
        $website = Website::create([
            'name' => 'testwebsite2',
            'url' => 'www.test2.com'
        ]);

        $response = $this->postJson("/api/posts", [
            'title' => 'New Post',
            'content' => 'Content of the new post',
            'websiteId' => $website->id,
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Post created successfully.']);

        $this->assertDatabaseHas('posts', [
            'title' => 'New Post',
            'content' => 'Content of the new post',
            'website_id' => $website->id,
        ]);
    }
}
