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
        if(!empty($_POST["agree"]))
        {
        //grabing data from sign up page and save it on sessions
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];

        //to convert 1st letter only to captial and keep other to lowercase
        $fname = ucfirst(strtolower($fname));
        $lname = ucfirst(strtolower($lname));



        $_SESSION["first_name"] = $fname;
        $_SESSION["last_name"] = $lname;
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["phone"] = $_POST["phone"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["c_password"] = $_POST["cpassword"];
        $_SESSION["account_type"] = $_POST["role"];

        //to genearate the otp with a random number and save it on sessions
        $otp = rand(1000 , 9999);
        $_SESSION["otp"] = $otp;


        $firstname = strtoupper($_SESSION["first_name"]); //t convert text to uppercase
        $lastname = strtoupper($_SESSION["last_name"]);

        $finitial = substr($firstname , 0 , 3);
        $linitial = substr($lastname , 0 , 2);
        
        $year = Date('y');

        $random_num = rand(10 , 99);

        if($_SESSION["account_type"] == 'client')
        {
            $username = $finitial.$linitial.$year.$random_num.'c';
        }
        else if($_SESSION["account_type"] == 'trainer')
        {
            $username = $finitial.$linitial.$year.$random_num.'t';

        }

       


        $_SESSION['username'] = $username;

        //whatsapp send api and sms gateway added 1
        whatsappotp($_SESSION["first_name"] , $_SESSION["phone"], $otp);
        sendOtp($client , $_SESSION["first_name"], $_SESSION["phone"] , $otp);

        header("Location: confirm.php");
        }
    }




    if(isset($_POST["resend"]))
    {
        $otp = rand(1000 , 9999);
        $_SESSION["otp"] = $otp;

       

        header("Location: confirm.php");

        //whatsapp send api and sms gateway added 1
        whatsappotp($_SESSION["first_name"] , $_SESSION["phone"], $otp);
        sendOtp($client , $_SESSION["first_name"], $_SESSION["phone"] , $otp);
    }


    if(isset($_POST["change_num_submit"]))
    {
        $_SESSION["phone"] = $_POST["change_num"];

        $otp = rand(1000 , 9999);
        $_SESSION["otp"] = $otp;

        header("Location: confirm.php");

        //whatsapp send api and sms gateway added 1
        whatsappotp($_SESSION["first_name"] , $_SESSION["phone"], $otp);
        sendOtp($client , $_SESSION["first_name"], $_SESSION["phone"] , $otp);
    }



    if(isset($_POST['sendusername']))
    {

        whatsappusername( $_SESSION["phone"], $_SESSION["username"]);
        sendUser($client , $_SESSION["phone"] , $_SESSION["username"]);


        //adding data to the database
        if( $_SESSION["account_type"] == 'client')
        {
            
            $sql = "INSERT INTO client (username,fname,lname,email,phone, password )VALUES('" . $_SESSION['username'] . "', '" . $_SESSION['first_name'] . "', '" . $_SESSION['last_name'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['phone'] . "', '" . $_SESSION['password'] . "')";

            if($con->query($sql))
            {
                echo "Successfully recorded";
            }
            else
            {
                echo $con->error;
            }

        }
        else if($_SESSION["account_type"] == 'trainer')
        {

            $sql = "INSERT INTO trainer(username,fname,lname,email,phone, password ,d_status ) VALUES('" . $_SESSION['username'] . "', '" . $_SESSION['first_name'] . "', '" . $_SESSION['last_name'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['phone'] . "', '" . $_SESSION['password'] . "','0')";

            if($con->query($sql))
            {
                echo "Successfully recorded";
            }
            else
            {
                echo $con->error;
            }


        }

        $con->close();
        
        header("Location: signin.php");

    }



//function given by the sms gateway providers
function sendOtp($client, $fname , $phoneNumber, $otp_number) {
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
            'sms' => 'Hi! ' .$fname . ' Please verify your mobile number by entering the code ' . $otp_number
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
    



//function given by the sms gateway providers
function sendUser($client, $phoneNumber, $uname) {
    // Add country code if missing
    if (substr($phoneNumber, 0, 1) === '0') {
        $phoneNumber = '+94' . substr($phoneNumber, 1);
    } elseif (substr($phoneNumber, 0, 1) !== '+') {
        $phoneNumber = '+94' . $phoneNumber;
    }

    $message = array(
        'source' => 'OSLOCAMPUS',
        'destinations' => [$phoneNumber],
        'content' => array(
            'sms' => 'Your account has been successfully created! Your username is: '.$uname
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
    


//to send otp the function given by whatsapp api providers
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
    'templateCode' => '4d78d4a960b9f105',
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




//to send username the function given by whatsapp api providers
function whatsappusername( $phoneNumber, $uname)
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
    'templateCode' => '044b4a3689cf160a',
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