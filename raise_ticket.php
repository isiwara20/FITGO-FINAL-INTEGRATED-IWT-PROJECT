<!--Indevarie-->

<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: signin.php"); // Redirect if not logged in
    exit();
}

// Initialize message variables
$successMessage = "";
$errorMessage = "";

// Connect to the database
include('config.php'); // Your database connection file

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $issue = $_POST['issue'];
    $uty = $_POST['utype'];
    $user_name = $_SESSION['user_name'];

    // Generate a unique ticket ID
    $random_number = mt_rand(100000, 999999); // Generate a 6-digit random number
    $id = $user_name . $random_number; // Combine username and random number

    // Insert ticket into the database
    $sql = "INSERT INTO tickets (id,Typee, user_name, email, phone, issue) 
            VALUES ('$id','$uty','$user_name', '$email', '$phone', '$issue')";

    if ($con->query($sql) === TRUE) {
        $successMessage = "Your ticket has been raised successfully!";
    } else {
        $errorMessage = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>FIT-GO | Manage Tickets</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <link rel="stylesheet" href="style/styles.css">
    <script src="js/trans.js"></script>
    <script src="js/fitgojs.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"><!--to use font awesome library via cdn ,we need it for social media icons in footer-->

    <style>
        bodyss
        {
            background-image:url('img/ui.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-position: center;
            margin:0;
            padding: 0; /* Scales the image to fit the viewport while maintaining its aspect ratio */
            
           
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
                <li><a href="contact.php" class="active">CONTACT US</a></li>
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



<script>
        function toggleNav() {
            const navLinks = document.getElementById('navbuttons');
            navLinks.classList.toggle('active');
        }
        
</script>
        
        
        <div class="contact-form" style="width: 500px; margin-top:80px; margin-bottom:80px;">
        <h3>Raise a ticket</h3>
   
        <form method="POST" action="raise_ticket.php">
        <p>Username: <?php echo $_SESSION['user_name']; ?></p>

        <div style="display: flex; align-items: center;">
    <label for="utype">I'm a:</label>
    <input type="radio" name="utype" id="trainer" value="trainer">
    <label for="trainer">Trainer</label>
    <input type="radio" name="utype" id="user" value="user">
    <label for="user">User</label>
</div>


        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required><br>

        <label for="issue">Issue:</label>
        <textarea name="issue" required></textarea><br>

        <button type="submit" class="btn submit">Submit</button>

        <?php
if ($successMessage) {
    echo "<p class='success-message'>$successMessage</p>";
    echo "<p><a href='manage_tickets.php' class='btn'>Click here to manage your tickets</a></p>";
} elseif ($errorMessage) {
    echo "<p class='error-message'>$errorMessage</p>";
}
?>

    </form>
</div>



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
