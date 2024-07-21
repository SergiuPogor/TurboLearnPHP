<?php

namespace App\Http\Controllers;

// Example of using namespaces
use App\Models\User;
use App\Repositories\UserRepository as Repo;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve all users
        $users = User::all();

        return view('users.index', compact('users'));
    }
}