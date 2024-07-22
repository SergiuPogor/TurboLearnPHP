<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::get('/form', function () {
    return view('form'); // Return a view with a form
});

Route::post('/submit-form', function (Request $request) {
    try {
        // Validate CSRF token and handle form submission
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        Log::info('Form submitted successfully: ', $validated);

        return response()->json([
            'success' => 'Form submitted successfully!',
            'data' => $validated
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Handle validation errors
        return response()->json([
            'error' => $e->errors(),
            'message' => 'Validation failed!'
        ], 422);
    } catch (\Illuminate\Session\TokenMismatchException $e) {
        // Handle TokenMismatchException
        Log::warning('TokenMismatchException: ' . $e->getMessage());

        return response()->json([
            'error' => 'TokenMismatchException. Check your CSRF token.',
            'tip' => 'Make sure you include the @csrf directive in your forms!'
        ], 419);
    }
});

// form.blade.php (Blade template for the form)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
    <form action="/submit-form" method="POST">
        @csrf <!-- CSRF token directive -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>