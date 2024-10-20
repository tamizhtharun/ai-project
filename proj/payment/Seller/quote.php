<?php require_once('header.php'); ?>

<?php
//Change Logo
$valid = 1;
if (isset($_POST['form1'])) {
    if (isset($_FILES['photo_logo'])) {
        $path = $_FILES['photo_logo']['name'];
        $path_tmp = $_FILES['photo_logo']['tmp_name'];
        // ...
    } else {
        $valid = 0;

    }


    if($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {
        // removing the existing photo
        $New_Quote_Logo = 'New_Quote_Logo'; // initialize the variable
        $statement = $pdo->prepare("SELECT * FROM tbl_Quote WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $New_Quote_Logo = $row['New_Quote_Logo'];
            $New_Quote = $row['New_Quote'];
        
            $filePath = __DIR__ . '/../assets/uploads/' . $New_Quote_Logo;
            if (isset($New_Quote_Logo) && $New_Quote_Logo != '' && file_exists($filePath)) {
                unlink($filePath);
            }  
            // if (file_exists($filePath)) {
            //     unlink($filePath);
            // }
        }

        // updating the data
        $final_name = 'logo'.'.'.$ext;
        $upload_dir = '../assets/uploads/'; // define the upload directory
        
        // create the directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // create the directory with recursive permissions
        }
        
        // move the uploaded file to the upload directory
        if (move_uploaded_file($path_tmp, $upload_dir.$final_name)) {
            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_Quote SET New_Quote_Logo=? WHERE id=1");
            $statement->execute(array($final_name));
            $success_message = 'Logo is updated successfully.';
        } else {
            $error_message = 'Failed to upload logo.';
            var_dump($_FILES); // check the contents of the $_FILES array
            echo "Upload directory: $upload_dir"; // check the upload directory
        }
        
    }
	}
	//new Quote
if(isset($_POST['form2'])) {
    
	// updating the database
	$statement = $pdo->prepare("UPDATE tbl_Quote New_Quote=? WHERE id=1");
	$statement->execute(array($_POST['New_Quote']));

	$success_message = ' Quote is updated successfully.';
	
}
?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Add Quote And Logo</h1>
    </div>
</section>
<?php

$statement = $pdo->prepare("SELECT * FROM tbl_Quote WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
foreach ($result as $row) {
	$New_Quote_Logo = $row['New_Quote_Logo'];
	$New_Quote = $row['New_Quote'];
}
?>
<section class="content" style="min-height:auto;margin-bottom: -30px;">
    <div class="row">
        <div class="col-md-12">
            <?php if($error_message): ?>
            <div class="callout callout-danger">
            
            <p>
            <?php echo $error_message; ?>
            </p>
            </div>
            <?php endif; ?>

            <?php if($success_message): ?>
            <div class="callout callout-success">
            
            <p><?php echo $success_message; ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
                            
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Logo and Quote</a></li>
                        
                       
                
                       <!--<li><a href="#tab_11" data-toggle="tab">Ads</a></li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">


                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Existing Logo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="../assets/uploads/<?php echo $New_Quote_Logo; ?>" class="existing-photo" style="height:80px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">New Logo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="photo_logo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form1">Update Logo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>

                            <form class="form-horizontal" action="" method="post">
                            <!-- <div class="box box-info"> -->
                                 <div class="box-body">
                                                                
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">New Quote</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="New_Quote" style="height:140px;"><?php echo $New_Quote; ?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form1">Update Logo</button>
                                        </div>
            </div>