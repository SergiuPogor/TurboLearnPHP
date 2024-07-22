<?php

// Solving session issues in CodeIgniter

// Application/config/config.php

$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = sys_get_temp_dir();
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

// Let's add a check to ensure the session path is writable
if (!is_writable($config['sess_save_path'])) {
    die("Session save path is not writable. Is your server taking a nap?");
}

// Controller example: ensuring sessions are working correctly
class Welcome extends CI_Controller
{
    public function index()
    {
        // Loading the session library
        $this->load->library('session');

        // Setting a session variable
        $this->session->set_userdata('username', 'codeIgniterPro');

        // Retrieving a session variable
        $username = $this->session->userdata('username');

        if ($username) {
            echo "Hello, $username! Your session is working perfectly!";
        } else {
            echo "Oops! Looks like your session took a coffee break!";
        }
    }
}

// Make sure to set appropriate session settings in your environment
// No more mysterious session issues!