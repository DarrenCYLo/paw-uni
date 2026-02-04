<?php
session_start(); // Resume current user's session
session_destroy(); // Destroys all data registered to a session
header("Location: home.php"); // Directs user to home.php
exit();
?>
