<?php

namespace App\Console\Commands;

use App\Mail\PostNotificationMail;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendPostNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-post-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $websites = Website::with('subscribers', 'posts')->get();

        foreach ($websites as $website) {
            foreach ($website->posts as $post) {
                foreach ($website->subscribers as $subscriber) {
                    // Check if the subscriber has already received the post
                    if (!$subscriber->posts()->where('post_id', $post->id)->exists()) {

                        Mail::to($subscriber->email)->send(new PostNotificationMail($post));
                        $subscriber->posts()->attach($post->id);
                    }
                }
            }
        }

        $this->info('Post notifications sent successfully.');
    }
}
