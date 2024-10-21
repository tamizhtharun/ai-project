<?php
require_once __DIR__ . '/fpdf186/fpdf.php';
require_once __DIR__ . '/dbcontroller.php';

$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM users");

// Check if the result is an array and not empty
if (is_array($result) && !empty($result)) {
    $pdf = new FPDF('P', 'mm', "A4");
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',10);
    //  Header Table
    $pdf->Cell(15, 10, 'S.NO', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Full Name', 1, 0, 'C');
    $pdf->Cell(75, 10, 'Email', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Contact Number', 1, 0, 'C');
    $pdf->Cell(27, 10, 'Joining Date', 1, 1, 'C'); // add 1 to move to next line
    $serial_number = 1;
    $pdf->SetFont('Arial','',12);
    foreach($result as $row) {
        // Check if the keys exist in the row array
        // $count = isset($row['id']) ? $row['id'] : '';
        $username = isset($row['username']) ? $row['username'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $contact_number = isset($row['phone_number']) ? $row['phone_number'] : '';
        $joining_date = isset($row['registered_at']) ? $row['registered_at'] : '';

        $pdf->Cell(15, 12, $serial_number, 1, 0, 'C');
        $pdf->Cell(50, 12, $username, 1, 0, 'C');
        $pdf->Cell(75, 12, $email, 1, 0, 'C');
        $pdf->Cell(30, 12, $contact_number, 1, 0, 'C');
        $pdf->Cell(27, 12, $joining_date, 1, 1, 'C'); // add 1 to move to next line

        $serial_number++;
    }

    $pdf->output('customer_details.pdf', 'D');
} else {
    echo "No data found";
}
?>