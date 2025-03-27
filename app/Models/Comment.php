<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['blog_id', 'author', 'content'];

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
