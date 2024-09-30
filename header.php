
   
<?php

require "config.php";

?>


<!DOCTYPE html>
<html>
<head>
   
    <title>FIT-GO | Privacy Policy</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <link rel="stylesheet" href="style/styles.css">
   
    <script src="js/fitgojs.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"><!--to use font awesome library via cdn ,we need it for social media icons in footer-->
</head>
<body>
    <script>
 function toggleNav() {
    const navLinks = document.getElementById('navbuttons');
    navLinks.classList.toggle('active');
}

// Hide the menu if clicked outside
document.addEventListener('click', function(event) {
    const navLinks = document.getElementById('navbuttons');
    const hamburger = document.querySelector('.hamburger');

    // If the clicked target is not the menu or the hamburger button, hide the menu
    if (!navLinks.contains(event.target) && !hamburger.contains(event.target)) {
        navLinks.classList.remove('active');
    }
});


        
        </script>
    <header>
        <nav>
            <a href="index.php"><img style="width:60px; height:60px;padding: 0;margin-left:10px;"class="logo" src="img/logo.png"></a>
            <div style="height:0;padding: 0; margin: 0;" class="menu-toggle" onclick="toggleMenu()">☰</div>
            <ul class="navbuttons" id="navbuttons">
                <li><a href="index.php" >HOME</a></li>
                <li><a href="aboutus.php" class="active">ABOUT US</a></li>
                <li><a href="sessions.php">SESSIONS</a></li>
                <li><a href="train.php">TRAINERS</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="blog.php">BLOG</a></li>
            </ul>
            <div class="user-info">
                 <?php
                    session_start();

                    if (isset($_SESSION['user_name'])) 
                    {
                        echo '<span class="reg_user">Welcome, ' . htmlspecialchars($_SESSION['user_name']) . '!</span>&ensp;&ensp;&ensp;&ensp;';
                        echo '<div class="profile-btn" style="margin-right:20px;"><i class="fas fa-user-circle"></i></div>';  
                    }
                    else 
                    {
                        echo '<span class="visitor">Welcome, Visitor</span>&ensp;&ensp;&ensp;&ensp;';
                        echo '<a href="signin.php" class="sign-in-btn">Sign In</a>';
                    }
            ?>
            <br>
            <div class="profile-menu hidden">
            <ul>
                <li><a href="feedback.php">My Account</a></li>
                <li><a href="viewfeedback.php">Feedback</a></li>
                <li><a href="sessionreg.php">Registered Sessions</a></li>
                <li><a href="signout.php">Log Out</a></li>
            </ul>
        </div>
     </div>
     <button class="hamburger" onclick="toggleNav()">&#9776;</button>
        </nav>
    </header>
</body>
</html>
