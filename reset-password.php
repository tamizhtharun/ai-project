<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_reset_password = $row['banner_reset_password'];
}
?>

<?php
if( !isset($_GET['email']) || !isset($_GET['token']) )
{
    header('location: '.BASE_URL.'seller_login.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM tbl_seller_registration WHERE seller_email=? AND seller_token=?");
$statement->execute(array($_GET['email'],$_GET['token']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$tot = $statement->rowCount();
if($tot == 0)
{
    header('location: '.BASE_URL.'seller_login.php');
    exit;
}
foreach ($result as $row) {
    $saved_time = $row['seller_timestamp'];
}

$error_message2 = '';
if(time() - $saved_time > 86400)
{
    $error_message2 = LANG_VALUE_144;
}

if(isset($_POST['form1'])) {

    $valid = 1;
    
    if( empty($_POST['seller_new_password']) || empty($_POST['seller_re_password']) )
    {
        $valid = 0;
        $error_message .= LANG_VALUE_140.'\\n';
    }
    else
    {
        if($_POST['seller_new_password'] != $_POST['seller_re_password'])
        {
            $valid = 0;
            $error_message .= LANG_VALUE_139.'\\n';
        }
    }   

    if($valid == 1) {

        $seller_new_password = strip_tags($_POST['seller_new_password']);
        $statement = $pdo->prepare("UPDATE tbl_seller_registration SET seller_password=?, seller_token=?, seller_timestamp=? WHERE seller_email=?");
        $statement->execute(array(md5($seller_new_password),'','',$_GET['email']));
        
        header('location: '.BASE_URL.'reset-password-success.php');
    }

    
}
?>

    <div class="inner">
        <h1><?php echo LANG_VALUE_149; ?></h1>
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
                    ?>
                    <?php if($error_message2 != ''): ?>
                        <div class="error"><?php echo $error_message2; ?></div>
                    <?php else: ?>
                        <form action="" method="post">
                            <?php $csrf->echoInputField(); ?>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><?php echo LANG_VALUE_100; ?> *</label>
                                        <input type="password" class="form-control" name="seller_new_password">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><?php echo LANG_VALUE_101; ?> *</label>
                                        <input type="password" class="form-control" name="seller_re_password">
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" class="btn btn-primary" value="<?php echo LANG_VALUE_149; ?>" name="form1">
                                    </div>
                                </div>
                            </div>                        
                        </form>
                    <?php endif; ?>
                    
                </div>                
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>