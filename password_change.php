<!--Isiwara-->

<?php
 session_start();

 require 'config.php';

 if(isset($_POST['submit']))
 {

    
    $sqlc = 'SELECT username , password , email  FROM client';
    $sqlt = 'SELECT username , password , email  FROM trainer';
    $sqla = 'SELECT username , password , email  FROM admins';

    $resultc = $con->query($sqlc);
    $resultt = $con->query($sqlt);
    $resulta = $con->query($sqla);


    //$email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $newpassword = $_POST['password'];
    $cnewpassword = $_POST['cpassword'];

    $passwordsame = false;
   
    if($newpassword !== $cnewpassword)
    {
       $error = "Password Not Match";
       

    }
    else
    {

        if($username[9] == 'c')
        {   
            if($resultc->num_rows>0)
            {
               while($row = $resultc->fetch_assoc())
                {
                      if($row['username'] == $username)
                        {
                            if($row['password'] != $newpassword)
                            {

                                $update_sql = "UPDATE client set password = '$newpassword' where username = '$username'";
                                if($con->query($update_sql))
                                {
                                    $passwordsame = false;
                                    whatsapppasswordchange($username , $_SESSION["phone"]);
                                    header("Location: password_change_success.php");

                                }



                            }
                            else
                            {
                                $passwordsame = true;
                            }

                            

                        }
        
        
                }
            }
        
    
        }
        if($username[9] == 't')
        {

            if($resultt->num_rows>0)
            {
               while($row = $resultt->fetch_assoc())
                {
                      if($row['username'] == $username )
                        {
                            if($row['password'] != $newpassword)
                            {

                                $update_sql = "UPDATE trainer set password = '$newpassword' where username = '$username'";
                                if($con->query($update_sql))
                                {
                                
                                    $passwordsame = false;
                                    whatsapppasswordchange($username , $_SESSION["phone"]);
                                    header("Location: password_change_success.php");


                                }



                            }
                            else
                            {
                                $passwordsame = true;
                            }

                            

                        }
        
        
                }
            }


        }
        if($username[9] == 'a' )
        {
            if($resulta->num_rows>0)
            {
               while($row = $resulta->fetch_assoc())
                {
                      if($row['username'] == $username || $row['email'])
                        {
                            if($row['password'] != $newpassword)
                            {

                                $update_sql = "UPDATE admins set password = '$newpassword' where username = '$username'";
                                if($con->query($update_sql))
                                {
                                    $passwordsame = false;
                                    whatsapppasswordchange($username , $_SESSION["phone"]);
                                    header("Location: password_change_success.php");
                                }
                               

                            

                            }
                            else
                            {
                           
                                $passwordsame = true;
                            
                            }
        
        
                }
            }




        }







    }

   
    if($passwordsame == true)
    {
        $error1 = "New password matches. Enter a different password.";
        
    }


    




    }
 }



 
function whatsapppasswordchange($uname , $phoneNumber)
{

     // Add country code if missing and ensure the final format is in 947xxxxxxx
if (substr($phoneNumber, 0, 1) === '0') {
    // Remove the leading '0' and add country code
    $phoneNumber = '94' . substr($phoneNumber, 1);
} elseif (substr($phoneNumber, 0, 2) !== '94') {
    // If no country code, prepend '94'
    $phoneNumber = '94' . $phoneNumber;
}

// Ensure the number does not have any '+' signs
$phoneNumber = preg_replace('/\+/', '', $phoneNumber);

// API endpoint
$url = 'https://panel.whatsflow.xyz/api/client/send-template-message';

// Data to be sent in the POST request
$data = [
    'templateCode' => 'ad12e377c6dfdc48',
    'variables' => [$uname], // "var1", "var2", "var3"
    'number' => $phoneNumber // Use the formatted phone number here
];

// Convert data to JSON
$jsonData = json_encode($data);

// Bearer token
$token = '82ce92cf7bafea19ddc9576beaa59fb6dfad2199f47ce3d2184dc1322e740a30'; // Replace this with your actual token

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json'
]);

// Execute the request and capture the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Decode and display the response
    $responseData = json_decode($response, true);
    print_r($responseData);
}

