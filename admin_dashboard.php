<?php

    session_start();
    require 'config.php';

    

    $sql = 'SELECT username , profile_pic FROM admins';

    $result = $con->query($sql);
    
    if($result->num_rows > 0 )
    {
        while($row = $result->fetch_assoc())
        {
            if($row['username'] == $_SESSION['username'] )
            {
                $imageurl = $row['profile_pic'];
                $imageurl_msg = "profile pic found";
            }
            else
            {
                $imageurl_msg = "profile pic not found";
            }
        }
    }


    //getting the trainer count
    $sql_trainer = 'SELECT count(*) as total_trainers from trainer';

    $resulttt = $con->query($sql_trainer);
    $rowtt = $resulttt->fetch_assoc();
    $total_trainers = $rowtt['total_trainers'];


    //getting the client count
    $sql_client = 'SELECT count(*) as total_clients from client';

    $resultct = $con->query($sql_client);
    $rowct = $resultct->fetch_assoc();
    $total_clients = $rowct['total_clients'];





?>





<!DOCTYPE html>
<html>
<head>
   
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style/styles.css">
    <script src="js/trans.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Add Chart.js CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"><!--to use font awesome library via cdn ,we need it for social media icons in footer-->
    <style>
        .container
        {   
            display: flex;
            max-width: 1200px;
            padding: 20px;
        }
        .admin_info
        {
            margin-top: 100px;
            margin-left:20px;
            width: 300px;
            background-color: #2c3e50;
            color:white;
            border-radius: 10px; 
            box-shadow: 0 3px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            text-align: center;
            position: relative;
        }
        .profile
        {
            margin-top:20px;
            width: 120px;
            height: 120px;
            border-radius: 100px;
            border: 3px solid white;
        }
        #myPieChart{
            margin-top:100px;
            width: 250px;
            height: 250px;
            display: block;
            margin-left:auto;
            margin-right:auto;
            border-radius: 30px;
            border-width: 30px;
        }
      
        .forms {
            margin-top: 100px;
            margin-left: 30px;
            padding: 20px;
            width: 500px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input
        {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;

    }

    .chart
    {
        width:400px;
        padding: 30px;
    }

    

     </style>   
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><img class="logo" src="img/logo.png"></a>
            <ul class="navbuttons">
                <li><a href="#" class="active">HOME</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">SESSIONS</a></li>
                <li><a href="#">TRAINERS</a></li>
                <li><a href="contact.html">CONTACT US</a></li>
                <li><a href="#">BLOG</a></li>
            </ul>
            <div class="user-info">
                 <?php
                   
                    if (isset($_SESSION['user_name'])) 
                    {
                        echo '<span class="reg_user">Welcome, ' . htmlspecialchars($_SESSION['user_name']) . '!</span>&ensp;&ensp;&ensp;&ensp;';
                        echo '<div class="profile-btn"><i class="fas fa-user-circle"></i></div>';  
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
                <li><a href="edit-profile.php">Edit Profile</a></li>
                <li><a href="account-settings.php">Account Settings</a></li>
                <li><a href="signout.php">Log Out</a></li>
            </ul>
        </div>
     </div>
     </nav>
 </header>
<!--Edit this hero-section according to ur page-->

 
<div class="container">
    <div class="admin_info">
        <img class="profile" src="<?php echo $imageurl ?>" alt = "<?php echo $imageurl_msg ?>">
        <h3>Administrator Account</h3>
        <p><?php echo 'User Name : ' . $_SESSION['username'] ?></p>
    </div>

<div class="chart">
    <canvas id="myPieChart" ></canvas> <!--Externally -->
  
            <fieldset>
        <legend>Add Session</legend>
        <form action="" method="post">
            
            <input type="text" name="session_name" id="session_name" placeholder="Session Name" required>

            <input type="time" name="session_time" id="session_time" placeholder="Session Time"required>

            <input type="text" name="trainer_name" id="trainer_name" placeholder="Trainer Name" maxlength="100" required>

            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="Price"  required>

            Date of Session
            <input type="date" name="session_date" id="session_date" required>
            <textarea name="description" id="description" rows="4" placeholder="Session description" maxlength="255" required></textarea>

            <button type="submit" name="add_session">Add Session</button>
        </form>
    </fieldset>
                </div>
  
    <div class="forms">
            <fieldset>
                <legend>Add Admin</legend>
                <form action="" method="post">
                    <input type="text" name="fname" placeholder="First Name"  required>
                    <input type="text" name="lname" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Admin Email" required>
                    <input type="tel" name="phone" placeholder="Phone" pattern="[0-9]{10}" placeholder="Phone number" required>
                    <input type="password" name="password" placeholder="Admin Password" required>

                    Profile Picture</label>
                    <input type="file" name="profile_pic"  required>

                    <input type="submit" name="admin_submit" Value="Add Admin">
                    <div id="message"></div>
                </form>
            </fieldset>
            <fieldset>
        <legend>Change Phone Number</legend>
        <form action="" method="post">
    
            <input type="text" name="username1" id="username1" placeholder="Enter Username / Email" required>

            <input type="tel" name="old_phone" id="old_phone" placeholder="Old Phone Number" pattern="[0-9]{10}"  required>

            <input type="tel" name="new_phone" id="new_phone" placeholder="New Phone Number" pattern="[0-9]{10}"  required>

            <button type="submit" name="change_phone">Change Phone Number</button>
        </form>
    </fieldset>
    <fieldset>
                <legend>Delete Account</legend>
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Enter UserName / Email" required>

                    <input type="submit" name="delete_account" Value="Delete Account">
                    <div id="message"></div>
                </form>
            </fieldset>

        </div>

















    

    <!--code extracted to display the graphs-->
    <script>
        // Pass PHP data to JavaScript
        var total_clients = <?php echo json_encode($total_clients); ?>;
        var total_trainers = <?php echo json_encode($total_trainers); ?>;

        // Create Pie Chart
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie', // Specify the chart type
            data: {
                labels: ['Clients', 'Trainers'], // Labels for the pie slices
                datasets: [{
                    data: [total_clients, total_trainers], // Data from the database
                    backgroundColor: ['#3498db', '#e74c3c'], // Colors for the slices
                }]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    </script>



    

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
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">FAQ</a></li>
            </ul>
          </div>
          
          <div class="footer-sec menu">
            <h4>Menu</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Sessions</a></li>
              <li><a href="#">Trainers</a></li>
              <li><a href="#">About Us</a></li>
            </ul>
          </div>
          
          <div class="footer-sec newsletter">
            <h4>Subscribe</h4>
            <form>
              <input type="email" placeholder="mail@example.com" required>
              <button type="submit">Subscribe</button>
            </form>
            <br>
            <p style="text-align:justify;">FIT-GO is the best and easiest website where anyone can plan their fitness journey with a wide
            range of benefits offered under fair packages.</p>
            <img src="img/logo.png" alt="Logo" class="footer-logo">
          </div>
        </div>
        <div class="footer-bottom">
          <p>© FITGO | All Rights Reserved</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </footer>
      
    

    
    
    
</body>
</html>
