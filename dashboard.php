<?php
// dashboard.php - Admin Content Editor
session_start();
require 'config.php';

// Check if logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin.php");
    exit;
}

$update_message = '';

// Handle Content Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    foreach ($_POST as $key => $value) {
        if ($key !== 'action') {
            // Prepared statement to prevent SQL injection and insert/update content
            $stmt = $conn->prepare("INSERT INTO content (section_name, content_value) VALUES (?, ?) 
                                    ON DUPLICATE KEY UPDATE content_value = ?");
            // Sanitize input before saving to database
            $safe_value = htmlspecialchars($value); 
            $stmt->bind_param("sss", $key, $safe_value, $safe_value);
            $stmt->execute();
            $stmt->close();
        }
    }
    $update_message = "Content updated successfully!";
    // Reload content after update
    $content = [];
    $result = $conn->query("SELECT section_name, content_value FROM content");
    while ($row = $result->fetch_assoc()) {
        $content[$row['section_name']] = $row['content_value'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Dashboard Specific Styles */
        body { background-color: #f9f9f9; padding: 20px; }
        .dashboard-container { max-width: 900px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: var(--secondary-color); border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; border: 1px solid #eee; padding: 15px; border-radius: 5px; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: var(--dark-color); }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { min-height: 100px; }
        .update-btn { background-color: var(--success-color); color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 1.1rem; }
        .success-message { color: var(--success-color); background: #e8f5e9; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        .logout-link { float: right; margin-top: -30px; color: var(--accent-color); text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <a href="logout.php" class="logout-link">Logout</a>
        <h1>Admin Dashboard: Content Editor</h1>

        <?php if ($update_message): ?>
            <p class="success-message"><?php echo $update_message; ?></p>
        <?php endif; ?>

        <form method="post" action="dashboard.php">
            <input type="hidden" name="action" value="update">

            <h2>General & Header Info</h2>
            <div class="form-group">
                <label for="full_name">Full Name (Header & CV)</label>
                <input type="text" name="full_name" id="full_name" value="<?php echo get_display_content('full_name', 'Md. Fazle Rabbi'); ?>">
            </div>
            <div class="form-group">
                <label for="tagline_default">Tagline (Animated Text Default)</label>
                <input type="text" name="tagline_default" id="tagline_default" value="<?php echo get_display_content('tagline_default', 'Digital Marketing & Web Designer'); ?>">
            </div>
            
            <h2>Fazle Rabbi (CV) Section</h2>
            <div class="form-group">
                <label for="fazle_rabbi_text_p1">Introduction Paragraph 1</label>
                <textarea name="fazle_rabbi_text_p1" id="fazle_rabbi_text_p1"><?php echo get_display_content('fazle_rabbi_text_p1', 'Hello! I\'m Md. Fazle Rabbi, a dedicated and detail-oriented quality professional...'); ?></textarea>
            </div>
            <div class="form-group">
                <label for="fazle_rabbi_text_p2">Introduction Paragraph 2</label>
                <textarea name="fazle_rabbi_text_p2" id="fazle_rabbi_text_p2"><?php echo get_display_content('fazle_rabbi_text_p2', 'I\'m also expanding my skills in digital marketing and web design, combining my analytical mindset...'); ?></textarea>
            </div>

            <h2>Contact & Social Info</h2>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" value="<?php echo get_display_content('phone', '+880 1610-842781'); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" value="<?php echo get_display_content('email', 'fazlerabbi66122@gmail.com'); ?>">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" value="<?php echo get_display_content('location', 'Dhaka, Bangladesh'); ?>">
            </div>
            <div class="form-group">
                <label for="linkedin_link">LinkedIn Link</label>
                <input type="text" name="linkedin_link" id="linkedin_link" value="<?php echo get_display_content('linkedin_link', '#'); ?>">
            </div>
            
            <button type="submit" class="update-btn">Save All Changes</button>
        </form>
    </div>
</body>
</html>
