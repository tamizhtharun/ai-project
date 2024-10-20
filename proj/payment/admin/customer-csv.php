<?php
include 'inc/config.php';
$now = gmdate("D, d M Y H:i:s");
header('Content-Type: text/csv; charset=utf-8');  
header('Content-Disposition: attachment; filename=customer_list.csv');  
$output = fopen("php://output", "w");  
fputcsv($output, array('S.N', 'Username', 'Email Address', 'contact Number', 'Joining Date'));  
$statement = $pdo->prepare("SELECT * FROM users");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	fputcsv($output, array($row['id'],$row['username'],$row['email'],$row['phone_number'],$row['registered_at']));
} 
fclose($output);
?>