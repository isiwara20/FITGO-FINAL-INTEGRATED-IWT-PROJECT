<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: signin.php");
    exit();
}

include('config.php'); // Your database connection file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the ticket
    $sql = "DELETE FROM tickets WHERE id = '$id'";

    if ($con->query($sql) === TRUE) {
        header("Location: view_tickets.php");
    } else {
        echo "Error: " . $conn->error;
    }
}




$conn->close();
?>

