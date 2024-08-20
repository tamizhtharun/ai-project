<?php
include('dbcon.php');

// Register functionality
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        echo '<script>
        alert("error => Email already exists. Please login.");
         window.location.href ="index.html";  
        </script>';

    } else {
        // Insert into database
        $query = "INSERT INTO users (username, email, phone_number, password) VALUES ('$username', '$email', '$phone_number', '$password')";
        if ($connection->query($query) === TRUE) {
            echo '<script>
            alert("success => Registered successfully.");
             window.location.href ="index.html";  
        </script>';
        } else {
            echo json_encode(['error' => 'Error: ' . $connection->error]);
        }
    }
}

$connection->close();
?>
