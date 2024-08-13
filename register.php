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
        echo json_encode(['error' => 'Email already exists. Please login.']);
    } else {
        // Insert into database
        $query = "INSERT INTO users (username, email, phone_number, password) VALUES ('$username', '$email', '$phone_number', '$password')";
        if ($connection->query($query) === TRUE) {
            echo json_encode(['success' => 'Registered successfully. Please login.']);
        } else {
            echo json_encode(['error' => 'Error: ' . $connection->error]);
        }
    }
}

$connection->close();
?>
