<?php
    session_start();
 ?>



<!DOCTYPE html>
<html>
<head>
    <title>Account Creation</title>
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
            margin-top:10px;
            color:red;
            min-height:50px; 
        }
        .signin
        {
            background-color: black;
            color:white;
            padding:10px;
            border-radius:5px;
            cursor: pointer;
            font-size:15px;
            margin-top: 10px;
            border: none;
        }
        .signin:hover
        {
            background-color: red;

        }
        #username
        {
            
            font-weight: bold;
        }

    </style>
    <script>
       
        function step4()
        {
            
            document.getElementById("status").innerHTML = "Successfully updated your password !";
            document.getElementById("username").style.display = "none";
            document.getElementById("load").style.display = "none";

            



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
            
            
           

          

            function loadsignin()
            {
                window.location.href = "signin.php";
                
            }
            setTimeout(loadsignin,3000 );
            
          


        }
        
        function showsteps()
        {
            
            setTimeout(step4 , 1000);

        }
        

        window.onload = showsteps();
    </script>
</head>
<body>
   

    <div class="container">
        <h2 id="status" class="status">Updating your password !</h2>
        <?php
             
            if(isset($_SESSION['username']))
            {
                $username = "For User name : ". $_SESSION['username'];
                echo "<div id='username' class='username'>". $username . '</div>';
                
            }
            else
            {
                $username = "For User name : [ERROR]";
                echo "<div id='username' class='username'>". $username . '</div>';
            }
        ?>
        <h2 id="message" class="message"></h2>
        <div class="load" id="load"></div>
        <div class="timer" id="timer"></div>
    

</div>
</body>

</html>


