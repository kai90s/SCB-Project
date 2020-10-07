<?php session_start();

session_destroy();
// redirect to login page

echo "<script>alert(\"Success Logout.. redirect to main menu\"); window.location = (\"index.php?\")</script>";
?>