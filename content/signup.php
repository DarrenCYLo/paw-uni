<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/stylesheets/centralised.css">
</head>

<body>
    <div class="grid">

        <?php
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

        <!-- Sign up form -->
        <main class="signup">
            <div class="signup-container">
                <form method="POST" action="signup-function.php" class="signup-form">
                    <label for="forename">Forename:</label>
                    <input type="text" id="forename" name="forename">

                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname">

                    <label for="dateofbirth">Date of Birth:</label>
                    <input type="date" id="dateofbirth" name="dateofbirth">

                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email">

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">

                    <button type="submit" class="submit-button">Sign Up</button>
                </form>
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
