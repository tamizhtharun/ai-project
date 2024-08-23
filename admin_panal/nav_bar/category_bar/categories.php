<?php
include('../../../Database/dbcon.php');


if (isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    $category_image = $_POST['category_image'];
    $category_date = $_POST['category_date'];
    // $banner_image = $_POST['banner_image'];
    // $updates = $_POST['updates'];


    $query = "INSERT INTO category (CATEGORY_NAME,CATEGORY_IMAGE,CATEGORY_DATE) 
              VALUES ('$category_name', '$category_image','$category_date')";
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
