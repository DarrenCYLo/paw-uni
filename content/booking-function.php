<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Function</title>
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

        <main>
            <div class="booking">
                <div class="message-container">
                    <?php
                    // Initialise variables with default values
                    $trainingID = 0;
                    $customerID = 0;
                    $numberofpeople = 0; 
                    $priceperperson = 0; 
                    $total = 0; 
                    $bookingnotes = "";

                    // Get and validate inputs via $_REQUEST
                    if (array_key_exists("trainingID", $_REQUEST)) {
                        $trainingID = intval($_REQUEST["trainingID"]); // intval converts to integer for security
                    }

                    if (array_key_exists("customerID", $_REQUEST)) {
                        $customerID = intval($_REQUEST["customerID"]); // intval converts to integer for security
                    } else {
                        echo "Customer ID not found<br>";
                    }

                    if (array_key_exists("number_people", $_REQUEST)) {
                        $numberofpeople = intval($_REQUEST["number_people"]); // intval converts to integer for security
                    } else {
                        echo "Number of people not found<br>";
                    }

                    if (array_key_exists("booking_notes", $_REQUEST)) {
                        $bookingnotes = $_REQUEST["booking_notes"];  // Assign booking notes directly
                    } else {
                        echo "Booking notes not found<br>";
                    }

                    // Get the price per person from phpMyAdmin MySQL database
                    $querySQL = "SELECT price_per_person FROM training_sessions WHERE trainingID = ?";
                    if ($stmt = mysqli_prepare($conn, $querySQL)) {
                        mysqli_stmt_bind_param($stmt, "i", $trainingID); // Bind the trainingID
                        mysqli_stmt_execute($stmt); // Execute the prepared statement
                        $result = mysqli_stmt_get_result($stmt); // Get the result set
                        $training = mysqli_fetch_assoc($result); // Get the result as an associative array
                        $priceperperson = $training["price_per_person"]; // Get the price per person
                        mysqli_stmt_close($stmt); // Close the prepared statement
                    } else {
                        echo "Could not prepare statement<br>";
                    }

                    // Calculate the total cost
                    $total = $numberofpeople * $priceperperson;

                    // Insert the booking into phpMyAdmin MySQL database
                    $insertSQL = "INSERT INTO booking (trainingID, customerID, number_people, total_booking_cost, booking_notes) 
                                  VALUES (?, ?, ?, ?, ?)";
                    // Bind variables to the prepared statement
                    if ($stmt = mysqli_prepare($conn, $insertSQL)) {
                        mysqli_stmt_bind_param($stmt, "iiids", $trainingID, $customerID, $numberofpeople, $total, $bookingnotes);

                        // Execute the prepared statement and check the result
                        $queryresult = mysqli_stmt_execute($stmt);

                        if ($queryresult) {
                            echo "<p>Booking successful! Total cost is £" . $total . "! Paw Uni will fetch you the dashboard page!</p>";
                        }
                    } else {
                        echo "Could not prepare statement<br>";
                    }

                    // Close the phpMyAdmin MySQL database
                    mysqli_close($conn);

                    // Direct if something went wrong
                    header("Refresh: 5; url=dashboard.php"); // Redirect after 5 seconds
                    ?>
                </div>
            </div>
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
