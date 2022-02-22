<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // Un commentaire à un seul post
    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
    // Un commentaire à un seul autheur
    public function author()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
