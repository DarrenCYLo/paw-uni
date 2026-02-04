<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Function</title>
    <link rel="stylesheet" href="../assets/stylesheets/centralised.css">
</head>
<body>
    <div class="grid">
	
	        <?php 
                require_once "pawunidatabaseconnection.php"; // Include phpMyAdmin MySQL database connection
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

        <main class="signup">
            <div class="message-container">
                <?php
                
				//Retrieve input values from the signup.php form and set them to null if not provided
                $forename = array_key_exists('forename', $_POST) ? $_POST['forename'] : null;
                $surname = array_key_exists('surname', $_POST) ? $_POST['surname'] : null;
                $dateofbirth = array_key_exists('dateofbirth', $_POST) ? $_POST['dateofbirth'] : null;
                $email = array_key_exists('email', $_POST) ? $_POST['email'] : null;
                $password = array_key_exists('password', $_POST) ? $_POST['password'] : null;

                // Sanitise input values
                $forename = htmlspecialchars(trim($forename));
                $surname = htmlspecialchars(trim($surname));
                $dateofbirth = htmlspecialchars(trim($dateofbirth));
                $email = htmlspecialchars(trim($email));
                $password = htmlspecialchars(trim($password));

                // Initialise error flag
				$errors = false;
				
				// Forename validation
                if (empty($forename)) {
                    echo "<p>You have not entered your forename</p>\n";
                    $errors = true;
                }

				// Surname validation
                if (empty($surname)) {
                    echo "<p>You have not entered your surname</p>\n";
                    $errors = true;
                }

				// Date of birth validation
                if (empty($dateofbirth)) {
                    echo "<p>You have not entered your date of birth</p>\n";
                    $errors = true;
                }

				// Email validation
                if (empty($email)) {
                    echo "<p>You have not entered your email</p>\n";
                    $errors = true;
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<p>Your email format is incorrect</p>\n";
                    $errors = true;
                }

				// Password validation
                if (empty($password)) {
                    echo "<p>You have not entered your password</p>\n";
                    $errors = true;
                } else if (strlen($password) < 10) {
                    echo "<p>Your password must be at least 10 characters</p>\n";
                    $errors = true;
                }

                // Echo error message if any of the above
                if ($errors) {
                    echo "<a href='signup.php' class='submit-button'>Please Try Again</a>\n";
                    exit();
                }

                // Password hash for security
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // Insert user's details into phpMyAdmin MySQL database
                $conn = getConnection();
                $insertSQL = "INSERT INTO customers (customer_forename, customer_surname, date_of_birth, customer_email, password_hash) 
				              VALUES (?, ?, ?, ?, ?)";

                if ($stmt = mysqli_prepare($conn, $insertSQL)) {
                    // Binds the listed variables above to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sssss", $forename, $surname, $dateofbirth, $email, $password_hash);

                    // Executes the prepared statement
                    $queryresult = mysqli_stmt_execute($stmt);

                    // Echo error message if query fails
                    if (!$queryresult) {
                        echo "<p>Error: " . mysqli_stmt_error($stmt) . "</p>";
                    }

                    // Closes the phpMyAdmin MySQL database connection
                    mysqli_close($conn);
                } else {
                    echo "<p>Could not prepare statement: " . mysqli_error($conn) . "</p>";
                }
                // Echo "Sign up successful" message with sanitised htmlspecialchars() user name and automatically directs user to signin.php in 5 seconds
                echo "<p>Sign up successful " . htmlspecialchars($forename) . "! Paw Uni will fetch you the sign in page!</p>";
                header("Refresh: 5; url=signin.php");
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
