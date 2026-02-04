<?php

// Function to establish a connection to the phpMyAdmin MySQL database and below are the connection details
function getConnection() {
    $servername = "YOUR_DB_HOST";
    $username   = "YOUR_DB_USER";
    $password   = "YOUR_DB_PASSWORD";
    $dbname     = "YOUR_DB_NAME";

    // mysqli_connect creates a connection to phpMyAdmin MySQL database and terminates the script with an error message "Cannot connect to phpMyAdmin" if connection fails
    $conn = mysqli_connect($servername, $username, $password, $dbname) 
        or die("Cannot connect to phpMyAdmin");
    
	// Return the established connection for use in other PHP scripts
    return $conn; 
}

$conn = getConnection();
?>