<?php 
include("../inc/db_connect.php");

$invoice_id = filter_input(INPUT_POST, 'invoice_id');
$line_price = filter_input(INPUT_POST, 'line_price');
$paid = filter_input(INPUT_POST, 'paid');
$unpaid = filter_input(INPUT_POST, 'unpaid');

$update_invoice = 'UPDATE invoice_line
                    SET line_price = :line_price
                    WHERE invoice_id = :invoice_id';
$stmt = $db->prepare($update_invoice);
$stmt->bindValue(':line_price', $line_price);
$stmt->bindValue(':invoice_id', $invoice_id);
$stmt->execute();
$stmt->closeCursor();

if(isset($paid)){
    $update_paid_status = 'UPDATE invoice_line
                    SET paid_status = :paid_status
                    WHERE invoice_id = :invoice_id';
    $stmt3 = $db->prepare($update_paid_status);
    $stmt3->bindValue(':paid_status', 1);
    $stmt3->bindValue(':invoice_id', $invoice_id);
    $stmt3->execute();
    $stmt3->closeCursor();
}elseif(isset($unpaid)){
    $update_paid_status = 'UPDATE invoice_line
                    SET paid_status = :paid_status
                    WHERE invoice_id = :invoice_id';
    $stmt3 = $db->prepare($update_paid_status);
    $stmt3->bindValue(':paid_status', 0);
    $stmt3->bindValue(':invoice_id', $invoice_id);
    $stmt3->execute();
    $stmt3->closeCursor();
}


$action = 'invoice_edit';
include('index.php');
?>