// Close cURL session
curl_close($ch);

}

 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
        <link rel="icon" type="image/x-icon" href="logo.png">
        <style>
            body
            {
                font-family: 'Arial', sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;         
                background-color: #f4f4f4;
                margin: 0;
                height: 100vh;
            }

            .container 
            {
                display: flex;
                max-width: 400px;
                width: 100%;
                padding: 40px;
                border-radius: 18px;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
                text-align:center;
                background-color: white;
                overflow: hidden;
                height: auto;
            }

            .form_container 
            {
                width: 100%;
                background-color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: center;
                margin-top: 5px;
                margin-bottom: 5px;
                
            }

            h2 
            {
                color: #333;
                font-size: 22px;
                margin-bottom: 10px;
                font-weight: 700;
            }

            #password , #cpassword
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
                font-size: 14px;
                margin-top: 20px;
                margin-right: auto;
                margin-left: auto;
                cursor:not-allowed;
                opacity:0.5;
                
                
            }
            .submit_pass
            {
                width: 100%;
                display: block;
                background-color: #736d00;
                color: white;
                padding: 12px;
                border: none;
                border-radius: 4px;
                font-size: 14px;
                margin-top: 20px;
                margin-right: auto;
                margin-left: auto;
                cursor:pointer;
                opacity:1;

            }

            #submit:hover 
            {
                background-color: #6d01f9;
            }

            a 
            {
                color:  blue;
                text-decoration: none;
                font-size: 14px;
            }

            a:hover 
            {
                color:red;
            }

            #messages
            {
                width: 100%;
                text-align: center;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 14px;
                margin-top: 10px;
                color: red;
                min-height: 20px;
              
            }
           
            .back
            {
                width: 100%;
                text-align : center;
                font-weight: bold;
                text-decoration:none;
            }
            .info
            {
                font-size:13px;
            }
            .invalid
            {
                color: red;
            }
            .valid
            {
                color:green;
            }
           
            .password-container
            {
                display: flex;
               
                align-items:flex-start;
             
            }
            .inputs
            {
                margin-top:20px;
                display:flex;
                flex-direction: column;
                width: 55%; 
            }
            .passwordcheck
            {
                list-style-type: none;
                margin-top:15px;
                text-align: left;
                width: 45%;
            }
            .passwordcheck li
            {
                padding: 2px;
            }

           

        </style>
        <script>
            function checkstandard()
                {
                    var password = document.getElementById("password").value;

                    var len = false;
                    var up = false;
                    var low = false;
                    var no = false;

                    //check password length
                    if(password.length >= 8)
                    {
                        len = true;
                        document.getElementById('length').className = "valid";
                    }
                    else
                    {
                        document.getElementById('length').className = "invalid";


                    }

                    
                    //to check uppercase
                    for(var x = 0 ; x < password.length ; x++)
                    {
                        if(password[x] >= 'A' && password[x] <= 'Z')
                        {
                            up = true;
                            document.getElementById('uppercase').className = "valid";
                            break;
                        }
                        else
                        {
                            document.getElementById('uppercase').className = "invalid";

                        }
                    }

                    //to check lowercase
                    for(var x = 0 ; x < password.length ; x++)
                    {
                        if(password[x] >= 'a' && password[x] <= 'z')
                        {
                            low = true;
                            document.getElementById('lowercase').className = "valid";
                            break;
                        }
                        else
                        {
                            document.getElementById('lowercase').className = "invalid";

                        }
                    }


                    //to check a number in password
                    for(var x=0; x < password.length ; x++)
                    {
                        if(password[x] >= 1 && password[x] <= 9)
                        {
                            no = true;
                            document.getElementById('num').className = "valid";
                            break;
                        }  
                        else
                        {
                            document.getElementById('num').className = "invalid";

                        } 
                    }


                    if(len == true && up == true && low == true && no == true)
                    {
                        document.getElementById("submit").disabled = false;
                        document.getElementById("submit").style.cursor = "pointer";
                        document.getElementById("submit").style.opacity = "1";                        


                    }
                    else
                    {
                        document.getElementById("submit").disabled = true;
                        document.getElementById("submit").style.cursor = "not-allowed";
                        document.getElementById("submit").style.opacity = "0.5";

                    }


                }
        </script>

    </head>
    
    <body>

        <div class="container">
           
        <div class="form_container">
        <center>
                <img src="logo.jpg" alt="LOGO" width="100">
            </center>
            <h2>Reset your Password</h2>
          

            <?php
           
            if(isset($_SESSION["username"]))
            {
                
                echo "<div class='info'>Please enter new password for " . $_SESSION["username"] ."</b> to reset your account." ;
                
            }
            else
            {
                echo "<div class='info'>Please enter new password for [NULL] </b> to reset your account." ;
            }


?>
            <form method="post" action="">  
            <div class="password-container">
                <div class="inputs">
                    <input type="password" id="password" name="password" required placeholder="New Password" value = "<?php if(isset($password)) { echo $password; }else{ echo '';} ?>"   onkeyup = "checkstandard()">
                    <input type="password" id="cpassword" name="cpassword" required placeholder="Re-enter New Password">
                </div>


                <div class="passwordcheck">
                    <ul>
                        <li class="invalid" id="length">Atleast 8 characters</li>
                        <li class="invalid" id="uppercase">Atleast one uppercase letter</li>
                        <li class="invalid" id="lowercase">Atleast one lowercase letter</li>
                        <li class="invalid" id="num">Atleast one number</li>                
                    </ul>
                </div>
            </div>
                
                <input type="submit" id="submit" name="submit" value="Reset Password" disabled> <br>
                <div class="back"><a  href="signin.php" target="_self">Back to Sign In</a></div>

                <div id="messages"></div>
            </form>
     
            <?php if(isset($error)) {?>
            <script>
                document.getElementById("messages").innerText = "<?php echo $error; ?>";
                document.getElementById("cpassword").value = "";

                function emptypassword()
                {
                    document.getElementById('messages').innerText = "";
                }

                setTimeout(emptypassword , 2000);

            </script>
            <?php } ?>


            <?php if(isset($error1)) {?>
            <script>
                document.getElementById("messages").innerText = "<?php echo $error1; ?>";
                document.getElementById("cpassword").value = "";

                function emptypassword1()
                {
                    document.getElementById('messages').innerText = "";
                }

                setTimeout(emptypassword1 , 2000);

            </script>
            <?php } ?>

            
        </div>
    </div>

    </body>

</html>