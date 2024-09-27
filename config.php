<?php

$severname = 'localhost';
$username = 'root';
$password = '';
$database = 'fitgo';

$con = new mysqli($severname,$username,$password,$database);

if($con->connect_error)
{
    die($con->connect_error);
}
else
{
    //echo "connection sucessful";
}

?>
