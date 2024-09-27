<?php
require "config.php";

?>
<!DOCTYPE html>
<html>
<head>
   
    
<title>FIT-GO | Tutorial</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <link rel="stylesheet" href="style/styles.css">
    <script src="js/fitgojs.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"><!--to use font awesome library via cdn ,we need it for social media icons in footer-->
   <style>

    
.tutorial-heading{
  font-size: 30px;
  text-align: center;
  text-decoration:double;
}

.tutorial-para{
  font-size: 20px;
  text-align: center;
}

.container-tutorial {
  display: flex;
  justify-content: space-between;
  padding: 20px;
}

.box-tutorial {
  background-color: white;
  border-radius: 10px;
  border: #000000;
  width: 30%;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
  text-align: center;
  margin-left: 100px;
  margin-right: 100px;
  margin: 0%;
}

.box-tutorial:hover {
  transform: translateY(-10px);
}

.box-tutorial img {
  width: 100%;
  border-radius: 10px;
}

#t-p{
  font-size: 1.2rem;
  margin-top: 15px;
}

#t-p {
  font-size: 0.9rem;
  margin: 15px 0;
  color: #555;
}

.tutorial-button {
  background-color: #ffd000;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  color: #000000;
}

.tutorial-img{
  max-width: auto;
  max-height: 250px;
}

.tutorial-button:hover {
  background-color: #ffb800;
}


h1{
  font-size: 48px;
  text-align: center;
  font-family: Arial, sans-serif;
  text-decoration: underline;
}


</style>

</head>
<body id="body3">
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
                <li><a href="sessions.php" class="active">SESSIONS</a></li>
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

<br><br><br><br>
<h1>Tutorials</h1>
<p class="normal">Connect with expert trainers while enjoying the freedom of solo workouts! Whether you’re into HIIT, yoga, or strength training, our platform offers personalized sessions to fit your lifestyle. Join our supportive community and unleash your potential—every workout is an empowering experience!</p>

        <div>
            <hr>
            <h2 class="tutorial-heading">Legs</h2>
            <p class="tutorial-para">Ready to build strong, beautiful legs? Join us in this exciting workout where we’ll show you simple yet powerful exercises to tone your thighs, calves, and glutes.</p>

            <div class="container-tutorial">
                <div class="box-tutorial">
                  <img class="tutorial-img" src="img/calf raise.jpg" alt="Nutrition Coaching">
                  <h3 id="t-h">Calves</h3>
                  <p id="t-p">In this detailed video tutorial, you’ll learn the proper technique for performing calf raises—an essential exercise for building lower leg strength and definition. Watch as our expert trainer demonstrates step-by-step how to engage the right muscles, improve your balance, and increase flexibility.</p>
                  <a href="google.com " target="_blank" class="tutorial-button">Watch the tutorial</a>
                </div>
            
                <div class="box-tutorial">
                  <img class="tutorial-img" src="img/Hamstrings.jpg" alt="ABC Trainerize">
                  <h3 id="t-h">Hamstrings</h3>
                  <p id="t-p">In this comprehensive video tutorial, we’ll explore the fundamentals of hamstring exercises, focusing on techniques that enhance strength and flexibility. Our experienced trainer will guide you through a variety of effective movements, emphasizing proper form and muscle engagement to prevent injuries</p>
                  <a href="google.com " target="_blank" class="tutorial-button">Watch the tutorial</a>
                </div>
            
                <div class="box-tutorial">
                  <img class="tutorial-img" src="img/thighs.jpg" alt="Video Coaching">
                  <h3 id="t-h">Thighs</h3>
                  <p id="t-p">In this engaging video tutorial, we dive into the essentials of thigh exercises, designed to sculpt and strengthen your lower body. Our expert trainer will demonstrate a range of targeted movements, focusing on form, alignment, and optimal muscle activation to maximize results.</p>
                  <a href="google.com " target="_blank" class="tutorial-button">Watch the tutorial</a>
                </div>
              </div>
        </div>

        <div></div>
            <hr>
            <h2 class="tutorial-heading">Abdominal</h2>
            <p class="tutorial-para">Want to sculpt a strong and defined core? Dive into this energizing workout designed to target your abdominal muscles! We’ll guide you through a series of fun and effective exercises that will strengthen your core, enhance your balance, and improve your overall fitness.</p>

            <div class="container-tutorial">
                <div class="box-tutorial">
                  <img class="tutorial-img" src="img/plank.jpeg" alt="Nutrition Coaching">
                  <h3 id="t-h">Plank</h3>
                  <p id="t-p">In this comprehensive video tutorial, we explore the fundamentals of the plank exercise, a cornerstone for building core strength and stability. Our experienced trainer will guide you through the correct form, variations, and tips to effectively engage your abdominal muscles and improve overall body posture. </p>
                  <a href="google.com " target="_blank" class="tutorial-button">Watch the tutorial</a>
                </div>
            
                <div class="box-tutorial">
                  <img class="tutorial-img" src="img/flutter kicks.jpg" alt="ABC Trainerize">
                  <h3 id="t-h">Flutter Kicks</h3>
                  <p id="t-p">In this engaging video tutorial, we dive into the flutter kicks exercise, an excellent way to target your lower abs and improve core strength. Join our expert trainer as they demonstrate the correct technique, key tips for maintaining proper form, and variations to challenge yourself at different fitness levels.</p>
                  <a href="google.com " target="_blank" class="tutorial-button">Watch the tutorial</a>
                </div>
            
                <div class="box-tutorial">
                  <img class="tutorial-img" src="img/cycling crunch.jpg" alt="Video Coaching">
                  <h3 id="t-h">Cycling Crunch</h3>
                  <p id="t-p">In this informative video tutorial, we explore cycling crunches, a fantastic exercise for sculpting your abs and improving core stability. Our expert instructor will guide you through the proper technique, emphasizing the importance of controlled movements and breathing.</p>
                  <a href="google.com " target="_blank" class="tutorial-button">Watch the tutorial</a>
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