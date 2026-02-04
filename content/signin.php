<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <link rel="stylesheet" href="../assets/stylesheets/centralised.css" />
</head>

<body>
    <div class="grid">
        <?php    
            require_once "layout-signin.php";
        ?>

        <!-- Header -->
        <header>
            <?php 
                echo renderLogo(); 
                echo renderSearchBar(); 
                echo renderNavigationBar(); 
            ?>
        </header>

        <!-- Sign in form -->
        <main class="signin">
            <div class="signin-container">
                <form action="signin-function.php" method="POST" class="signin-form">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email"/>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"/>

                    <button type="submit" class="submit-button">Sign In</button>
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
