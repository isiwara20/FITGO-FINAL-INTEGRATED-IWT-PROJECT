<!--Isiwara-->


<!DOCTYPE html>
<head>
     <title>FIT-GO | Verifying Code</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
    <style>
        body
        {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            color: #333;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container 
        {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width:400px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            
            
        }

        h2 
        {
            color: #333;
            margin-bottom: 20px;
        }

        p 
        {
            font-size: 16px;
            color: #666;
        }

        #otp 
        {
            padding: 10px;
            width: 80%;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            font-weight:bold;
            color: #333;
            text-align: center;
            letter-spacing: 8px;
            
        }

        #confirm_account {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            
        }

        #modify
        {
            background-color: black;
        }

        #confirm_account:hover {
            background-color: red;
        }

        #timer 
        {
            font-size: 16px;
            margin-top: 15px;
            color: green;
            min-height:30px;
        }

        form 
        {
            margin-bottom: 15px;
        }
        #error
        {
            color: red;
        }
        


    </style>
    <script>
    
        var countvalue = 10;

        function countdown()
        {
            document.getElementById("timer").innerHTML = "( " + countvalue + " )" + " Resend Code";
            countvalue = countvalue - 1;

            //remove countdown when time up and add resent button
            if(countvalue == 0)
            {
                document.getElementById("timer").innerHTML = '<form method="post" action="process_signup.php"> <input style="padding:5px ; background-color:blue; color:white; cursor:pointer; border-radius:4px; border:none; " type="submit" name="resend"  value="Resend the code"></form>';
                clearInterval(interval);
            }

            
        }

        //setting interval to display the timmer
        var interval = setInterval(countdown , 1000);
   

        //for hiding the error message of invalid code.
        window.onload = function()
        {

            if(document.getElementById('error'))
            {
                function disapear_error()
                {
                    document.getElementById('error').style.display = 'none';
                }

                setTimeout(disapear_error , 4000);
        }

        }
    </script>    
</head>
<body>
    <div class="container">
        <h2>Verify your Mobile Number</h2>
        <p>We sent the verification code to your moblie number.</p>
            
            
        <?php
            session_start();

            if(isset($_SESSION["phone"]))
            {
                
                echo "<div class='info'>Please enter the 4-digit code sent to <b>" . $_SESSION["phone"] ."</b> to activate your account." ;
                
            }
            else
            {
                echo "<div class='info'>Verification Code sent to [NOT SET]";
            }


            if(isset($_POST["confirm_account"]))
            {
        
                $entered_code = $_POST["code"];
        
                if($entered_code == $_SESSION["otp"])
                {
        
                    header("Location: accountcreate.php");
                }
                else
                {
                    $invalid_code = "Invalid Code. Please try again.";
                }
        
            }
            
        ?>
        <br><br>
        <form method="post">
            <input type="text" id="otp" name="code" required pattern="[0-9]{4}">
            <br>
            <input type="submit" id="confirm_account" name="confirm_account" value="Verify">
        </form>
        <?php
            if(isset($invalid_code))
            {
                echo "<div id='error' class='error'>". $invalid_code . '</div>';
            }
        ?>
        <a href="change_number.php" class='modify'>Modify Mobile Number</a>
        <div id="timer"></div>
        
      </div>
    </body>
</html>

