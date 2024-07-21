<?php

// Fixing 'Mass Assignment Exception' in Laravel with Humor
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::post('/posts', function (Request $request) {
    try {
        // Create a new post with mass assignment
        $post = Post::create($request->all());

        Log::info('New post created: ', ['title' => $post->title, 'body' => $post->body]);

        return response()->json([
            'success' => 'Post created successfully!',
            'post' => $post
        ]);
    } catch (\Illuminate\Database\Eloquent\MassAssignmentException $e) {
        // Handle the Mass Assignment Exception
        Log::warning('Mass Assignment Exception: ' . $e->getMessage());

        return response()->json([
            'error' => 'Mass Assignment Exception. Check your fillable properties.',
            'tip' => 'Make sure you guard your models like a superhero!'
        ], 403);
    }
});

// Post model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Guarded attributes to prevent mass assignment exception
    protected $fillable = ['title', 'body'];

    // Hiding unnecessary attributes from JSON responses
    protected $hidden = ['created_at', 'updated_at'];
}

// Note: Ensure you define the $fillable property in your model to prevent mass assignment issues.
// Also, don't forget to run your migrations and seeders if necessary!