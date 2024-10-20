<?php require_once('header.php'); ?>
<!-- fetching row banner login -->
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_login = $row['banner_login'];
}
?>
<!-- login form -->
<?php
if(isset($_POST['form1'])) {
        
    if(empty($_POST['seller_email']) || empty($_POST['seller_password'])) {
        $error_message = LANG_VALUE_132.'<br>';
    } else {
        
        $seller_email = strip_tags($_POST['seller_email']);
        $seller_password = strip_tags($_POST['seller_password']);

        $statement = $pdo->prepare("SELECT * FROM tbl_seller_registration WHERE seller_email=?");
        $statement->execute(array($seller_email));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $seller_status = $row['seller_status'];
            $row_password = $row['seller_password'];
        }

        if($total==0) {
            $error_message .= LANG_VALUE_133.'<br>';
        } else {
            //using MD5 form
            if( $row_password != md5($seller_password) ) {
                $error_message .= LANG_VALUE_139.'<br>';
            } else {
                if($seller_status == 0) {
                    $error_message .= LANG_VALUE_148.'<br>';
                } else {
                    $_SESSION['customer'] = $row;
                    header("location: ".BASE_URL."dashboard.php");  //payment/seller/index.php"
                }
            }
            
        }
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>                  
                        <?php

                        if($error_message != '') {
                            echo "<div class='alert alert-danger' role='alert'>".$error_message."</div>";
                        }
                        if($success_message != '') {
                            echo "<div class='alert alert-success' role='alert'>".$success_message."</div>";
                        }
                        ?>
                        <div class="form-group">
                            <label for="seller_email"><?php echo LANG_VALUE_94; ?> *</label>
                            <input type="email" class="form-control" name="seller_email" required>
                        </div>
                        <div class="form-group">
                            <label for="seller_password"><?php echo LANG_VALUE_96; ?> *</label>
                            <input type="password" class="form-control" name="seller_password" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" value="<?php echo LANG_VALUE_4; ?>" name="form1">
                        </div>
                        <div class="text-center">
                            <a href="forget-password.php">Forget password?</a>
                        </div>
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="#" id="signup-link">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>