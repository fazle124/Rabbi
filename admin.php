<?php
// admin.php - Admin Login Page
session_start();
require 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    // Static Credential Check
    if ($user === ADMIN_USER && $pass === ADMIN_PASS) {
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Only for centering the login form */
        body { display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background-color: #f4f4f4; }
        .login-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px; text-align: center; }
        h2 { color: var(--primary-color); margin-bottom: 20px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background-color: var(--primary-color); color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        .message { color: var(--accent-color); margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Panel Login</h2>
        <p class="message"><?php echo $message; ?></p>
        <form method="post" action="admin.php">
            <input type="text" name="username" placeholder="Username (Fazle124)" required>
            <input type="password" name="password" placeholder="Password (127627)" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
