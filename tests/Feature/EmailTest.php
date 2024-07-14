<?php

namespace Tests\Feature;

use App\Console\Commands\SendPostNotifications;
use App\Mail\PostNotificationMail;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailTest extends TestCase
{
    use  WithFaker;
    /**
     * A basic feature test example.
     */
    public function test_post_notification_email_is_queued()
    {
        Mail::fake();
        $website = Website::create([
            'name' => 'testwebsite',
            'url' => 'www.test.com'
        ]);
        $post =  $website->posts()->create([
            'title' => 'New Post',
            'content' => 'Content of the new post',
        ]);
        $subscriber =  $website->subscribers()->create([
            'email' => $this->faker->unique()->safeEmail
        ]);



        Mail::to($subscriber->email)->queue(new PostNotificationMail($post));

        Mail::assertQueued(PostNotificationMail::class, function ($mail) use ($post, $subscriber) {
            return $mail->post->id === $post->id && $mail->hasTo($subscriber->email);
        });
    }
}
