<?php

// Fixing 'Unable to Load Session Data' issue in CodeIgniter

// Application/config/config.php

$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200; // 2 hours
$config['sess_save_path'] = sys_get_temp_dir(); // Use system temp directory
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300; // Regenerate session ID every 5 minutes
$config['sess_regenerate_destroy'] = FALSE;

// Ensure the session save path is writable
if (!is_writable($config['sess_save_path'])) {
    die('Session save path is not writable. Please check permissions.');
}

// To handle larger user base, consider using database session driver
$config['sess_driver'] = 'database';
$config['sess_save_path'] = 'ci_sessions';

// Create the ci_sessions table
// Application/migrations/001_create_session_table.php

class Migration_create_session_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => FALSE
            ],
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => FALSE
            ],
            'timestamp' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'on_update' => 'CURRENT_TIMESTAMP'
            ],
            'data' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ci_sessions');
    }

    public function down()
    {
        $this->dbforge->drop_table('ci_sessions');
    }
}

// Run the migration to create the table
$this->load->library('migration');
if ($this->migration->current() === FALSE)
{
    show_error($this->migration->error_string());
}

// Controller Example: application/controllers/Welcome.php

class Welcome extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');

        // Set a session data
        $this->session->set_userdata('username', 'JohnDoe');

        // Retrieve session data
        $username = $this->session->userdata('username');
        echo "Hello, $username! Your session is working perfectly!";
    }

    public function logout()
    {
        // Destroy session
        $this->session->sess_destroy();
        echo "You have been logged out. Session destroyed!";
    }
}

// With these settings, your CodeIgniter app should handle sessions without unexpected expirations.
// No more frustrating 'Unable to Load Session Data' messages for your users!
?>