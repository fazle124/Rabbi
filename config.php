<?php
// config.php - Database Configuration and Admin Credentials

// Database Details
$servername = "localhost"; 
$username = "আপনার_ডেটাবেস_ইউজারনেম"; // <--- আপনার হোস্টিং-এর ইউজারনেম
$password = "আপনার_ডেটাবেস_পাসওয়ার্ড"; // <--- আপনার হোস্টিং-এর পাসওয়ার্ড
$dbname = "আপনার_ডেটাবেসের_নাম"; // <--- আপনার তৈরি করা ডেটাবেসের নাম

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Admin Credentials
define('ADMIN_USER', 'Fazle124');
define('ADMIN_PASS', '127627'); 
// NOTE: For better security in a real application, passwords should be hashed (e.g., password_hash()).

/**
 * Function to retrieve content from the database.
 * @param string $key The section_name key.
 * @param string $default The default value if content is missing.
 * @return string The content value (decoded for display).
 */
function get_display_content($key, $default = '') {
    global $content;
    // htmlspecialchars_decode is used to reverse the escaping done on save
    return htmlspecialchars_decode($content[$key] ?? $default); 
}

// Load all content from the database once
$content = [];
$result = $conn->query("SELECT section_name, content_value FROM content");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $content[$row['section_name']] = $row['content_value'];
    }
}
?>
