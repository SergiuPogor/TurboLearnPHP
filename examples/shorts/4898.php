<?php

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Define a polymorphic relation
    public function commentable()
    {
        return $this->morphTo();
    }
}

class Post extends Model
{
    // Define a polymorphic relation
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

class Video extends Model
{
    // Define a polymorphic relation
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

// Fetch comments for a post
$post = Post::find(1);
$postComments = $post->comments;

// Fetch comments for a video
$video = Video::find(1);
$videoComments = $video->comments;

?>