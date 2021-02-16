<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostApp extends Model
{
    protected $fillable = [
        'image_file_name', 'title', 'description', 'url', 'user_id'
    ];
}
