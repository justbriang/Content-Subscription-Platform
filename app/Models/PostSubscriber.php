<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostSubscriber extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'subscriber_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function subscriber(): BelongsTo
    {
        return $this->belongsTo(Subscriber::class);
    }
}
