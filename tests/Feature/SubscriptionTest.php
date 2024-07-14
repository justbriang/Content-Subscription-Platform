<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithFaker;

    public function test_user_can_subscribe_to_website()
    {
        $website = Website::create([
            'name' => 'testwebsite5',
            'url' => 'www.test5.com'
        ]);
        $email = $this->faker->unique()->safeEmail;
        $response = $this->postJson("/api/subscribers", [
            'email' =>  $email,
            'websiteId' => $website->id
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Subscription successful.']);
        $this->assertDatabaseHas('subscribers', [
            'email' =>  $email,
            'website_id' => $website->id,
        ]);
    }
    public function test_subscription_fails_with_invalid_email()
    {
        $website = Website::create([
            'name' => 'testwebsite4',
            'url' => 'www.test4.com'
        ]);


        $response = $this->postJson("/api/subscribers", [
            'email' => 'not-a-valid-email',
            'websiteId' => $website->id
        ]);

        $response->assertStatus(422); // HTTP 422 Unprocessable Entity
    }
}
