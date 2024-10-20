<?php require_once('header.php'); ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$connection = mysqli_connect("localhost","root","","deadstock_db");


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
         window.location.href ="header.php";  
        </script>';

    } else {
        // Insert into database
        $query = "INSERT INTO users (username, email, phone_number, password) VALUES ('$username', '$email', '$phone_number', '$password')";
        if ($connection->query($query) === TRUE) {
            echo '<script>
            alert("success => Registered successfully.");
             window.location.href ="header.php";  
        </script>';
        } else {
            echo json_encode(['error' => 'Error: ' . $pdo->error]);
        }
    }
}

$connection->close();
?>
<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['seller_name'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_123."<br>";
    }

    if(empty($_POST['seller_email'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_131."<br
        ';>";
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
    if (empty($_POST['seller_phone'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_124."<br>";
    } else {
        // Check if the OTP is valid
        // if (isset($_POST['seller_otp']) && $_POST['seller_otp'] !== $_SESSION['otp']) {
        //     $valid = 0;
        //     $error_message .= "Invalid OTP.<br>";
        // }
    }
    if(empty($_POST['seller_gst'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_110."<br>";
    }

    if(empty($_POST['seller_address'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_125."<br>";
    }
   

    if(empty($_POST['seller_country'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_126."<br>";
    }

    if(empty($_POST['seller_city'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_127."<br>";
    }

    if(empty($_POST['seller_state'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_128."<br>";
    }

    if(empty($_POST['seller_zip'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_129."<br>";
    }

    if( empty($_POST['seller_password']) || empty($_POST['seller_re_password']) ) {
        $valid = 0;
        $error_message .= LANG_VALUE_138."<br>";
    }

    if( !empty($_POST['seller_password']) && !empty($_POST['seller_re_password']) ) {
        if($_POST['seller_password'] != $_POST['seller_re_password']) {
            $valid = 0;
            $error_message .= LANG_VALUE_139."<br>";
        }
    }

    if($valid == 1) {

        $token = md5(time());
        $seller_datetime = date('Y-m-d h:i:s');
        $seller_timestamp = time();

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_seller_registration (
            seller_name,
            seller_email,
            seller_phone,
            seller_gst,
            seller_country,
            seller_address,
            seller_city,
            seller_state,
            seller_zip,         
            seller_password,
            seller_token,
            seller_datetime,
            seller_timestamp,
            seller_status
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$statement->execute(array(
            strip_tags($_POST['seller_name']),
            strip_tags($_POST['seller_email']),
            strip_tags($_POST['seller_phone']),
            strip_tags($_POST['seller_gst']),
            strip_tags($_POST['seller_country']),
            strip_tags($_POST['seller_address']),
            strip_tags($_POST['seller_city']),
            strip_tags($_POST['seller_state']),
            strip_tags($_POST['seller_zip']),
                 
            md5($_POST['seller_password']),
            $token,
            $seller_datetime,
            $seller_timestamp,
            0
        ));

        // Send email for confirmation of the account
// Send email for confirmation of the account
        $to = $_POST['seller_email'];

        $subject = 'Account Registration Confirmation'; // Update the subject as well
        $verify_link = BASE_URL.'verify.php?email='.$to.'&token='.$token;
        $message = 'Thank you for registering with us!<br><br>
                    We are excited to have you on board. To activate your account, please click the link below:<br><br>
                    <a href="'.$verify_link.'">Activate My Account</a><br><br>
                    If you did not create an account, please disregard this email.';

        // Using PHPMailer to send the email
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
            $mail->Body = $message;
            $mail->isHTML(true); // Set email format to HTML

            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        unset($_POST['seller_name']);
    
        unset($_POST['seller_email']);
        unset($_POST['seller_phone']);
        unset($_POST['seller_address']);
        
        unset($_POST['seller_city']);
        unset($_POST['seller_state']);
        unset($_POST['seller_zip']);

        $success_message = LANG_VALUE_152;
    }
}

?>

       
    <!-- stylesheet -->
       
<link rel="stylesheet" href="seller.css">

    <div class="inner">
        <h1>Seller registration</h1>
    </div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">

                    

                    <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                
                                <?php
                                if($error_message != '') {
                                    echo "<div class='alert alert-danger' role='alert'>".$error_message."</div>";
                                }
                                if($success_message != '') {
                                    echo "<div class='alert alert-success' role='alert'>".$success_message."</div>";
                                }
                                ?>


                                 


                                <div class="col-md-6 form-group">
                                    <label for="">Name *</label>
                                    <input type="text" class="form-control" name="seller_name" value="<?php if(isset($_POST['seller_name'])){echo $_POST['seller_name'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_103; ?></label>
                                    <input type="text" class="form-control" name="seller_cname" value="<?php if(isset($_POST['seller_cname'])){echo $_POST['seller_cname'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_94; ?> *</label>
                                    <input type="email" class="form-control" name="seller_email" value="<?php if(isset($_POST['seller_email'])){echo $_POST['seller_email'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_104; ?> *</label>
                                    <input type="text" class="form-control" name="seller_phone" value="<?php if(isset($_POST['seller_phone'])){echo $_POST['seller_phone'];} ?>">
                                </div>
                                <!-- <div class="col-md-6 form-group">
                                    <label for="">OTP *</label>
                                    <input type="text" class="form-control" name="seller_otp">
                                </div> -->
                                <div class="col-md-6 form-group">
                                <label for=""> GST*</label>
                                <input type="text" class="form-control" name="seller_gst" value="<?php if(isset($_POST['seller_gst'])){echo $_POST['seller_gst'];} ?>">
                            </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><?php echo LANG_VALUE_105; ?> *</label>
                                    <textarea name="seller_address" class="form-control" cols="30" rows="10" style="height:70px;"><?php if(isset($_POST['seller_address'])){echo $_POST['seller_address'];} ?></textarea>
                                </div>
                            
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_106; ?> *</label>
                                    <select name="seller_country" class="form-control select2">
                                        <option value="">Select country</option>
                                    <?php
                                    $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                                    $statement->execute();
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                                    foreach ($result as $row) {
                                        ?>
                                        <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
                                        <?php
                                    }
                                    ?>    
                                    </select>                                    
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_107; ?> *</label>
                                    <input type="text" class="form-control" name="seller_city" value="<?php if(isset($_POST['seller_city'])){echo $_POST['seller_city'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_108; ?> *</label>
                                    <input type="text" class="form-control" name="seller_state" value="<?php if(isset($_POST['seller_state'])){echo $_POST['seller_state'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_109; ?> *</label>
                                    <input type="text" class="form-control" name="seller_zip" value="<?php if(isset($_POST['seller_zip'])){echo $_POST['seller_zip'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_96; ?> *</label>
                                    <input type="password" class="form-control" name="seller_password">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo LANG_VALUE_98; ?> *</label>
                                    <input type="password" class="form-control" name="seller_re_password">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-danger" value="<?php echo LANG_VALUE_15; ?>" name="form1">
                                </div>
                            </div>
                        </div>                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>



