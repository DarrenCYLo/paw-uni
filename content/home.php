<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../assets/stylesheets/centralised.css"/>
</head>

<body>
    <div class="grid">
	
        <?php 
            require_once "layout-home.php"; // Includes reusable layout functions and code
        ?>

        <!-- Header -->
        <header>
            <?php
			    // Renders reusable logo, search bar and navigation bar
                echo renderLogo();
                echo renderSearchBar();
                echo renderNavigationBar();
            ?>
        </header>

        <!-- Fading Background Section -->
        <section class="fading-background">
            <div class="fading-wrapper">
                <!-- Set 1 -->
                <div class="fading-set set1">
                    <div class="fading-item">
                        <img src="../assets/images/fading1.png" alt="Fading 1" />
                    </div>
                </div>

                <!-- Set 2 -->
                <div class="fading-set set2">
                    <div class="fading-item">
                        <img src="../assets/images/fading2.png" alt="Fading 2" />
                    </div>
                </div>

                <!-- Set 3 -->
                <div class="fading-set set3">
                    <div class="fading-item">
                        <img src="../assets/images/fading3.png" alt="Fading 3" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="home">
            <!-- Row 1 -->
            <div class="row1-image">
                <img src="../assets/images/introduction-to-training.png" alt="Introduction To Training" />
                <div class="row1-text">
                    <h1>Welcome to Paw Uni</h1>
                    <h2>Learning and bonding with your dog is a forever memorable experience</h2>
                    <h3>Beginner lessons</h3>
                    <h3>Intermediate lessons</h3>
                    <h3>Advanced lessons</h3>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row2-image">
                <img src="../assets/images/jump.png" alt="Jump" />
                <div class="row2-text">
                    <h1>Help at every step</h1>
                    <h2>Catalog of comprehensive training programmes</h2>
                    <h3>Training programmes for everyone</h3>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="row3-image">
                <img src="../assets/images/fetch.png" alt="Fetch" />
                <div class="row3-text">
                    <h1>Training Centres and Online Training</h1>
                    <h2>Open to all</h2>
                    <h3>Adults and children</h3>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <?php
            // Render reusable footer		
		    echo renderFooter(); 
		?>

        <!-- Left and Right Asides -->
        <?php
		    // Render reusable footer
            echo renderLeftAside();
            echo renderRightAside();
        ?>
    </div>
</body>
</html>
