<?php

function renderLogo() 
{
    return '<div class="logo">' .
           '<a href="dashboard.php"><img src="../assets/images/logo.png" alt="Logo" class="logo-image"></a>' .
           '<a href="dashboard.php"><h1>Paw Uni</h1></a>' .
           '</div>';
}

function renderSearchBar() 
{
    return '<div class="search-bar">' .
           '<input type="text" placeholder="Search Dog Lessons">' .
           '<button class="search-button">Search</button>' .
           '</div>';
}

function renderNavigationBar() 
{
    return '<nav class="navigation">' .
           '<button class="navigation-button"><a href="credits-page.pdf">Credits Page</a></button>' .
           '<button class="navigation-button">Language</button>' .
           '<button class="navigation-button">About Us</button>' .
           '<button class="navigation-button"><a href="signout.php">Sign Out</a></button>' .
           '</nav>';
}

function renderFooter() 
{
    return '<footer class="footer">' .
           '<table class="footer-table">' .
           '<tr>' .
           '<th><span><strong>Careers</strong></span></th>' .
           '<th><span><strong>Contact</strong></span></th>' .
           '<th><span><strong>Business</strong></span></th>' .
           '<th><span><strong>Follow Us</strong></span></th>' .
           '<th></th>' .
           '</tr>' .
           '<tr>' .
           '<td><span>Junior Trainers</span></td>' .
           '<td><span>Addresses</span></td>' .
           '<td><span>Talent</span></td>' .
           '<td><span>Twitter/X</span></td>' .
           '<td><span>YouTube</span></td>' .
           '</tr>' .
           '<tr>' .
           '<td><span>Senior Trainers</span></td>' .
           '<td><span>Phone us</span></td>' .
           '<td><span>Marketing</span></td>' .
           '<td><span>Facebook</span></td>' .
           '<td><span>TikTok</span></td>' .
           '</tr>' .
           '<tr>' .
           '<td><span>Management</span></td>' .
           '<td><span>Email us</span></td>' .
           '<td><span>Sales</span></td>' .
           '<td><span>Instagram</span></td>' .
           '<td><span>LinkedIn</span></td>' .
           '</tr>' .
           '<tr>' .
           '<td><span><strong>&copy; 2024 Paw Uni</strong></span></td>' .
           '<td><span><strong>Accessibility</strong></span></td>' .
           '<td><span><strong>User Agreement</strong></span></td>' .
           '<td><span><strong>Privacy Policy</strong></span></td>' .
           '<td><span><strong>Cookies Policy</strong></span></td>' .
           '</tr>' .
           '</table>' .
           '</footer>';
}

function renderLeftAside() 
{
    return '<aside class="left-aside">' .
           '<p></p>' .
           '</aside>';
}

function renderRightAside() 
{
    return '<aside class="right-aside">' .
           '<p></p>' .
           '</aside>';
}
?>
