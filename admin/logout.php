<?php
// Start the session
session_start();

// Check if the user is logged in
if(isset($_SESSION['doctor_id'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destroy the session
    session_destroy();
}

// Redirect the user to the login page or any other page after logout
$_SESSION['status'] = "success";
// Set session message
$_SESSION['message'] = "Hey  you have been logged out successfully.";
// Debugging: Check if the session message is set
// var_dump($_SESSION['message']);

header("Location: ../auth/index.php");
exit();
?>
