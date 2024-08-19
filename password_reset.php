<?php
include('dbcon.php');
session_start();

if (isset($_POST['password_reset'])) 
{
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) 
    {
        $otp = rand(100000, 999999); // generate a random 6-digit OTP
        $query = "UPDATE users SET otp = ? WHERE email = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss", $otp, $email);
        $stmt->execute();

        // send the OTP to the user's email using PHPMailer
        require 'PHPmailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Nithish Kumar';
        $mail->Password = 'Deadstocks@123';
        $mail->setFrom('deadstockspvtltd@gmail.com', 'Nithish Kumar');
        $mail->addAddress($email, '');
        $mail->Subject = 'Password Reset OTP';
        $mail->Body = 'Your OTP is: ' . $otp;

        if (!$mail->send()) {
            echo 'Error sending OTP: ' . $mail->ErrorInfo;
        } else {
            echo '<script>alert("OTP is sent to your email");
            window.location.href ="otp_verification.php?email=' . $email . '"; 
            </script>';
        }
    } else {
        echo '<script>
        alert("Email does not exist");
        window.location.href ="index.html";  
        </script>';
    }
}
?>