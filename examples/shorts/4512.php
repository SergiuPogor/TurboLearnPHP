<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        // If the user is not authenticated, redirect to the login page
        if (!Auth::check()) {
            return redirect('/login');
        }

        // If the authenticated user is not an admin, redirect to the home page
        if (!Auth::user()->isAdmin()) {
            return redirect('/home');
        }

        // Proceed with the request if the user is an admin
        return $next($request);
    }
}

// Usage in routes/web.php
use App\Http\Middleware\EnsureUserIsAdmin;

Route::get('/admin', function () {
    return 'Welcome, Admin!';
})->middleware(EnsureUserIsAdmin::class);

// Important: Make sure routes do not create a redirect loop
Route::get('/login', function () {
    return 'Please login!';
});

// Let's add some humor
if (!Auth::check()) {
    echo "Redirecting to login... Because everyone loves logging in, right?";
}
?>