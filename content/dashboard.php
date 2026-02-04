<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
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
        <main class="dashboard">

            <!-- Beginner lessons -->
            <h1 class="beginner-lessons-title">
                <a href="beginner-lessons.php">Beginner Lessons</a>
            </h1>

            <div class="lessons-title">
                <div class="lesson-image">
                    <a href="beginner-lessons.php">
                        <img src="../assets/images/introduction-to-training.png" alt="Introduction To Training">
                    </a>
                    <a href="beginner-lessons.php">
                        <h2>Introduction To Training</h2>
                    </a>
                </div>

                <div class="lesson-image">
                    <a href="beginner-lessons.php">
                        <img src="../assets/images/potty-training.png" alt="Potty Training">
                    </a>
                    <a href="beginner-lessons.php">
                        <h2>Potty Training</h2>
                    </a>
                </div>

                <div class="lesson-image">
                    <a href="beginner-lessons.php">
                        <img src="../assets/images/socialisation.png" alt="Socialisation">
                    </a>
                    <a href="beginner-lessons.php">
                        <h2>Socialisation</h2>
                    </a>
                </div>

                <div class="lesson-image">
                    <a href="beginner-lessons.php">
                        <img src="../assets/images/on-leash-training.png" alt="On-leash Training">
                    </a>
                    <a href="beginner-lessons.php">
                        <h2>On-leash Training</h2>
                    </a>
                </div>

                <div class="lesson-image">
                    <a href="beginner-lessons.php">
                        <img src="../assets/images/view-more1.png" alt="View More">
                    </a>
                    <a href="beginner-lessons.php">
                        <h2>View More</h2>
                    </a>
                </div>
            </div>

            <!-- Intermediate lessons -->
            <h1 class="intermediate-lessons-title">Intermediate Lessons</h1>

            <div class="lessons-title">
                <div class="lesson-image">
                    <img src="../assets/images/swimming-level-2-doggy-paddle.png" alt="Swimming Level 2 Doggy Paddle">
                    <h2>Swimming Level 2 Doggy Paddle</h2>
                </div>

                <div class="lesson-image">
                    <img src="../assets/images/short-leash-training.png" alt="Short-leash Training">
                    <h2>Short-leash Training</h2>
                </div>

                <div class="lesson-image">
                    <img src="../assets/images/barking-control.png" alt="Barking Control">
                    <h2>Barking Control</h2>
                </div>

                <div class="lesson-image">
                    <img src="../assets/images/long-distance-recall.png" alt="Long-distance Recall">
                    <h2>Long-distance Recall</h2>
                </div>

                <div class="lesson-image">
                    <img src="../assets/images/view-more2.png" alt="View More">
                    <h2>View More</h2>
                </div>
            </div>

            <!-- Advance lessons -->
            <h1 class="advance-lessons-title">Advance Lessons</h1>

            <div class="lessons-title">
                <div class="lesson-image">
                    <img src="../assets/images/anxiety-management.png" alt="Anxiety Management">
                    <h2>Anxiety Management</h2>
                </div>

                <div class="lesson-image">
                    <img src="../assets/images/pole-weaving.png" alt="Pole Weaving">
                    <h2>Pole Weaving</h2>
                </div>

                <div class="lesson-image">
                    <img src="../assets/images/frisbee-play.png" alt="Frisbee Play">
                    <h2>Frisbee Play</h2>
                </div>

                <div class="lesson-image">
                    <img src="../assets/images/hurdle-jumping.png" alt="Hurdle Jumping">
                    <h2>Hurdle Jumping</h2>
                </div>

                <div class="lesson-image">
                    <img src="../assets/images/view-more3.png" alt="View More">
                    <h2>View More</h2>
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
