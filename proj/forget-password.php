<?php require_once('header.php'); ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_forget_password = $row['banner_forget_password'];
}
?>

<?php
if(isset($_POST['form1'])) {

    $valid = 1;
        
    if(empty($_POST['seller_email'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_131."\\n";
    } else {
        if (filter_var($_POST['seller_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= LANG_VALUE_134."\\n";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tbl_seller_registration WHERE seller_email=?");
            $statement->execute(array($_POST['seller_email']));
            $total = $statement->rowCount();                        
            if(!$total) {
                $valid = 0;
                $error_message .= LANG_VALUE_135."\\n";
            }
        }
    }

    if($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
        foreach ($result as $row) {
            $forget_password_message = $row['forget_password_message'];
        }

        $token = md5(rand());
        $now = time();

        $statement = $pdo->prepare("UPDATE tbl_seller_registration SET seller_token=?,seller_timestamp=? WHERE seller_email=?");
        $statement->execute(array($token,$now,strip_tags($_POST['seller_email'])));
        
        $message = '<p>'.LANG_VALUE_142.'<br> <a href="'.BASE_URL.'reset-password.php?email='.$_POST['seller_email'].'&token='.$token.'">Click here</a>';
        
        $to      = $_POST['seller_email'];
        $subject = LANG_VALUE_143;
        // $headers = "From: noreply@" . BASE_URL . "\r\n" .
        //            "Reply-To: noreply@" . BASE_URL . "\r\n" .
        //            "X-Mailer: PHP/" . phpversion() . "\r\n" . 
        //            "MIME-Version: 1.0\r\n" . 
        //            "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // mail($to, $subject, $message, $headers);
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lokeshlokesh93662@gmail.com'; // Your gmail
            $mail->Password = 'jkfcvccwaathltxa'; // Your gmail app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
        
            $mail->setFrom('lokeshlokesh93662@gmail.com');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->isHTML(true); // Set email format to HTML
        
            $message = '
                <h2>Password Reset Request</h2>
                <p>Dear User,</p>
                <p>You have requested a password reset for your account. To reset your password, please click on the link below:</p>
                <p><a href="'.BASE_URL.'http://localhost/e-commerce/proj/reset-password.php?email='.$_POST['seller_email'].'&token='.$token.'">Reset Password</a></p>
                <p>If you did not request a password reset, please ignore this email.</p>
                <p>Best regards,</p>
                <p>[Your Website Name]</p>
            ';
        
            $mail->Body = $message;
        
            // Send the email
            $mail->send();
            $success_message = $forget_password_message; // This should be inside the try block
        
        } catch (Exception $e) {
            // Handle error
            $error_message .= 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . "\\n";
        }
    }
}
?>

    <div class="inner">
        <h1><?php echo LANG_VALUE_97; ?></h1>
    </div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">
                    <?php
                    if($error_message != '') {
                        echo "<script>alert('".$error_message."')</script>";
                    }
                    if($success_message != '') {
                        echo "<script>alert('".$success_message."')</script>";
                    }
                    ?>
                    <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><?php echo LANG_VALUE_94; ?> *</label>
                                    <input type="email" class="form-control" name="seller_email">
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-primary" value="<?php echo LANG_VALUE_4; ?>" name="form1">
                                </div>
                                <a href="seller_login.php" style="color:#e4144d;"><?php echo LANG_VALUE_12; ?></a>
                            </div>
                        </div>                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>