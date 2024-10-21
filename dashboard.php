<?php require_once('header.php'); ?>

<?php
// Check if the customer is logged in or not
if(!isset($_SESSION['customer'])) {
    header('location: '.BASE_URL.'logout.php');
    exit;
} else {
    // If customer is logged in, but admin make him inactive, then force logout this user.
    $statement = $pdo->prepare("SELECT * FROM tbl_seller_registration  WHERE seller_id=? AND seller_status=?");
    $statement->execute(array($_SESSION['customer']['seller_id'],0));
    $total = $statement->rowCount();
    if($total) {
        header('location: '.BASE_URL.'logout.php');
        exit;
    }
}
?>

<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12"> 
                <!-- <?php require_once('customer-sidebar.php'); ?> -->
            </div>
            <div class="col-md-12">
                <div class="user-content">
                    <h3 class="text-center">
                        <!-- <?php echo LANG_VALUE_90; ?> -->
                        Welcome To DeadStock!
                    </h3>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>