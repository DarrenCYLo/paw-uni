<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beginner Lessons</title>
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

        <!-- Main space -->
        <main class="beginner-lessons-list">
            <h1 class="beginner-lessons-list">Beginner Lessons</h1>
            <div class="lesson-container">
                <?php
                     // SQL query to get training sessions with IDs, titles and image paths
                    $querySQL = "SELECT trainingID, title, session_imagepath FROM training_sessions"; 
                    $queryresult = mysqli_query($conn, $querySQL);

                    if ($queryresult) {
                        while ($currentrow = mysqli_fetch_assoc($queryresult)) {
                            $trainingID = $currentrow['trainingID']; // Get training session ID
                            $title = $currentrow['title']; // Get training session title
                            $image = $currentrow['session_imagepath']; // Get image path

                            // Display the lessons' title with the corresponding image
                            echo "<div class='lesson-box'>
                                    <img src='" . htmlspecialchars($image) . "' alt='" . htmlspecialchars($title) . "' class='lesson-thumbnail'>
                                    <a href='lessons.php?selectedTrainingID=" . htmlspecialchars($trainingID) . "'>" . htmlspecialchars($title) . "</a>
                                  </div>";
                        }
                        mysqli_free_result($queryresult); 
                    } else {
                        echo "<p>Could not execute query: " . mysqli_error($conn) . "</p>";
                    }
                    mysqli_close($conn); // Close the phpMyAdmin MySQL database connection
                ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-button">←</button>
                <button class="pagination-button">1</button>
                <button class="pagination-button">→</button>
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
