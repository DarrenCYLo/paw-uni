<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Function</title>
    <link rel="stylesheet" href="../assets/stylesheets/centralised.css">
</head>
<body>
    <div class="grid">
	
	        <?php 
				// Start session to manage signed in user's state
				session_start(); // Starts current user's session
				require_once "pawunidatabaseconnection.php";
				require_once "layout-signup.php";
		    ?>
			
        <!-- Header -->
        <header>
            <?php 
                echo renderLogo(); 
                echo renderSearchBar(); 
                echo renderNavigationBar(); 
            ?>
        </header>

        <main class="signin">
            <div class="message-container">
                <?php
                // Retrieve and sanitise inputs
                $email = isset($_POST['email']) ? trim($_POST['email']) : null;
                $password = isset($_POST['password']) ? trim($_POST['password']) : null;

                // Initialise error flag
                $errors = false;

                // Email validation
                if (empty($email)) {
                    echo "<p>You have not entered your email</p>";
                    $errors = true;
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<p>Your email format is incorrect</p>";
                    $errors = true;
                }

                // Password validation
                if (empty($password)) {
                    echo "<p>You have not entered your password</p>";
                    $errors = true;
                } else if (strlen($password) < 10) {
                    echo "<p>Your password must be at least 10 characters</p>";
                    $errors = true;
                }

                if ($errors) {
                    echo "<a href='signin.php' class='submit-button'>Please Try Again</a>\n";
                    exit();
                }

                // Query to check for the user in phpMyAdmin MySQL database
                $conn = getConnection();
                $querySQL = "SELECT customerID, customer_forename, customer_surname, password_hash 
                             FROM customers 
                             WHERE customer_email = ?"; // SQL to get user's email
                
				// Prepare and execute SQL statement
                if ($stmt = mysqli_prepare($conn, $querySQL)) {
                    mysqli_stmt_bind_param($stmt, "s", $email); // Bind email to query
                    mysqli_stmt_execute($stmt); // Execute query
                    $queryresult = mysqli_stmt_get_result($stmt); // Get query result

                    $userRow = mysqli_fetch_assoc($queryresult);

                    // Check if the user was found
                    if ($userRow) {
						
						// Verify password
                        if (password_verify($password, $userRow['password_hash'])) {
                            // Echo "Sign in successful" message, signs in the user and automatically directs signed in user to dashboard.php in 5 seconds
                            $_SESSION['logged-in'] = true; // Set session logged-in flag
                            $_SESSION['email'] = $email; // Store user's email in session
                            $_SESSION['customerID'] = $userRow['customerID']; // Store user's customerID in session
                            $_SESSION['forename'] = $userRow['customer_forename']; // Store user's forename in session
                            $_SESSION['surname'] = $userRow['customer_surname']; // Store user's surname in session
                            echo "<p>Sign in successful " . htmlspecialchars($userRow['customer_forename']) . "! Paw Uni will fetch you the dashboard page!</p>";
                            header("Refresh: 5; url=dashboard.php");
                        } else {
                            echo "<p>Your password is incorrect</p>";
                            echo "<a href='signin.php' class='submit-button'>Please Try Again</a>\n";
                        }
                    } else {
                        // Email not found
                        echo "<p>Your email was not found</p>";
                        echo "<a href='signin.php' class='submit-button'>Please Try Again</a>\n";
                    }
                    // Close the prepared statement
                    mysqli_stmt_close($stmt);
                } else {
                    echo "<p>Could not prepare statement: " . mysqli_error($conn) . "</p>";
                }
                ?>
            </div>
        </main>

        <!-- Footer -->
        <?php 
            echo renderFooter(); 
        ?>
    </div>
</body>
</html>
