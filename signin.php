<!--Isiwara-->

<?php
    session_start();
    require 'config.php';
    
    if(isset($_POST['submit']))
    {
                
    $password = $_POST['inpassword'];
    $credential = $_POST['credential'];


    $sqlc = 'SELECT username , password , email , fname FROM client';
    $sqlt = 'SELECT username , password , email , fname , lname , d_status FROM trainer';
    $sqla = 'SELECT username , password , email , fname FROM admins';

    $resultc = $con->query($sqlc);
    $resultt = $con->query($sqlt);
    $resulta = $con->query($sqla);


    $access = false;

    //for client database
    if($resultc->num_rows>0)
    {
       while($row = $resultc->fetch_assoc())
        {
              if($row['username'] == $credential || $row['email'] == $credential )
                {
                    if($row['password'] == $password)
                    {
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['user_name'] = $row['fname'];
                        $_SESSION['user_role'] = 'Client';
                        header("Location: index.php");
                        
                        $access = true;
                        exit();
      

                    }
                    else
                    {
                        $access = false;
                    }
                    break;
                }


        }
    }




    //for trainer database
    if($resultt->num_rows>0)
    {
       while($row = $resultt->fetch_assoc())
        {
              if($row['username'] == $credential || $row['email'] == $credential )
                {
                    if($row['password'] == $password)
                    {
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['user_name'] = $row['fname'];
                        $_SESSION['fullname'] = $row['fname'] . ' ' . $row['lname']; 
                        $_SESSION['user_role'] = 'Trainer';
                        $access = true;

                        if($row['d_status'] == 0)
                        {

                            header("Location: trainer_account_details.php");
                            exit();
                        }
                        else
                        {
                            header("Location: index.php");
                            exit();
                        }
                        
                        
      

                    }
                    else
                    {
                        $access = false;
                    }
                    break;
                }


        }
    }



    //for admin database
    if($resulta->num_rows>0)
    {
       while($row = $resulta->fetch_assoc())
        {
              if($row['username'] == $credential || $row['email'] == $credential )
                {
                    if($row['password'] == $password)
                    {
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['user_name'] = $row['fname'];
                        $_SESSION['user_role'] = 'Trainer';
                        $access = true;
                        header("Location: admin_dashboard.php");
                        exit();
      

                    }
                    else
                    {
                        $access = false;
                    }
                    break;
                }


        }
    }







    
    if($access == false)
    {
        $error = "Wrong password or username";
    }

    }


    //for admin database


    $con->close();


?>

<!DOCTYPE html>
<html>
    <head>
        <title>FIT-GO | Sign In</title>
        <link rel="icon" type="image/x-icon" href="img/logobk.png">
        <style>
            body
            {
                font-family: 'Arial', sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;         
                background-color: #f4f4f4;
                margin: 0;
                font-size: 14px;
                height: 100vh;
            }

            .container 
            {
                display: flex;
                width: 100%;
                max-width: 1000px;
                border-radius: 18px;
                margin-top: 20px;
                margin-bottom: 20px;
                overflow:hidden;   /*To activate border radius visible*/
                background-color: white;
            }

            .image_section 
            {
                width: 65%;
                background-image: url('img/signin.jpg');
                background-size: cover;
                background-position: left;
                padding: 40px;
                color: #fff;
                text-align: right;
            }

            .image_section h3
            {
                margin-top: 90px;
                font-size:27px;
                font-weight:bold;
            }

            .image-section p
            {
                font-size:15px;
                text-align: center;;
            }

        

            .form_container 
            {
                width: 35%;
                background-color: #fff;
                padding: 60px 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                
            }


            h2 
            {
                color: #333;
                font-size: 22px;
                margin-bottom: 25px;
                font-weight: 700;
            }

            #credential, #inpassword
            {
                width: 100%;
                padding: 12px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 14px;
                color: #333;

            }
            input.error 
            {
                background-color: rgb(255, 171, 184);
            } 

            #submit 
            {
                width: 100%;
                display: block;
                background-color: #736d00;
                color: white;
                padding: 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
                margin-top: 20px;
                margin-right: auto;
                margin-left: auto;
                
            }

            #submit:hover 
            {
                background-color: #6d01f9;
            }
            a 
            {
                color:  #736d00;
                text-decoration: none;
                font-size: 14px;
            }

            a:hover 
            {
                text-decoration: underline;
            }

            #messages
            {
                width: 100%;
                text-align: center;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 14px;
                color: red;
                margin-top:5px;
                min-height: 20px;
              
            }
            .rolespace
            {
                margin-top: 5px;
                margin-left: 50px;
            }

            .signin_message
            {
                color: #000000;
            }
            
            .signin_button
            {
                margin-top: 100px;
                text-align:center;
                color:white;
                background-color: rgb(28, 30, 26);
                padding: 12px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 15px;
                text-decoration: none;
                
            }
            .signin_button:hover
            {
                text-decoration: none;
                background-color: #fdf9f9;
                color: #000000;
                font-weight: bold;

            }

            .reset_password
            {
                width: 100%;
                text-align : center;
            }


        
        </style>

    </head>
    
    <body>

        <div class="container">
            <div class="image_section">
            <a href="index.php"><img src="img/logo.png" style="width:50px;"></a>
                
                <div class="display">
                    <h3>Transform Your Health</h3>
                    <p>Join with us and get you goals achieved. <br>Your Fitness journey begins here...</p>
                    
                    <div class="signin_message">Not registered yet? <br>Click the button below to sign up:</div><br><br>
                    <a href="signup.html" class="signin_button">Sign Up</a>
                </div>


        </div>

        <div class="form_container">
            
            <h2>Sign In</h2>
            <form method="post" action="">
               
                <input type="text" id="credential" name="credential" required placeholder="Email or Username" value = "<?php if(isset($credential)) { echo $credential; }else{ echo '';} ?>">
                
                <input type="password" id="inpassword" name="inpassword" required placeholder="Password">
                <br>
                
          
                <input type="submit" id="submit" name="submit" value="Sign In"><br>
                
               
                <div class="reset_password"><a  href="reset_password.php" target="_blank">Forgotten your username or password</a></div>
                <div id="messages"></div>
            </form>
     
            <?php if(isset($error)) ?>
            <script>
                document.getElementById("messages").innerText = "<?php echo $error; ?>";
                document.getElementById("inpassword").value = "";

                function emptypassword()
                {
                    document.getElementById('messages').innerText = "";
                }

                setTimeout(emptypassword , 2000);
            </script>
            <?php ?>

            
        </div>
    </div>

    </body>

</html>