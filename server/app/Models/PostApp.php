<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PostApp extends Model
{
    protected $fillable = [
        'image_file_name', 'title', 'description', 'url', 'user_id'
    ];

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'likes')->withTimestamps();
    }
}
