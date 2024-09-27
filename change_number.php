<!--Isiwara-->


<!DOCTYPE html>
<html>
<head>
    <title>FIT-GO | Change Number</title>
    <link rel="icon" type="image/x-icon" href="img/logobk.png">
</head>
<style>
    body
    {
        font-family: 'Roboto', sans-serif;
        background-color:#f0f2f5;
        display:flex;
        justify-content:center;
       
    }
    .container
    {
        margin-top:40px;
        background-color:white;
        padding: 40px;
        border-radius:8px;
        border:1px solid black;
        width : 100%;
        max-width:500px;
        text-align: center;
    }
    h1
    {
        margin-bottom:30px;
        font-size:24px;
        font-weight:bold;
        
    }

    #change_num
    {
        padding:14px;
        width:90%;
        margin-bottom:25px;
        border-radius:8px;
        font-size:15px;
        border: 2px solid #ddd;
        
    }
    #change_num_submit
    {
        background-color:blue;
        color:white;
        font-size:16px;
        cursor:pointer;
        border:none;
        border-radius:8px;
        letter-spacing:1px;
        width:100%;
        border: 2px solid #ddd;

        padding:10px;

        
    }
    #change_num_submit:hover
    {
        background-color:purple;
    }
    p 
    {
        margin-top: 20px;
        font-size: 14px;
        color: #666;
    }
</style>
<body>
    <div class="container">
        <h1>Change Phone Number</h1>
        <form action="process_signup.php" method="post">
            <input type="tel" id="change_num" name="change_num" placeholder="Enter the phone number" pattern="[0-9]{10}" required>
            <input type="submit" id="change_num_submit" name="change_num_submit" value="Send Code">
        </form>
        <p>A Verification code will be sent to your new number.</p>
    </div>
</body>
</html>

