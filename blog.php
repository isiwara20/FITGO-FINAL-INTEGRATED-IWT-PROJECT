<?php

session_start();
require 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
   
    <title>FIT-GO | Blog</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <link rel="stylesheet" href="style/styles.css">
   
    <script src="js/fitgojs.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"><!--to use font awesome library via cdn ,we need it for social media icons in footer-->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
  <style>
h1{
  font-size: 48px;
  text-align: center;
  font-family: Arial, sans-serif;
  text-decoration: underline;
}
.blogh1
{
  margin-top: 100px;
}
.box1{
  border-color: rgb(8, 8, 8);
  border-style:solid;
  border-width: 1px;
  padding: 5px;
  margin-top: 100px;
  margin-left: auto;
  margin-right: auto;
  max-width: 800px;
  box-shadow: 0 0 10px rgba(249, 165, 9, 0.534);
  text-align: center;
  background-color: rgb(147, 150, 147);
}

.News-heading{
  font-size: 30px;
  font-family: Arial, sans-serif;
  margin-top: 0px;
}

.email {
  width: 80%; /* Set width of the input field */
  padding: 10px;
  margin-right: 10px; /* Space between input and button */
}

.emailform{
  display: flex;
  flex-direction: row; /* Change to row to align items horizontally */
  justify-content: center; /* Center items horizontally */
  align-items: center; /* Align items vertically */
  max-width: 100%;    /* Allow it to take full width */
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #1d1d1d;
  border-radius: 5px;
}

.emailbutton{
  width: 20%;
  padding: 10px;
  background-color: #000000;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #e9980d;
}


.message{
  text-align: center;
  font-size: 18px;
  margin-top: 10px;
  color: rgb(0, 0, 0);
}

/*Blog Box*/
.blog-box {
  display: flex;
  flex-direction: row;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 0 12px rgba(12, 12, 12, 0.468);
  padding: 20px;
  margin: 40px 0;
  background-color: #fff;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
  
}

.blog-image {
  max-height: 300px;
  width: 400px;
  border-radius: 5px;
  object-fit: cover;
  margin-right: 20px;
}

.blog-content {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  flex-grow: 1;
  text-align: left;
}

.blog-title {
  font-size: 30px;
  margin: 0;
  color: #333;
  margin-top: 0%;
  font-family: Arial, sans-serif;
}

.blog-meta {
  font-size: 18px;
  color: #777;
  margin-top: 5px;
  margin-bottom: 0;
  padding: 0;
}

.meta-item {
  margin-right: 50px;
  display: inline-block;
}

.meta-item i {
  margin-right: 5px;
  color: #555;
}

.blog-snippet {
  font-size: 16px;
  color: #555;
  margin: 5px 0;
  font-family: Arial, sans-serif;
}

.read-more {
  text-decoration:underline;
  color: #000000;
  font-weight: bold;
  display: inline-block;
}

.read-more:hover {
  text-decoration: none;
  color: #e9980d;
}
</style>



</head>
<body id="body2">

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
                <li><a href="index.php">HOME</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
                <li><a href="sessions.php">SESSIONS</a></li>
                <li><a href="train.php">TRAINERS</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="blog.php"  class="active">BLOG</a></li>
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
</header>


<!--CODINF-->


<h1 class="blogh1">Fitness Blog</h1>
<p class="normal">Your source for workout suggestions, healthy lifestyle tips, fitness advice, and more.</p>

<div class="box1">
    <h3 class="News-heading">Subscribe to our weekly News Letter</h3>
    <p class="message">Be updated with the latest fitness updates<br> and be the first to know about the latest offers!!</p>
    <form class="emailform" action="/submit-email" method="POST">
        <input type="email" id="email" class="email" placeholder="Enter your email" required>
        <button type="submit" class="emailbutton">Subscribe</button>
    </form>
</div>

<div class="blog-box">
    <img src="img/diet.jpeg" alt="Blog Image" class="blog-image">

    <div class="blog-content">
        
        <div class="blog-meta">
            <span class="meta-item">
                <i class="fas fa-user"></i> Coach Nipun
            </span>
            <span class="meta-item">
                <i class="fas fa-calendar-alt"></i> September 23, 2024
            </span>
            <span class="meta-item">
                <i class="fas fa-tags"></i> Diet
            </span>
            <hr>
        </div>
        <h3 class="blog-title">Balanced Diet – Foods to Eat and Avoid</h3>

        <p class="blog-snippet">
        A balanced diet is key to maintaining a healthy weight and good health. It goes without saying that your body needs all the nutrients from foods to function correctly, such as carbohydrates, protein, fats, minerals, and vitamins
        </p>
        
        <a href="google.com" class="read-more">Read more &rarr;</a>
    </div>
