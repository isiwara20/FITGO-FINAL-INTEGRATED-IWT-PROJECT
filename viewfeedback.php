<?php
session_start();
require "config.php";// Start session to store feedback status

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve feedback form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $experience = $_POST['experience'];
    $improvements = $_POST['improvements'];

    // Handle the feedback (e.g., store in database, send email)
    // Set session variable to indicate feedback submission
    $_SESSION['feedback_submitted'] = true;
}
?>

<<!DOCTYPE html>
<html>
<head>
   
    <title>FIT-GO | Feedback</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="style/feedback.css">
   
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
                <li><a href="aboutus.php">ABOUT US</a></li>
                <li><a href="sessions.php">SESSIONS</a></li>
                <li><a href="train.php">TRAINERS</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="blog.php">BLOG</a></li>
            </ul>
            <div class="user-info">
                 <?php
                 

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
</head>


   




<br><br><br><br><br><br><br><br>

    <!-- Feedback Section -->
    <div class="profile-details feedback-section" id="feedbackSection">
        <h2>We Value Your Feedback!</h2>
        <p>Your thoughts and opinions are essential to help us improve your experience at Fit Go. Please take a moment to share your feedback!</p>
        
        <form method="POST" action="">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="experience">How was your experience with Fit Go?</label>
            <textarea id="experience" name="experience" rows="4" required></textarea>

            <label for="improvements">What improvements would you suggest?</label>
            <textarea id="improvements" name="improvements" rows="4"></textarea>

            <button type="submit" class="save-btn"onclick="window.location.href='viewfeedback.php'">Submit Feedback</button>
        </form>
    </div>

    <!-- Show 'View Feedback' button if feedback has been submitted -->
    <?php
    if (isset($_SESSION['feedback_submitted']) && $_SESSION['feedback_submitted']) {
        echo '<div class="view-feedback">';
        echo '<button onclick="window.location.href=\'view_feedback.php\'" class="view-btn">View Feedback</button>';
        echo '</div>';
    }
    ?>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
