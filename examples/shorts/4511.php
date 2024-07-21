<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyCustomService; // Import your custom service

class MyController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Ensure the service class is properly namespaced and exists
            $service = new MyCustomService();
            $data = $service->getData(); // Imagine this method fetches some data

            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $e) {
            // Log the error for debugging
            \Log::error('Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Class not found. Please check your namespaces and paths!',
                'tip' => 'Run composer dump-autoload if you made changes to your class files.'
            ], 500);
        }
    }
}

// Run this command in terminal to refresh autoloader
// composer dump-autoload

// Let's add some humor to lighten up the mood
echo "Autoloading is like magic, until it isn't. Then it's just bugs.";
?>