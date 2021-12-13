<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentThread extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'status',
        'likes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replys()
    {
        return $this->morphMany(CommentThread::class, 'commentable');
    }
}
