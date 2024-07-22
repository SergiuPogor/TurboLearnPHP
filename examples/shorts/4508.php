<?php

// Laravel 8.3 Example: Fixing 'Lazy Loading Violation' with Eager Loading
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/posts', function () {
    // Eager loading to prevent 'Lazy Loading Violation'
    $posts = Post::with('comments', 'author')->get();

    foreach ($posts as $post) {
        // Just for fun, let's pretend to process the data
        Log::info('Post title: ' . $post->title);
        foreach ($post->comments as $comment) {
            Log::info('Comment: ' . $comment->content);
        }
        Log::info('Author: ' . $post->author->name);
    }

    return response()->json($posts);
});

// Models
class Post extends \Illuminate\Database\Eloquent\Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

class Comment extends \Illuminate\Database\Eloquent\Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

class User extends \Illuminate\Database\Eloquent\Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

// Note: This example assumes you have Post, Comment, and User models with the appropriate relationships defined.
// Don't forget to run your migrations and seeders if necessary!