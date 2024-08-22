<?php
include('../../../Database/dbcon.php');


if (isset($_POST['Submit'])) {
    $Product_name = $_POST['Category_name'];
    $Product_image = $_POST['Category_image'];
    $Product_date = $_POST['Category_date'];
    // $banner_image = $_POST['banner_image'];
    // $updates = $_POST['updates'];


    $query = "INSERT INTO category (CATEGORY_NAME,CATEGORY_IMAGE,CATEGORY_DATE) 
              VALUES ('$Product_name', '$Product_image','$Product_date')";
    echo"Category added successfully";
    if ($connection->query($query) === TRUE) {
        // Send notification to admin (this could be an email, or an entry in an admin dashboard)
        // In this case, we just display a message for simplicity
        echo '<script>
        alert("New category added."); 
        </script>';
    } else {
        echo '<script>
        alert("Something Occured");
        window.location.href ="./categories.php";  
        </script>';
        $connection->error;
    }
}
?>
