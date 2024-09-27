<?php

require "config.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>FIT-GO | Terms & Conditions</title>
<link rel="stylesheet" href="style/styles.css">

    <script src="js/trans.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <script src="js/fitgojs.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"><!--to use font awesome library via cdn ,we need it for social media icons in footer-->
    
    <style>
	
  .terms-hero{
		background-image: url('img/termsPic.jpg');
		background-repeat: no-repeat;
		display: flix;
		background-size:cover;
	}

	.terms-page {
		width: 80%;
		margin: 10px auto;
		padding: 20px;
	}	
	
	.terms-hero h2 {
		padding: 100px 100px;
		font-size: 58px;
		text-align: center;
		color: #DEB887;
	}	

	.terms-content h3 {
		font-size: 22px;
		color: #000000;
	}
	
	.terms-content li {
		font-size: 20px;
		color: #000000;
	}

	.terms-content p {
		font-size: 20px;
		color: #000000;
	}	
	
	</style>

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

<!--Edit this hero-section according to ur page-->
    </header>

    
     <!--Please add ur conetnt here-->
  <div class="terms-hero" style=height:300px;>
	<h2>Terms and Conditions</h2>
	</div>
		<section class="terms-page">
			<div class="terms-content">
					<h3>INTRODUCTION</h3>
					<p>Welcome to FITGO! These terms and conditions outline the rules and regulations for the use of our website services. By accessing or using our services, you will agree to comply with these terms.</p>
					<h3>ACCEPTANCE OF TERMS</h3>
					<p>By accessing or using FITGO, you acknowledge that you have read and understood and agree to be bound by these terms. If you do not agree with any part of these terms, you must not use our services. Your continued use of our website constitutes acceptance of any changes made to these terms.</p>
					<h3>SERVICES OFFERED</h3>
					<p>We provide fitness training services, including personal training, group classes, nutrition advice and online resources. These services are intended for informational and educational purposes only and should not replace professional medical advice.</p>
					<h3>USER RESPONSIBILITIES</h3>
					<ul>
						<li>User must not engage in any unlawful activity while using our services.</li>
						<li>You are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account.</li>
						<li>You agree to use our services in a manner that compiles with all applicable laws and regulations.</li>
					</ul>
					<h3>LIMITATION OF LIABILITY</h3>
					<P>Our website is not liable for any injuries, damages or losses incurred while using our services. You acknowledge taht you should consult with a phisician before starting any fitness program and that you participate at your own risk.</p>
					<h3>PAYMENT AND REFUND POLICY</h3>
					<ul>
						<li>All payments for services must be made in advance unless otherwise agreed upon.</li>
						<li>Refunds are subject to out refund policy, which may vary based on the service provided.</li>
						<li>Prices are subject to change, and user will be notfied of any changes before the billing cycle.</li>
					</ul>
					<h3>TERMINATION OF SERVICE</h3>
					<p>We reserve the right to suspend or terminate your access to our services at our discretion, without notice, for conduct that we believe violates these terms and conditions or is harmful to other users.</p>
					<h3>INTELLECTUAL PROPERTY</h3>
					<p>All content on this website including texts, graphics, logos and images is the property of FITGO and is protected by copyright and other intellectual property laws. You may not reproduce, distribute or modify any content without prior written consent.</p>
					<h3>MODIFICATION TO TERMS</h3>
					<p>We may revise these terms and conditions anytime. Changes will be effective immediately upon posting on this page. It is your responsibility to review these terms periodically.</p>
					<h3>GOVERNING LAW</h3>
					<p>These terms and conditions are governed by and constructed in accordance with the laws of Sri Lanka. Any disputes arries fro these terms shall be resolved in the appropriate courts in Sri Lanka.</p>
					<h3>CONTACT INFORMATION</h3>
					<p>If you have any questions about these terms and conditions, please contact us at fitgo@gmail.com.</p>
					<h3>CONCLUSION</h3>
					<p>By using our website and services, you acknowledge that you have read, understood and agreed to these terms and conditions.</p>
			</div>	
  </section>

	

     


















     









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
