<?php

// Destroy all session data
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), // Name of the session cookie
        '', // Value to set the cookie to
        time() - 42000, // Expire the cookie in the past
        $params["path"], // Path where the cookie is available
        $params["domain"], // Domain where the cookie is available
        $params["secure"], // Secure flag (true if the cookie should only be sent over HTTPS)
        $params["httponly"],
    );
}



// Redirect to the login page
header("Location: sign-in.php"); 
exit();
?>