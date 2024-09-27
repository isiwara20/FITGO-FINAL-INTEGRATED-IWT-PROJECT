<?php
    require 'config.php';
    session_start();
    ?>

<!DOCTYPE html>
<html>
<head>
   
    <title>FIT-GO | Sessions</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <link rel="stylesheet" href="style/styles.css">
    <script src="js/fitgojs.js"></script>
    <script src="js/trans.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"><!--to use font awesome library via cdn ,we need it for social media icons in footer-->
    
    <style>
        
h1{
  font-size: 48px;
  text-align: center;
  font-family: Arial, sans-serif;
  text-decoration: underline;
}

.normal{
  font-size: 18px;
  text-align: center;
  font-family: Arial, sans-serif;
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
}
.tutorial-box {
  background-color: white;
  border-radius: 10px;
  width: 50%;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 20px;
  text-align: center;
  background: url('../img/background1.jpg') no-repeat center center fixed;
  background-size: cover; 
}

.tutorial-box:hover:hover {
  transform: translateY(-10px);
}

.tutorial-box img {
  width: 100%;
  border-radius: 10px;}


.tutorial-link {
  display: inline-block;
  color: #e9980d; /* Link color */
  font-weight: bold; /* Makes the link bold */
  font-size: 18px;
  background-color: #676767f8;
}
  
.tutorial-link:hover {
  color: #000000;
}

#Session{
  text-decoration: underline;
  text-align: center;
  margin-top: 0%;
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}


.search-container {
  display: flex;
  justify-content: center; /* Horizontally centers the search bar */
}

.search-bar {
  width: 250px; /* Width of the search bar */
  padding: 10px; /* Space inside the search bar */
  font-size: 18px; /* Font size of the input text */
  border: 2px solid #ccc; /* Border around the input */
  border-radius: 5px; /* Rounded corners */
}

.search-button {
  padding: 10px 20px; /* Padding around the button */
  background-color: #000000; /* Button background color */
  color: white; /* Button text color */
  border: none; /* Remove default border */
  border-radius: 5px; /* Rounded corners for the button */
  cursor: pointer; /* Pointer cursor on hover */
  margin-bottom: 30px;
}

.search-button:hover {
  background-color: #e9980d; /* Darker shade of blue on hover */
}

.box{
  border-color: rgb(8, 8, 8);
  border-style:solid;
  border-width: 1px;
  padding: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  background-color: #ffffff;
  max-width: 1300px;
  margin-left: auto;
  margin-right: auto;
  border-radius: 15px;
  margin-bottom: 30px;
}

.container {
  display: flex; /* Aligns the image and text side by side */
  align-items: center; /* Vertically aligns items (optional) */
  height: auto;
  width: 100%;
  max-height: 350px;
}

.Upper{
  width: 400px;
  height: auto;
  margin-left: 0;
  margin-right: 50px;
}

.text{
  font-size: 18px;
  font-family: Arial, sans-serif;
  margin-bottom: 10px;
  max-width: 500px;
  margin-right: 50px;
}

.sessionB{
  text-decoration: none;
  display: inline-block;
}

.sessionBContent{
  text-align: justify;
  padding: 10px;
  background-color: #040404;
  color: #ccc;
  font-size: 18x;
  transition: background-color 0.3s ease;
  border-radius: 10px;
  font-family: 'Times New Roman', Times, serif;
}

.sessionBContent:hover{
  background-color: #e9980d;
  cursor: pointer;
}

.icon p {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  font-family:Arial, sans-serif ;
}

.icon i {
  margin-right: 30px; /* Adds spacing between the icon and the text */
  color: #333; /* Icon color (you can change it to fit your design) */
}

.coach-link {
  text-decoration: none;
}

.coach-button {
  margin-top: 15px;
  padding: 10px 15px;
  background-color: #040404;
  color: #ccc;
  border-radius: 10px;
  text-align: center;
  transition: background-color 0.3s ease;
}

.coach-button:hover {
  background-color: #e9980d;
  cursor: pointer;
}


</style>
</head>
<body id="body1">
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
                <li><a href="sessions.php" class="active">SESSIONS</a></li>
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

