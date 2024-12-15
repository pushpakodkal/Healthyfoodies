<?php
// Start the session
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to the home page
header("Location: /"); // Replace '/' with the full URL of your home page if needed
exit();
?>
