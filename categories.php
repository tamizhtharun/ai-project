<?php
include('dbcon.php');


if (isset($_POST['save'])) {
    $Product_name = $_POST['Product_name'];
    $Product_image = $_POST['Product_image'];
    // $banner_image = $_POST['banner_image'];
    // $updates = $_POST['updates'];


    $query = "INSERT INTO categories (Product_name,Product_image) 
              VALUES ('$Product_name', '$Product_image')";
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
        window.location.href ="categories.html";  
        </script>';
        $connection->error;
    }
}
?>