</header>





<br><br><br>


<h1>Online Sessions</h1><br>
<p class="normal">Connect with expert trainers while enjoying the freedom of solo workouts! Whether you’re into HIIT, yoga, or strength training, our platform offers personalized sessions to fit your lifestyle. Join our supportive community and unleash your potential—every workout is an empowering experience!
</p>

<div class="tutorial-box">
    <h2>Learn By Yourself</h2>
    <p class="normal">Working out alone gives you the freedom to set your own pace, focus entirely on your goals, and enjoy the privacy of exercising on your terms. Build strength, stay motivated, and achieve your best without distractions!</p>
    <a href="tutorial.php" target="_blank" class="tutorial-link">Tutorials<i class="fas fa-arrow-right"></i></a>
</div>

<h2 id="Session">Available Sessions</h2>

<div class="search-container">
    <form action="search" method="GET">
        <input type="text" placeholder="Search Coach/Session" name="query" class="search-bar">
        <button type="submit" class="search-button">Search</button>
      </form>
</div>

<div class="box">
    <div class="container">
        <img src="img/img1.jpg" alt="UpperBody" class="Upper">
            <div class="text">
               <h3>Upper Body Session</h3>
               <hr>
               <p>Perfect for building strength and definition without needing bulky equipment!
                 Get professional guidance, ensuring proper form and maximizing results—all from the comfort of home</p>
                <a href="" class="sessionB">
                    <div class="sessionBContent">
                        Register
                    </div>
                </a>
             </div>
             <div class="icon">
                <p><i class="fas fa-user"></i> Coach Nipun</p>
                <p><i class="fas fa-calendar-alt"></i>  9th October 2024</p>
                <p><i class="fas fa-clock"></i>  10:00 AM - 11:00 AM</p>
                <p><i class="fas fa-dollar-sign"></i>  Rs 2,500</p>
                <a href="https://coachwebsite.com" target="_blank" class="coach-link">
                    <div class="coach-button">Learn more about the Coach</div>
                </a>
            </div>
    </div>    
</div>

<div class="box">
    <div class="container">
        <img src="img/img2.jpg" alt="UpperBody" class="Upper">
            <div class="text">
               <h3>Lower Body Session</h3>
               <hr>
               <p>Perfect for building strength and definition without needing bulky equipment!
                 Get professional guidance, ensuring proper form and maximizing results—all from the comfort of home</p>
                <a href="" class="sessionB">
                    <div class="sessionBContent">
                        Register
                    </div>
                </a>
             </div>
             <div class="icon">
                <p><i class="fas fa-user"></i> Coach Oshana</p>
                <p><i class="fas fa-calendar-alt"></i>  4th October 2024</p>
                <p><i class="fas fa-clock"></i>  10:00 AM - 11:00 AM</p>
                <p><i class="fas fa-dollar-sign"></i>  Rs 2,500</p>
                <a href="https://coachwebsite.com" target="_blank" class="coach-link">
                    <div class="coach-button">Learn more about the Coach</div>
                </a>
            </div>
    </div>    
</div>

<div class="box">
    <div class="container">
        <img src="img/img3.jpg" alt="UpperBody" class="Upper">
            <div class="text">
               <h3>Abdominal Session</h3>
               <hr>
               <p>Perfect for building strength and definition without needing bulky equipment!
                 Get professional guidance, ensuring proper form and maximizing results—all from the comfort of home</p>
                <a href="blog.php" class="sessionB" >
                    <div class="sessionBContent">
                        Register
                    </div>
                </a>
             </div>
             <div class="icon">
                <p><i class="fas fa-user"></i> Coach Kusal</p>
                <p><i class="fas fa-calendar-alt"></i>  24th September 2024</p>
                <p><i class="fas fa-clock"></i>  10:00 AM - 11:00 AM</p>
                <p><i class="fas fa-dollar-sign"></i>  Rs 2,500</p>
                <a href="https://coachwebsite.com" target="_blank" class="coach-link">
                    <div class="coach-button">Learn more about the Coach</div>
                </a>
            </div>
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
