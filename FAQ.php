<!--Sewni-->

<?php
require "config.php";
?>

<!DOCTYPE html>
<html>
<head>
   
    
    
    <title>FIT-GO | FAQ</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <link rel="stylesheet" href="style/styles.css">
    <script src="js/trans.js"></script>
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

     </nav>


     <!--Please add ur conetnt here-->
	 <div class="faq-hero"></div>
		<div class="faq-page">
			<div class="faq-container">
				<h2>Frequently Asked Questions</h2><hr>
				<h3>What are you looking for?</h3>
				<div class="faq-q&a">
					<ol>
						<li>What types of fitness training do you offer?</li>
						<p>We offer personal training, group classes, online coaching, and specialized programs such as strength training, weight loss, and functional fitness.</p>
						<li>How do I get started with a personal training program?</li>
						<p>Simply fill out the contact form on our website or call me directly. We’ll schedule an initial consultation to discuss your goals, fitness level, and create a tailored plan.</p>
						<li>Do you offer group training sessions?</li>
						<p>Yes, I offer group training sessions that focus on different fitness levels. These sessions foster a supportive community atmosphere while promoting accountability and motivation.</p>
						<li>What is your approach to nutrition and meal planning?</li>
						<p>Our approach to nutrition is personalized and science-based. We provide general guidelines and work with clients to create meal plans that align with their fitness goals and dietary preferences.</p>
						<li>How do you track progress and results?</li>
						<p>Progress is tracked through regular assessments, including fitness tests, body measurements, and personal feedback. We’ll review your progress together and adjust the program as needed.</p>
						<li>Do you offer virtual training options?</li>
						<p>Yes, We provide virtual training sessions via video conferencing platforms like Zoom, allowing you to train from the comfort of your home.</p>
						<li>What is your cancellation and rescheduling policy?</li>
						<p>We require at least 24 hours' notice for cancellations or rescheduling. If you miss a session without notice, it will be counted as a completed session.</p>
						<li>How long are the training sessions?</li>
						<p>Training sessions typically last 60 minutes, but we can adjust the duration based on your preferences and schedule.</p>
						<li>Are your training sessions suitable for beginners?</li>
						<p>Yes, We work with clients of all fitness levels, including beginners. Each program is tailored to ensure it meets your current abilities while helping you progress safely.</p>
						<li>How can I stay motivated throughout my fitness journey?</li>
						<p>Staying motivated is key! We encourage setting realistic goals, tracking progress, and mixing up your workouts to keep things fresh. Regular check-ins and support from us will also help you stay on track.</P>
						<li>How long will it take to see results?</li>
						<p>Results vary based on individual goals, commitment, and starting point. Many clients begin to notice improvements within a few weeks, but significant changes may take several months. Consistency and dedication are key!</p>
						<li>What happens if I miss a training session?</li>
						<p>If you miss a training session, it will be counted as completed unless you provide 24 hours' notice to reschedule. We can always adjust your training plan to make up for missed sessions in other ways.</p>
						
				</div>	
			</div>	
		</div>				
					
	 
<!-- Footer -->
    
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
	 