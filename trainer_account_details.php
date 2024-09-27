<?php

    session_start();

    require 'config.php';


    if(isset($_POST['submit']))
    {

        $username = $_SESSION['username'];

        $dob = $_POST["dob"];
        $sex = $_POST['sex'];
        $country = $_POST["country"];
        $spec = $_POST["specialization"];
        $e_year = $_POST['exp'];
        $bio = $_POST['bio'];
        
        $target_dir = "userpic/";
        
    
        //$file_location = null;

        if (isset($_FILES['file'])) 
        {
            $target_file = $target_dir . basename($_FILES['file']['name']);
        

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file))
            {
                $file_location = $target_file;
            }
        }
        

        $sqlt = 'SELECT username , phone FROM trainer';

        $result = $con->query($sqlt);



        if($result -> num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if($row['username'] == $username)
                {
                    $update_sql = "UPDATE trainer set d_status = '1' , dob = '$dob' , country = '$country', gender = '$sex' , profile_pic = '$file_location' , specialization= '$spec' , e_years = '$e_year' , bio = '$bio'   where username = '$username'";
                    if($con->query($update_sql))
                    {
                        whatsapptcreate($row['username'] , $row['phone']);
                        header("Location: index.php");

                    }
                }
            }
        }
       
    }




    
 
function whatsapptcreate($uname , $phoneNumber)
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
    'templateCode' => 'a5f1692796ebe33b',
    'variables' => [$fname], // "var1", "var2", "var3"
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
        <title>Complete Trainer Profile</title>
        <style>
            body 
            {
                font-family: 'Poppins', sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
            }

            .container 
            {
                display:block;
                max-width: 500px;
                margin: 30px auto;
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }

            h1 
            {
                font-size:20px;
                text-align: center;
                color: #333;
            }

            h2 
            {
                font-size:18px;
                text-align: center;
                color: #333;
            }

            p 
            {
                font-size:14px;
                text-align: center;
                color: #666;
            }



            #step1
            {
                display:block;
            }

            #step2
            {
                display:none;
            }


            .logo
            {
                display:flex;
                justify-content: center;
            }
            .logo_img 
            {
                max-width: 150px;
            
            }

            .skip
            {
                width: 50%;
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
                text-transform: uppercase;
            }

            .skip:hover
            {
                background-color: #6d01f9;
            }

            #progress
            {
                font-weight: bold;
                color:#1d72b8;
            }
            #username, #name , #dob, #sex, #country , #specialization, #exp , #bio , #file
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

            #username , #name
            {
                background-color: #f4f4f9; 
            }
            .fdivider
            {
                display: flex;
                gap: 10px;
            }
            .f1
            {
                width: 50%;
            }
            .f2
            {
                width: 50%;
            }

            .button_container 
            {
                text-align: center;
                margin-top: 20px;
            }

            button 
            {
                cursor: pointer;
                padding: 12px 20px;
                background-color: #1d72b8;
                border: none;
                color: white;
                border-radius: 5px;
                font-size: 14px;
            
                margin: 10px 5px;
                transition: background-color 0.3s ease;
            }

            button:hover 
            {
                 background-color: #155a8a;
            }


       </style>
       <script>
            
            //to disappear step 1 and show step 2
            function stepsfront()
            {
                document.getElementById("skip").style.display = 'none';
                document.getElementById("progress").innerHTML = 'Step 2 of 2 (Qualifications)';
                document.getElementById("details").innerHTML = 'Please fill your career details to display your profile in our platform.';
                document.getElementById("step1").style.display = 'none';
                document.getElementById("step2").style.display = 'block';

                //to scroller to the top of the page
                window.scrollTo(top);
            }   


            //when going back disappear step 2 and appear step 1
            function stepsback()
            {
                
                document.getElementById("step1").style.display = 'block';
                document.getElementById("step2").style.display = 'none';

            }




       </script>


    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img class="logo_img" src="logo.jpg" alt="logo">
            </div>

            <h1>Welcome to FITGO</h1>
            <h2>Your journey as a fitness expert starts here!</h2>
            <p id='details'>Please complete the profile form below to display your profile in our platform. This is a one-time setup during your first login or you can skip this and continue in another login.<br><span style='font-weight:bold;'> You can edit your profile later if needed.</span></p>
            <button type="button" class="skip" id="skip" onclick="window.location.href='index.php'">Skip for Now</button>

            <div class="progress_bar">
                <p id="progress">Step 1 of 2 (Personal Information)</p>
            </div>

            <form method="post" action=""  enctype="multipart/form-data">
                <div id="step1">
    
                    User Name 
                    <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" readonly ><br>

                    Full Name 
                    <input type="text" id="name" name="name" value="<?php echo $_SESSION['fullname']; ?>" readonly ><br>

                    <div class="fdivider">
                        <div class="f1">
                        Date of Birth
                        <input type="date" id="dob" name="dob" required><br>

                        Gender
                        <select id="sex" name="sex" required>
                            <option value="" disabled selected>Select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        </div>
                        <div class="f2">
                            Country 
                            <select id="country" name="country" required>
                                <option value="" disabled selected>Select your country</option>
                                <option value="Austria">Austria</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="China">China</option>
                                <option value="Canada">Canada</option>
                                <option value="France">France</option>
                                <option value="India">India</option>
                                <option value="Sri Lanka">Sri Lanaka</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select><br>
                        

                            Upload Profile Picture
                            <input type="file" name="file" id="file">
                        </div>

                     </div>
                    <div class="button_container">
                        <button type="button" id="nextstep" onclick="stepsfront()" >Next</button>
                    </div>

                </div>
                <div id="step2">
                    Specialization
                    <select id="specialization" name="specialization" required>
                        <option value="" disabled selected>Select your specialization</option>
                        <option value="Personal Training">Personal Training</option>
                        <option value="Yoga">Yoga</option>
                        <option value="other">Other</option>
                    </select>
                    <br>
                    Years of Experience
                    <input type="number" id="exp" name="exp" required>
                    <br>
                    Tell us about yourself (Bio - This will be displayed to clients)
                    <br>
                    <textarea id="bio" name="bio" rows="4" cols="50" placeholder="Enter a brief bio about your fitness journey, experience, and expertise." required></textarea>


                    <div class="button_container">
                        <button type="button" id="back" onclick="stepsback()">Back</button>
                        <button type="submit" id="submit" name="submit" >Submit Profile</button>
                    </div>
                </div>

        
        </div>
    </body>
</html>
