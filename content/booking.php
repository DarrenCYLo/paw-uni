<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking</title>
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

        <!-- Booking Form -->
        <main class="signup">
            <div class="signup-container">
                <?php
                // Gets user's details from session
                $customerID = isset($_SESSION["customerID"]) ? $_SESSION["customerID"] : 0;
                $forename = isset($_SESSION["forename"]) ? $_SESSION["forename"] : "";
                $surname = isset($_SESSION["surname"]) ? $_SESSION["surname"] : "";

                $trainingID = 0;

                // Check if trainingID is passed via $_REQUEST and ensure the trainingID is an integer
                if (array_key_exists("trainingID", $_REQUEST)) {
                    $trainingID = intval($_REQUEST["trainingID"]);

                    if ($trainingID != 0) {
                        // SQL query to get lesson details
                        $sql = "SELECT title, price_per_person FROM training_sessions WHERE trainingID = ?";
                        if ($stmt = mysqli_prepare($conn, $sql)) {
                            // Bind the trainingID to the prepared statement
                            mysqli_stmt_bind_param($stmt, "i", $trainingID);
                            mysqli_stmt_execute($stmt); // Execute the query
                            $queryresult = mysqli_stmt_get_result($stmt); // Get the result set
                        } else {
                            echo "<p>Could not prepare statement</p>";
                        }
                    } else {
                        echo "<p>No training found for ID: $trainingID</p>";
                    }

                    // Get lesson details if query execution was successful
                    if ($queryresult) {
                        $training = mysqli_fetch_assoc($queryresult); // Get the first row of the result
                        $title = $training["title"]; // Get title
                        $price = $training["price_per_person"]; // Get price per person

                        // Echo booking form
                        echo "
                        <form action='booking-function.php' method='post' class='signup-form'>
                            <label for='customerName'>Customer's Name</label>
                            <input type='text' id='customerName' name='customerName' value='" . htmlspecialchars($forename . " " . $surname) . "' readonly>

                            <label for='number_people'>Number of People</label>
                            <input type='number' id='number_people' name='number_people'>

                            <label for='booking_notes'>Additional Notes</label>
                            <textarea id='booking_notes' name='booking_notes' rows='4'></textarea>

                            <input type='hidden' name='trainingID' value='" . htmlspecialchars($trainingID) . "'>
                            <input type='hidden' name='customerID' value='" . htmlspecialchars($customerID) . "'>
                            <button type='submit' class='submit-button'>Confirm Booking</button>
                        </form>";
                    }
                    // Free the result set and close the database connection
                    mysqli_free_result($queryresult);
                    mysqli_close($conn);
                } else {
                    // Direct to dashboard if trainingID is not provided
                    header("Location: dashboard.php");
                    exit();
                }
                ?>
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
