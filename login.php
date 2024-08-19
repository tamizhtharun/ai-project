<?php
include('dbcon.php');

// Login functionality
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are correct
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $connection->query($query);
    if ($result->num_rows == 1) {
        // Successful login
<<<<<<< HEAD
        echo '<script>alert("login Sucessfull")</script>'; 
=======
        echo '<script>alert("Registered Sucessfully");
        window.location.href ="index.html"; 
        </script>'; 
>>>>>>> 2c15df46e28c3d7affadb19ef8a852da941c333e
        // header("Location:index.html");
    } else {
        echo '<script>
        alert("Wrong credentials. Please Try Again");
        window.location.href ="index.html";  
        </script>';
       // header("Location:index.html");
    }
}

$connection->close();
?>
