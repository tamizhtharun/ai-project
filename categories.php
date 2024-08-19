<?php
include('dbcon.php');


if (isset($_POST[''])) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $banner_image = $_POST['banner_image'];
    $updates = $_POST['updates'];


    $query = "INSERT INTO categories (product_name,product_image,banner_image, updates) 
              VALUES ('$name', '$image', '$banner_image', '$updates')";
    

}

$connection->close();
?>