</div>

<div class="blog-box">
    <img src="img/sugar.jpg" alt="Blog Image" class="blog-image">

    <div class="blog-content">
        
        <div class="blog-meta">
            <span class="meta-item">
                <i class="fas fa-user"></i> Coach Oshana
            </span>
            <span class="meta-item">
                <i class="fas fa-calendar-alt"></i> September 3, 2024
            </span>
            <span class="meta-item">
                <i class="fas fa-tags"></i> diet
            </span>
            <hr>
        </div>
        <h3 class="blog-title">Why We Should Eat Less Sugar</h3>

        <p class="blog-snippet">
            If there could be just one piece of dietary advice to give anyone to improve their general health and well-being it would be this – EAT LESS SUGAR!
            Deciding to cut back on your added sugar intake is no easy task. After all, it can hide in many different foods and beverages including savoury items.
        </p>
        
        <a href="google.com" class="read-more">Read more &rarr;</a>
    </div>
</div>

<div class="blog-box">
    <img src="img/running.jpg" alt="Blog Image" class="blog-image">

    <div class="blog-content">
        
        <div class="blog-meta">
            <span class="meta-item">
                <i class="fas fa-user"></i> Coach Kusal
            </span>
            <span class="meta-item">
                <i class="fas fa-calendar-alt"></i> August 29, 2024
            </span>
            <span class="meta-item">
                <i class="fas fa-tags"></i> Fitness
            </span>
            <hr>
        </div>
        <h3 class="blog-title">10 amazing benefits of running</h3>

        <p class="blog-snippet">
        Running can do wonders for your strength, fitness, mental wellbeing and lifespan – and there's no better time to start running than now

        </p>
        
        <a href="google.com" class="read-more">Read more &rarr;</a>
    </div>
</div>





























                 
<!-- FOtter -->
    
<footer>
        <div class="footer-container">
          <div class="footer-sec contact">
            <h4>Contact us</h4>
            <p><i class="fas fa-phone-alt"></i>  +94 70 612 5515</p><br>
            <p><i class="fas fa-envelope"></i>  fitgo@gmail.com</p><br>
            <p><i class="fas fa-map-marker-alt"></i>  Headoffice - Malabe</p>
          </div>
          
          <div class="footer-sec about">
            <h4>About Us</h4>
            <ul>
              <li><a  href="Terms.php">Terms & Conditions</a></li>
              <li><a  href="privacypolicy.php">Privacy Policy</a></li>
              <li><a  href="FAQ.php">FAQ</a></li>
            </ul>
          </div>
          
          <div class="footer-sec menu">
            <h4>Menu</h4>
            <ul>
              <li><a  href="index.php">Home</a></li>
              <li><a  href="sessions.php">Sessions</a></li>
              <li><a  href="train.php">Trainers</a></li>
              <li><a  href="aboutus.php">About Us</a></li>
            </ul>
          </div>
          
          <div class="footer-sec newsletter">
            <h4>Subscribe</h4>
            <form method="post" action="">
              <input type="email" name="news" placeholder="mail@example.com" required>
              <button type="submit" name="newsbutton">Subscribe</button>
             <?php
              
              if(isset($_POST["newsbutton"]))
            {

            $news = $_POST["news"];
            $sqlnew = "INSERT INTO newsline (email) VALUES ('$news')";

            if($con->query($sqlnew))
            { 
                echo "<script>alert('Successfully Subscribed')</script>";
            }
        }

        $con->close();
        ?>
            </form>
            <br>
            <div style="display:flex;">
            <img src="img/logo.png" alt="Logo" class="footer-logo">
            <p style="text-align:justify;">FIT-GO is the best and easiest website where anyone can plan their fitness journey with a wide
            range of benefits offered under fair packages.</p>
            
    </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>© FITGO | All Rights Reserved</p>
          <div class="social-icons">
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
            <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </footer>
      
</body>
</html>