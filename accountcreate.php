<!--Isiwara-->

<?php
    session_start();
 ?>



<!DOCTYPE html>
<html>
<head>

    <title>FIT-GO | Account Create</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <style>
        body
        {
            font-family:'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;            
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            
        }
        .container
        {
            background-color: #ffffff;
            padding: 45px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
       
        #status
        {
            margin-bottom: 20px;
            font-size: 22px;
            color: red;
        }
        #message
        {
            font-size:16px;
            color: green;
            margin-bottom: 32px;
        }
        .load
        {
            border: 5px solid #f3f3f3;
            border-top: 4px solid red;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: rotate 1s linear infinite;
            margin: 20px auto; 
            
        }
        @keyframes rotate
        {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .timer
        {
            font-size: 14px;
            margin-top:21px;
            color:red;
            min-height:30px; 
        }
        .signin
        {
            background-color: black;
            color:white;
            padding:10px;
            border-radius:5px;
            cursor: pointer;
            font-size:15px;
            margin-top: 15px;
            border: none;
        }
        .signin:hover
        {
            background-color: red;

        }
        #username
        {
            display: none;
            font-weight: bold;
        }

    </style>
    <script>
       
        function step1()
        {
            
          
            document.getElementById("status").innerHTML = "Code is successfully verified !";
            document.getElementById("message").innerHTML = "We are creating your username";
        }
        function step2()
        {
            var d = new Date();
            var getday = d.getDate() + ' / ' + d.getMonth() + ' / ' + d.getFullYear();

            document.getElementById("status").innerHTML = "Successfully created your user name !";
            document.getElementById("username").style.display = "block";

            document.getElementById("message").innerHTML = "We are creating your account on " + getday + " (Today)";


        }

        function step3()
        {
            document.getElementById("username").style.display = "none";
            document.getElementById("status").innerHTML = "Creating your account is successful!";
            document.getElementById("message").innerHTML = "We are preparing your dashboard. <br> please wait..";

        }
        function step4()
        {
            
            document.getElementById("status").innerHTML = "All done!";
            document.getElementById("message").innerHTML = "Congratulations! <br>Your account is succesfully created.<br><span style='font-size:14px'> We are in the process of sending your username to you via SMS and Whatsapp. ";
            
            


            function displayredirect()
            {
                document.getElementById('load').style.display = 'none';
                document.getElementById("message").innerHTML = "<span style='font-size:14px; color:black;'>Redirecting you to sign-in page..</span>";

                //display the timer and button to direct to sign in page
                var countvalue = 5;
            
                function countdown()
                {
                    document.getElementById("timer").innerHTML = "( " + countvalue + " )" + " If not redirected automatically.";
                    countvalue = countvalue - 1;

                if(countvalue <= 0 )
                {
                    document.getElementById("timer").innerHTML = "<button type='button' class='signin' onclick=\"window.location.href='signin.html'\">Sign In</button>";
                    clearInterval(interval);
                }

                }

                var interval =  setInterval(countdown , 1000);
            
            }
            setTimeout(displayredirect , 3000);

          

            function loadsignin()
            {
                document.getElementById('sendUsernameForm').submit();
                
            }
            setTimeout(loadsignin,6000 );
            
          


        }
        
        function showsteps()
        {
            setTimeout(step1 , 1400);

            setTimeout(step2 , 3000);

            setTimeout(step3 , 7500);

            setTimeout(step4 , 10000);

        }
        

        window.onload = showsteps();
    </script>
</head>
<body>
   

    <div class="container">
        <h2 id="status" class="status">Verifying your code...</h2>
        <?php
             
            if(isset($_SESSION['username']))
            {
                $username = "Your User name : ". $_SESSION['username'];
                echo "<div id='username' class='username'>". $username . '</div>';
                
            }
            else
            {
                $username = "Your User name : [ERROR]";
                echo "<div id='username' class='username'>". $username . '</div>';
            }
        ?>
        <h2 id="message" class="message">We are verifying you code, please wait..</h2>
        <div class="load" id="load"></div>
        <div class="timer" id="timer"></div>

            <!-- to send the username as sms when sending display on screen-->
        <form id="sendUsernameForm" action="process_signup.php" method="POST">
             <input type="hidden" name="sendusername" id="sendusername" value="1">
        </form>

</div>
</body>

</html>


