<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'website_id'
    ];

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    public function subscribers(): BelongsToMany
    {
        return $this->BelongsToMany(Subscriber::class, 'post_subscribers');
    }
    public function postSubscribers(): HasMany
    {
        return $this->hasMany(PostSubscriber::class);
    }
}
