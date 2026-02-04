<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lessons</title>
    <link rel="stylesheet" href="../assets/stylesheets/centralised.css">
</head>

<body>
    <div class="grid">
	
        <?php 
            session_start(); // Resume current user's session
            require_once "pawunidatabaseconnection.php";
            require_once "layout-contents.php"; 
        ?>

        <!-- Header -->
        <header>
            <?php 
                echo renderLogo(); 
                echo renderSearchBar(); 
                echo renderNavigationBar(); 
            ?>
        </header>

        <!-- Main Content -->
        <main class="lessons">
            <?php
			    // Initialise variable to store the selected training ID
                $selectedTrainingID = 0;

                // Check if a valid trainingID is passed via $_REQUEST
                if (array_key_exists('selectedTrainingID', $_REQUEST)) {
                    $selectedTrainingID = intval($_REQUEST['selectedTrainingID']);

                    if ($selectedTrainingID != 0) {
                        // Prepare SQL query to fetch lesson details
                        $querySQL = "SELECT title, description, session_date, price_per_person 
                                     FROM training_sessions 
                                     WHERE trainingID = ?";
									 
                        if ($stmt = mysqli_prepare($conn, $querySQL)) {
                            mysqli_stmt_bind_param($stmt, "i", $selectedTrainingID);
                            mysqli_stmt_execute($stmt);
                            $queryresult = mysqli_stmt_get_result($stmt);
                        } else {
                            echo "<p>Could not prepare statement</p>";
                        }
                    } else {
                        echo "<p>Training Session ID: " . htmlspecialchars($selectedTrainingID) . " is not in the database</p>";
                    }

                    // Display lesson details
                    if ($queryresult) {
                        $currentrow = mysqli_fetch_assoc($queryresult);
                        $title = htmlspecialchars($currentrow['title']); // Title sanitisation 
                        $description = htmlspecialchars($currentrow['description']); // Description sanitisation 
                        $sessiondate = htmlspecialchars($currentrow['session_date']); // Session date sanitisation 
                        $price = htmlspecialchars($currentrow['price_per_person']); // Price sanitisation 

                        // Echo the details of the lessons' Title, Description, Lesson Date and Price Per Person
                        echo "
                        <div class=\"video\">
                            <video width=\"640\" height=\"360\" controls>
                                <source src=\"../assets/images/introduction-to-training.mp4\" type=\"video/mp4\">
                            </video>
                            <a href=\"booking.php?trainingID=" . htmlspecialchars($selectedTrainingID) . "\" class=\"book-button\">Book Now</a>
                        </div>
                        <div class=\"lesson-details\">
                            <p><strong>Title:</strong> " . htmlspecialchars($title) . "</p>
                            <p><strong>Description:</strong> " . htmlspecialchars($description) . "</p>
                            <p><strong>Lesson Date:</strong> " . htmlspecialchars($sessiondate) . "</p>
                            <p><strong>Price Per Person:</strong> £" . htmlspecialchars($price) . "</p>
                        </div>";
                    }

                    // Free the result and close the phpMyAdmin MySQL database connection
                    mysqli_free_result($queryresult); 
                    mysqli_close($conn);
                } else { 
                    // Direct to dashboard if no valid trainingID is provided
                    header('Location: dashboard.php');
                    exit;    
                }    
            ?>
        </main>

        <!-- Footer -->
        <?php 
		    echo renderFooter(); 
		?>

        <!-- Left and Right Asides -->
        <?php
            echo renderLeftAside();
            echo renderRightAside();
        ?>
    </div>
</body>
</html>
