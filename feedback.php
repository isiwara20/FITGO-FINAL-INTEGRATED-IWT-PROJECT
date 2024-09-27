
<?php

require "config.php";

?>


<!DOCTYPE html>
<html>
<head>
   
    <title>FIT-GO | Account</title>
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
</head>







    <!-- User Profile Section -->
    <div class="profile-container">
        <!-- Left Sidebar with Profile Navigation -->
        <div class="sidebar">
            <img src="img/profileimage.jpg" alt="Profile Image" class="profile-img" id="profileImg">
            <input type="file" id="profileImageInput" accept="image/*" style="display:none;">
           
            <h3>Amami Gunathilake</h3>
            <button class="sidebar-btn" onclick="showProfileDetails()">My Profile</button>
            <button class="sidebar-btn">Registered Sessions</button>
            <button class="sidebar-btn" onclick="showFeedbackForm()">Feedback</button>
            <button class="sidebar-btn">Sign Out</button>
        </div>

        <!-- Profile Details Section -->
        <div class="profile-details" id="profileDetails">
            <h2>Profile Details</h2>
            <form>
                <label>First Name:</label>
                <input type="text" value="Amami" disabled>
                
                <label>Last Name:</label>
                <input type="text" value="Gunathilake" disabled>

                <label>Gender:</label>
                <input type="radio" name="gender" value="Male" checked> Male
                <input type="radio" name="gender" value="Female"> Female

                <label>Date of Birth:</label>
                <input type="date" value="2002-08-03" disabled>

                <label>Mobile No.:</label>
                <input type="text" value="+94 7754567892" disabled>

                <label>Address:</label>
                <input type="text" value="428/4/D kadawatha" disabled>

                <label>Province:</label>
                <select disabled>
                    <option selected>Western</option>
                </select>

                <label>District:</label>
                <select disabled>
                    <option selected>Colombo</option>
                </select>

                <button type="button" class="edit-btn">Edit</button>
                <button type="button" class="save-btn" style="display:none;">Save Changes</button>
                <button type="button" class="cancel-btn" style="display:none;">Cancel</button>
            </form>
        </div>

        <!-- Password Section -->
        <div class="password-section" id="passwordSection">
            <h2>Password</h2>
            <form>
                <label>Current Password:</label>
                <input type="password">

                <label>New Password:</label>
                <input type="password">

                <label>Confirm New Password:</label>
                <input type="password">

                <button type="button" class="edit-btn">Edit</button>
                <button type="button" class="save-btn" style="display:none;">Save Changes</button>
                <button type="button" class="cancel-btn" style="display:none;">Cancel</button>
            </form>
        </div>

        <!-- Feedback Section -->
        <div class="profile-details feedback-section" id="feedbackSection" style="display:none;">
            <h2>We Value Your Feedback!</h2>
            <p>Your thoughts and opinions are essential to help us improve your experience at Fit Go. Please take a moment to share your feedback!</p>
            <form id="feedbackForm">
                <label for="name">Your Name:</label>
                <input type="text" id="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" required>

                <label for="experience">How was your experience with Fit Go?</label>
                <textarea id="experience" rows="4" required></textarea>

                <label for="improvements">What improvements would you suggest?</label>
                <textarea id="improvements" rows="4"></textarea>

                
                <button type="submit" class="save-btn"onclick="window.location.href='viewfeedback.php'">Submit Feedback</button>


            </form>
        </div>
    </div>

    <script src="js/script2.js"></script>

    <!-- Footer -->
    <?php
    include 'footer.php';
    ?>



</body>
</html>
