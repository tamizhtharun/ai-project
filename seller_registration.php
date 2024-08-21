<?php
session_start();
include('dbcon.php'); // Database connection

if (isset($_POST['seller_register'])) {
    $seller_name = $_POST['seller_name'];
    $seller_address = $_POST['seller_address'];
    $seller_phone= $_POST['seller_phone'];
    $seller_email = $_POST['seller_email'];
    $seller_password = password_hash($_POST['seller_password'], PASSWORD_DEFAULT);

    // Insert the seller data into the database with a default role of 'pending'
    $query = "INSERT INTO seller (s_name,s_phone_number, s_email, s_password) 
              VALUES ('$seller_name', '$seller_address', '$seller_phone', '$seller_email', '$seller_password')";
    
    if ($connection->query($query) === TRUE) {
        // Send notification to admin (this could be an email, or an entry in an admin dashboard)
        // In this case, we just display a message for simplicity
        echo '<script>
        alert("Your registration request has been sent to the admin for approval.");
        window.location.href ="index.php";  
        </script>';
    } else {
        echo "Error: " . $connection->error;
    }
}
?>
