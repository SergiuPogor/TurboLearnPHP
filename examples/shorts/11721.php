<?php
// Example 1: Using session_start()
session_start(); // Starts the session and generates a session ID automatically
echo session_id(); // Displays the automatically generated session ID

// Example 2: Using session_id() without session_start()
session_id('custom_session_id'); // Manually setting the session ID before starting
session_start(); // Starts the session with the custom ID
echo session_id(); // Displays the custom session ID

// Example 3: Using session_id() after session_start()
session_start(); // Automatically starts the session
session_id('new_custom_id'); // Changing the session ID after starting the session
echo session_id(); // Displays the new session ID

?>