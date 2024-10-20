<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\Exception.php';
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';

ob_start();
session_start();
include("payment\admin\inc\config.php");
include("payment\admin\inc\CSRF_Protect.php");
include("payment/admin/inc/functions.php");

$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Getting all language variables into array as global variable
$i = 1;
$statement = $pdo->prepare("SELECT * FROM tbl_language");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    define('LANG_VALUE_' . $i, $row['lang_value']);
    $i++;
}

if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['seller_name'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_123."<br>";
    }

    if(empty($_POST['seller_email'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_131."<br>";
    } else {
        if (filter_var($_POST['seller_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= LANG_VALUE_134."<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tbl_seller_registration WHERE seller_email=?");
            $statement->execute(array($_POST['seller_email']));
            $total = $statement->rowCount();                            
            if($total) {
                $valid = 0;
                $error_message .= LANG_VALUE_147."<br>";
            }
        }
    }

    if(empty($_POST['seller_phone'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_124."<br>";
    }

    if(empty($_POST['seller_address'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_125."<br>";
    }

   

    if( empty($_POST['seller_password'])  ) {
        $valid = 0;
        $error_message .= LANG_VALUE_138."<br>";
    }


    if ($valid == 1) {

        $token = md5(time());
        $cust_datetime = date('Y-m-d h:i:s');
        $cust_timestamp = time();

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_seller_registration (
                                                seller_name,
                                                seller_email,
                                                seller_phone,
                                                seller_address,              
                                                seller_password,
                                                seller_token,
                                                seller_datetime,
                                                seller_timestamp,
                                                seller_status
                                            ) VALUES (?,?,?,?,?,?,?,?,?)");

        $params = array(
            filter_var($_POST['seller_name']),
            filter_var($_POST['seller_email']),
            filter_var($_POST['seller_phone']),
            filter_var($_POST['seller_address']),
            md5($_POST['seller_password']),
            $token,
            $cust_datetime,
            $cust_timestamp,
            0
        );

        $statement->execute($params);

        // Send email for confirmation of the account

        $to = $_POST['seller_email'];
        $subject = LANG_VALUE_150;
        $verify_link = BASE_URL.'verify.php?email='.$to.'&token='.$token;
        $message = ''.LANG_VALUE_151 .'<br><br>

<a href="' .$verify_link .'">'. $verify_link .'</a>';

        // Using PHPMailer to send the email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lokeshlokesh93662@gmail.com'; //Your gmail
            $mail->Password = 'vkkvvdnxtqlmvhen'; //Your gmail app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('lokeshlokesh93662@gmail.com');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            echo '<script>alter("Registration Done")</script>';

        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        unset($_POST['seller_name']);
        unset($_POST['seller_email']);
        unset($_POST['seller_phone']);
        unset($_POST['seller_address']);

        $success_message = LANG_VALUE_152;
    }
}

?>


                        <?php $csrf->echoInputField(); ?>
                                
                                <?php
                                if($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$error_message."</div>";
                                }
                                if($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$success_message."</div>";
                                }
                                ?>


