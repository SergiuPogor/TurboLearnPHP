<?php

// Application/Config/Config.php

// Tired of unexpected session behaviors in CodeIgniter? Let's fix those issues for good!

$config['sess_driver'] = 'database'; // Use database for session storage
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200; // 2 hours
$config['sess_save_path'] = 'ci_sessions'; // Table name for storing sessions
$config['sess_match_ip'] = TRUE; // Match IP addresses for added security
$config['sess_time_to_update'] = 300; // Regenerate session ID every 5 minutes
$config['sess_regenerate_destroy'] = TRUE; // Destroy old session data upon regeneration

// Ensure database table exists for storing sessions
// CREATE TABLE `ci_sessions` (
//     `id` varchar(128) NOT NULL,
//     `ip_address` varchar(45) NOT NULL,
//     `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
//     `data` blob NOT NULL,
//     PRIMARY KEY (id),
//     KEY `ci_sessions_timestamp` (`timestamp`)
// );

// Additional configuration for session security:
$config['cookie_secure'] = TRUE; // Only send cookies over HTTPS
$config['cookie_httponly'] = TRUE; // Restrict cookie access to HTTP protocol

// Apply session settings carefully
if (ENVIRONMENT === 'development') {
    ini_set('session.cookie_secure', '0'); // Disable secure cookies for development
} else {
    ini_set('session.cookie_secure', '1'); // Enable secure cookies for production
}

// Let's create and use a session variable to test it out:
$this->load->library('session');

// Store a value in the session
$_SESSION['user_id'] = 42; // Answer to life, the universe, and everything!

// Retrieve the value from the session
$user_id = $_SESSION['user_id'];
log_message('debug', 'User ID from session: ' . $user_id);

// And there you have it! Sessions should now be reliable and secure.