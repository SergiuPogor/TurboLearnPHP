<?php
// Example of creating and running database migrations in Laravel

// Run the following command to create a new migration file
// php artisan make:migration create_users_table

// Migration file example located at database/migrations/2024_10_25_000000_create_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    // Run the migrations
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Create an auto-incrementing ID
            $table->string('name'); // Create a name column
            $table->string('email')->unique(); // Create a unique email column
            $table->timestamp('email_verified_at')->nullable(); // Nullable verified timestamp
            $table->string('password'); // Password column
            $table->rememberToken(); // Token for 'remember me' functionality
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    // Reverse the migrations
    public function down(): void
    {
        Schema::dropIfExists('users'); // Drop the users table if it exists
    }
}

// After creating the migration file, run the following command to execute the migration
// php artisan migrate

// To rollback the last migration, use:
// php artisan migrate:rollback

// Additional command to see migration status
// php artisan migrate:status

// Example of modifying the migration to add a column later
// php artisan make:migration add_age_to_users_table --table=users

// Migration file located at database/migrations/2024_10_25_000001_add_age_to_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeToUsersTable extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable(); // Adding age column
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age'); // Remove age column
        });
    }
}