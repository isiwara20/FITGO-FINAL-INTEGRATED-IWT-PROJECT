
<?php
  require 'config.php';

if(isset($_POST["Register"]))
{
$userName=$_POST["uname"];
$userID=$_POST["uid"];
$coachName=$_POST["tname"];
$coachID=$_POST["tid"];
$userTime=$_POST["utime"];
$userDate=$_POST["udate"];


"INSERT INTO session";
}

?>


<!DOCTYPE html>
<html >
<head>
    <title>Register for Session</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .info {
            margin: 20px 0;
            font-size: 1.1em;
        }

        .info p {
            margin: 8px 0;
        }

        .file-upload {
            margin-top: 15px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        .submit-button {
            margin-top: 20px;
            text-align: center;
        }

        .submit-button input {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        .submit-button input:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <?php
    require 'config.php';
    ?>
    
    <div class="register-box">
        <fieldset>
        <h2>Session Registration</h2>
    
        <form action="" method="post" >
            <!--
            <div class="info">
            <label for="coach">Coach Name:</label>
                <select name="coach" id="coach" required>
                    <option value="Coach Nipun">Coach Nipun</option>
                    <option value="Coach Oshana">Coach Oshana</option>
                    <option value="Coach Alex">Coach Alex</option>
                </select>
    
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required>
    
                <label for="time">Time:</label>
                <select name="time" id="time" required>
                    <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                    <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                    <option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                </select>
            </div>
            -->
            Session ID:<input type="text" name="sid"><br>
            User Name:<input type="text" name="uname"><br>
            User ID:<input type="text" name="uid"><br>
            Coach Name: <input type="text" name="tname"><br>
            Coach ID:<input type="text" name="tid"><br>
            Session Name:<input type="text" name="sname"><br>
            Date:<input type="date" name="udate"><br>
            Time: <input type="time" name="utime"><br>
            


    
            <div class="file-upload">
                <label for="payment">Upload Payment Receipt (PDF or Image):</label>
                <input type="file" name="payment" id="payment" accept=".pdf, image/*" required>
            </div>
    
            <div class="submit-button">
                <input type="submit" name="Register">
            </div>
        </form>
    </fieldset>
    </div>

    

</body>
</html>
