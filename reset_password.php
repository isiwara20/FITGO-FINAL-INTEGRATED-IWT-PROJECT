<!--Isiwara-->


<?php
    session_start();
    require 'config.php';

    //Directory given by the sms gateway providers
    require __DIR__ . '/shoutoutlabs/shoutout-sdk/autoload.php';

    //given by the gatway providers
    use Swagger\Client\ShoutoutClient;
    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiIxZDgwOTQ5MC02MTE4LTExZWYtOWEzYi04OTc0YjdjNWE1YWQiLCJzdWIiOiJTSE9VVE9VVF9BUElfVVNFUiIsImlhdCI6MTcyNDM5NDE2NywiZXhwIjoyMDM5OTI2OTY3LCJzY29wZXMiOnsiYWN0aXZpdGllcyI6WyJyZWFkIiwid3JpdGUiXSwibWVzc2FnZXMiOlsicmVhZCIsIndyaXRlIl0sImNvbnRhY3RzIjpbInJlYWQiLCJ3cml0ZSJdfSwic29fdXNlcl9pZCI6IjU3NTI2MCIsInNvX3VzZXJfcm9sZSI6InVzZXIiLCJzb19wcm9maWxlIjoiYWxsIiwic29fdXNlcl9uYW1lIjoiIiwic29fYXBpa2V5Ijoibm9uZSJ9.HM0SnP5ndIr2owXfNEjGK9b0kLHb4rkgEStaYxbKmZE';
    $client = new ShoutoutClient($apiKey, true, false);

    
    if(isset($_POST['submit']))
    {
                
    $credential = $_POST['credential'];

    $otp = rand(1000 , 9999);
    $_SESSION["otp"] = $otp;


    $sqlc = 'SELECT username,email ,  phone  FROM client';
    $sqlt = 'SELECT username,email ,  phone  FROM trainer';
    $sqla = 'SELECT username,email ,  phone  FROM admins';

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
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone'] = $row['phone'];
                    $access = true;
                    //whatsapp send api and sms gateway added 1
                    whatsappotp($_SESSION["username"] , $_SESSION["phone"], $otp);
                    sendOtp($client , $_SESSION["username"], $_SESSION["phone"] , $otp);
                    header("Location: reset_password_otp_verify.php");
                    exit();
                }
                else
                {
                    $access=false;
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
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone'] = $row['phone'];
                    $access = true;
                    //whatsapp send api and sms gateway added 1
                    whatsappotp($_SESSION["username"] , $_SESSION["phone"], $otp);
                    sendOtp($client , $_SESSION["username"], $_SESSION["phone"] , $otp);
                    header("Location: reset_password_otp_verify.php");
                    exit();
                }
                else
                {
                    $access=false;
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
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $access = true;

                //whatsapp send api and sms gateway added 1
                whatsappotp($_SESSION["username"] , $_SESSION["phone"], $otp);
                sendOtp($client , $_SESSION["username"], $_SESSION["phone"] , $otp);
                header("Location: reset_password_otp_verify.php");
                exit();
            }
            else
            {
                $access=false;
            }


        }
    }


    
    if($access == false)
    {
        $error = "Wrong email or username. Please try again";
    }

    }



    //for resending the otp 
    if(isset($_POST["resend"]))
    {
        $otp = rand(1000 , 9999);
        $_SESSION["otp"] = $otp;

        header("Location: reset_password_otp_verify.php");

        //whatsapp send api and sms gateway added 1
        whatsappotp($_SESSION["username"] , $_SESSION["phone"], $otp);
        sendOtp($client , $_SESSION["username"], $_SESSION["phone"] , $otp);
    }

    



    function whatsappotp($fname , $phoneNumber, $otp_number)
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
        'templateCode' => '79d7873a582042b1',
        'variables' => [$fname, $otp_number], // "var1", "var2", "var3"
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
    
    



    //function given by the sms gateway providers
function sendOtp($client, $uname , $phoneNumber, $otp_number) {
    // Add country code if missing
    if (substr($phoneNumber, 0, 1) === '0') {
        $phoneNumber = '+94' . substr($phoneNumber, 1);
    } elseif (substr($phoneNumber, 0, 1) !== '+') {
        $phoneNumber = '+94' . $phoneNumber;
    }

    $message = array(
        'source' => 'FITGO',
        'destinations' => [$phoneNumber],
        'content' => array(
            'sms' => 'Hi! ' .$uname . ' Your OTP for password reset is ' . $otp_number
        ),
        'transports' => ['SMS']
    );

    try {
        $result = $client->sendMessage($message);
        echo json_encode(['status' => 'success', 'message' => 'SMS sent successfully!']);
    } catch (Exception $e) {
        // Log error to file
        error_log('Error sending SMS: ' . $e->getMessage(), 0);
        echo json_encode(['status' => 'error', 'message' => 'Exception when sending message: ' . $e->getMessage()]);
    }
}
    


?>

<!DOCTYPE html>
<html>
    <head>
        <title>FIT-GO | Reset Password</title>
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

            #credential
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

            .back
            {
                width: 100%;
                text-align : center;
                font-weight: bold;
                text-decoration:none;
            }
            #info
            {
                font-size:12px;
            }
           

        </style>

    </head>
    
    <body>

        <div class="container">
           
        <div class="form_container">
        <center>
                <img src="logo.jpg" alt="LOGO" width="100">
            </center>
            <h2>Forgotten your password</h2>

            <p id="info">Please enter your email address or username to find phone number to initailly send OTP SMS to start recovering your account. </p>
            <form method="post" action="">  
                <input type="text" id="credential" name="credential" required placeholder="Email or Username" value = "<?php if(isset($credential)) { echo $credential; }else{ echo '';} ?>">
                <input type="submit" id="submit" name="submit" value="Send OTP"><br>
                <div class="back"><a  href="signin.php" target="_self">Back to Sign In</a></div>

                <div id="messages"> </div>
            </form>
     
            <?php if(isset($error)) ?>
            <script>
                document.getElementById("messages").innerText = "<?php echo $error; ?>";
                document.getElementById("credential").value = "";

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