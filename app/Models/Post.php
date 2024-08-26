<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Import the User model

class Post extends Model
{
    use HasFactory;

    /**
     * The user who authored the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
