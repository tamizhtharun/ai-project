

 
 
 
 
 
 
 
 <!-- <?php
$connection = mysqli_connect("localhost","root","","deadstock_db");

// Login functionality
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are correct
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $connection->query($query);
    if ($result->num_rows == 1) {
        // Successful login
        echo '<script>alert("Registered Sucessfully");
        window.location.href ="header.php"; 
        </script>'; 
        // header("Location:index.html");
    } else {
        echo '<script>
        alert("Wrong credentials. Please Try Again");
        window.location.href ="header.php";  
        </script>';
       // header("Location:index.html");
    }
}

$connection->close();
?> -->


<?php
			// Configuration
			$db_host = 'localhost';
			$db_username = 'root';
			$db_password = '';
			$db_name = 'deadstock_db';

			// Create connection
			$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

			// Check connection
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
			}

			// Process login form submission
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$seller_email = $_POST["seller_email"];
					$seller_password = $_POST["seller_password"];

					// Query to check email and password
					$query = "SELECT * FROM tbl_seller_registration WHERE seller_email = '$seller_email' AND seller_password = '$seller_password'";
					$result = $conn->query($query);

					if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$seller_status = $row["seller_status"];

							if ($seller_status == 1) {
									// Active status, redirect to dashboard
									header("Location: dashboard.php");
									exit;
							} else {
									// Inactive status, display error message
									$error_mess = "Your account is inactive. Please contact the administrator.";
							}
					} else {
							// Email and password do not match, display error message
							$error_mess = "Invalid email or password.";
					}
			}

			// Close connection
			$conn->close();
			?>
