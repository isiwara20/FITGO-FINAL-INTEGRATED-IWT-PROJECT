<!--Indevarie-->

<?php

require "config.php";

?>


<!DOCTYPE html>
<html>
<head>
   
    <title>FIT-GO | Home</title>
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
                <li><a href="index.php" class="active">HOME</a></li>
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
        <div class="hero-section" style="background-image: url('img/hi.jpg');background-size: cover;">
            <div class="hero-content">
                <h1>Fitness For Good <br>Health</h1>
                <p>Start your journey with our fitness trainers</p>
                <div class="buttons">
                    <a href="signup.html" class="btn join">Join Now</a>
                    <a href="contact.php" class="btn contact">Contact Us</a>
                </div>
            </div>
           
        </div>
    </header>
    
    <section class="welcome-section fly-in">
        <div class="container">
            <div class="welcome-image">
                <video autoplay loop muted>
                    <source src="img/hre.mp4" type="video/mp4">
                </video>
            </div>
            <div class="welcome-content">
                <h3>Learn About Us</h3>
                <h2>Welcome to FITGO</h2>
                <p>
                    Whatever your age, there's strong scientific evidence that being physically active can help you lead a healthier and happier life. People who exercise regularly have a lower risk of developing many long-term (chronic) conditions, such as heart disease, type 2 diabetes, stroke, and some cancers.
                </p>
                <p>We are the leading in the world..</p>
                <a href="blog.php" class="btn learn-more">Learn More</a>
            </div>
        </div>
    </section>

    <section class="bmi-calculator-section fly-in">
        <div class="bmi-container">
            <h2>BMI Calculator</h2>
            <form id="bmi-form">
                Height(IN):<br>
                <input type="text" id="height" name="height" required> <!-- Corrected id to "height" -->
                
                Weight(KG):<br>
                <input type="text" id="weight" name="weight" required> <!-- Corrected id to "weight" -->
                
                <button type="button" class="btn calculate" onclick="calbmi()">Calculate BMI</button>
                
                <div id="bmi-result" class="bmi-result"></div>
            </form>
            
        </div>
        
    </section><br><br>
    <center>
        <h1>Why us?</h1><br>
    </center>

    <section class="offer-section fly-in">
        
        <h1>We offer what you want</h1>
        <div class="offer-container">
            <div class="offer-card">
                <img src="img/icon1.png" alt="Icon 1">
                <h3>Heal emotions</h3>
                <p>Workouts help to release endorphins and improve mood,reduce stress,anxiety, and a variety of mental diseases.Help to better focus and mental clarity.</p>
            </div>
            <div class="offer-card">
                <img src="img/icon2.png" alt="Icon 2">
                <h3>Body Refreshes</h3>
                <p>Diffrent types of workouts increase the flexibility of body and range of motion joints,improve posture,refreshes body.</p>
            </div>
            <div class="offer-card">
                <img src="img/icon3.png" alt="Icon 3">
                <h3>Health</h3>
                <p>Regular well planned workouts help to maintain physical fitness and stamina.Help to maintain body weight and reduce risks of chronic diseases.</p>
            </div>
            <div class="offer-card">
                <img src="img/icon4.png" alt="Icon 3">
                <h3>Manages weight</h3>
                <p>Fitness workouts help to burn calories and promote fat loss.Reduce the risk of obesity from maintaining body weight in healthier level.</p>
            </div>
            <div class="offer-card">
                <img src="img/icon5.png" alt="Icon 3">
                <h3>Enhances immune</h3>
                <p>New moderate exercises boosts the immune system, help to fight with illnesses more effectively by enhancing the body immunity.</p>
            </div>
            <div class="offer-card">
                <img src="img/icon6.png" alt="Icon 3">
                <h3>Boosts self-esteem</h3>
                <p>Achieving fitness goals can enhance self esteem,self confident,attitude.Help to face to challanges fearlesly and successfuly.</p>
            </div>
          
        </div>
    </section>




    <section class="testimonial-section fly-in">
        <center>
            <h1>What our clients say</h3>
        </center>
    <div class="testimonial-container">
        <div class="testimonial-slide">
            <div class="testimonial">
                <img src="img/hi.jpg " alt="Client 3" style="width: 70px;height: 70px;">
                <p>"FitGO helped me reach my fitness goals! The trainers are top-notch, and the community is so supportive!"</p>
                <h4>- Jane Doe</h4>
            </div>
            <div class="testimonial">
                <img src="img/client.jpg" alt="Client 3"style="width: 85px;height: 70px;">
                <p>"The best fitness platform I've ever used. I love the personalized workouts and nutrition plans."</p>
                <h4>- John Smith</h4>
            </div>
            <div class="testimonial">
                <img src="img/client3.jpg" alt="Client 3" style="width: 70px;height: 70px;">
                <p>"Thanks to FitGO, I've lost 20 pounds and feel more energetic than ever!"</p>
                <h4>- Sarah Lee</h4>
            </div>
        </div>
    </div>
    </section>


    <br><br>
    <center>

    <img src="img/fat.jpg" style="width: 350px; height: 300px; border-radius: 160px;">
    <br><br>
    <h1>Start your journey today!</h1>
        </center>



    <section class="fitness-courses-section fly-in">
        <h2>Our Fitness Courses</h2>
        <div class="courses-container">
            <div class="course" id="meet-trainers">
                <img src="img/client3.jpg" alt="Client 3" style="width: 200px;height: 200px;">
                <h3>Meet Trainers</h3>
                <p>Discover our experienced trainers who are ready to help you achieve your fitness goals.</p>
            </div>
            <div class="course" id="yoga">
                <img src="img/ho.jpg" alt="Client 3" style="width: 200px;height: 200px;">
                <h3>Yoga</h3>
                <p>Join our yoga classes to improve flexibility, strength, and relaxation.</p>
            </div>
            <div class="course" id="for-kids">
                <img src="img/oo.jpg" alt="Client 3" style="width: 200px;height: 200px;">
                <h3>For Kids</h3>
                <p>Fun and engaging fitness activities designed specifically for children.</p>
            </div>
            <div class="course" id="for-elders">
                <img src="img/io.jpg" alt="Client 3" style="width: 200px;height: 200px;">
                <h3>For Elders</h3>
                <p>Gentle exercises and fitness routines tailored for older adults.</p>
            </div>
            <div class="course" id="for-athletes">
                <img src="img/jk.jpg" alt="Client 3" style="width: 200px;height: 200px;">
                <h3>For Athletes</h3>
                <p>Advanced training programs designed to enhance athletic performance.</p>
            </div>
            <div class="course" id="workout">
                <img src="img/kl.jpg" alt="Client 3" style="width: 200px;height: 200px;">
                <h3>Workout</h3>
                <p>High-intensity workout sessions to boost your fitness and strength.</p>
            </div>
            <div class="course" id="zumba">
                <img src="img/pp.jpg" alt="Client 3" style="width: 200px;height: 200px;">
                <h3>Zumba</h3>
                <p>Get your groove on with our fun and energetic Zumba classes.</p>
            </div>
        </div>
        <br><br>
        <center>
            <a href="train.php">
                <button class="train" type="button">Meet our trainers</button>
            </a>
        </center>
    </section>


    <section class="pricing-section fly-in" style="background-color: rgb(232, 228, 224); background-image: url('img/la.png');background-size: 400px;">
        <h1>See our Affordable pricing plans</h1>
        <div class="pricing-container">
            <div class="pricing-form">
                <h3>Gold</h3>
                <p>$19.99/month</p>
                <ul>
                    <li>Access to all basic features</li>
                    <li>5 workout plans</li>
                    <li>Community support</li>
                </ul>
                
            </div>
            <div class="pricing-form" style="background-color: rgb(172, 147, 117);">
                <h3>Bronze</h3>
                <p>$39.99/month</p>
                <ul>
                    <li>Access to all features</li>
                    <li>15 workout plans</li>
                    <li>Priority support</li>
                </ul>
                
            </div>
            <div class="pricing-form">
                <h3>Gold</h3>
                <p>$59.99/month</p>
                <ul>
                    <li>All features included</li>
                    <li>Unlimited workout plans</li>
                    <li>1-on-1 coaching</li>
                </ul>
               
            </div>
        </div>
        
    </section>



    <section id="trainers">
    <div class="section-title">
        <h2>Our Expert Trainers</h2>
        <p>Our expert trainers are here to guide you on your fitness journey.</p>
    </div>
    <div class="trainers-container">
        <?php
       
       

      
       $sql = "SELECT fname, lname, specialization  , country  FROM trainer";
       $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="trainer-card">';
                echo '<h3>' . $row['fname'] . ' ' . $row['lname'] . '</h3>';
                echo '<p>Country: ' . $row['country'] . '</p>';
                echo '<p>Specialization: ' . $row['specialization'] . '</p>';
                echo '</div>';
            }
        } else {
            echo "<div class='trainer p' style='text-align:center;'><p>No trainers available at the moment.</p></div>";
        }

        
        

       
        ?>
    </div>
</section>


















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
