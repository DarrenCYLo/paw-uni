<?php

function renderLogo()
{
    return <<<LOGO
    <div class="logo">
        <a href="home.php"><img src="../assets/images/logo.png" alt="Logo" class="logo-image"></a>
        <a href="home.php"><h1>Paw Uni</h1></a>
    </div>
    LOGO;
}

function renderSearchBar()
{
    return <<<SEARCH
    <div class="search-bar">
        <input type="text" placeholder="Search Dog Lessons">
        <button class="search-button">Search</button>
    </div>
    SEARCH;
}

function renderNavigationBar()
{
    return <<<NAVIGATION
    <nav class="navigation">
        <button class="navigation-button">Credits Page</button>
        <button class="navigation-button">Language</button>
        <button class="navigation-button">About Us</button>
        <button class="navigation-button"><a href="signin.php">Sign In</a></button>
        <button class="navigation-button"><a href="signup.php">Sign Up</a></button>
    </nav>
    NAVIGATION;
}

function renderFooter()
{
    return <<<FOOTER
    <footer class="footer">
        <table class="footer-table">
            <tr>
                <th><span><strong>Careers</strong></span></th>
                <th><span><strong>Contact</strong></span></th>
                <th><span><strong>Business</strong></span></th>
                <th><span><strong>Follow Us</strong></span></th>
                <th></th>
            </tr>
            <tr>
                <td><span>Junior Trainers</span></td>
                <td><span>Addresses</span></td>
                <td><span>Talent</span></td>
                <td><span>Twitter/X</span></td>
                <td><span>YouTube</span></td>
            </tr>
            <tr>
                <td><span>Senior Trainers</span></td>
                <td><span>Phone us</span></td>
                <td><span>Marketing</span></td>
                <td><span>Facebook</span></td>
                <td><span>TikTok</span></td>
            </tr>
            <tr>
                <td><span>Management</span></td>
                <td><span>Email us</span></td>
                <td><span>Sales</span></td>
                <td><span>Instagram</span></td>
                <td><span>LinkedIn</span></td>
            </tr>
            <tr>
                <td><span><strong>&copy; 2024 Paw Uni</strong></span></td>
                <td><span><strong>Accessibility</strong></span></td>
                <td><span><strong>User Agreement</strong></span></td>
                <td><span><strong>Privacy Policy</strong></span></td>
                <td><span><strong>Cookies Policy</strong></span></td>
            </tr>
        </table>
    </footer>
    FOOTER;
}

function renderLeftAside()
{
    return <<<ASIDE_LEFT
    <aside class="left-aside">
        <p></p>
    </aside>
    ASIDE_LEFT;
}

function renderRightAside()
{
    return <<<ASIDE_RIGHT
    <aside class="right-aside">
        <p></p>
    </aside>
    ASIDE_RIGHT;
}
?>
