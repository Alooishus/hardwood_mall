<?php 
include("../inc/db_connect.php");

$invoice_id = filter_input(INPUT_POST, 'invoice_id');
$emp_id = filter_input(INPUT_POST, 'emp_id');
$cust_id = filter_input(INPUT_POST, 'cust_id');
$inv_date = date("Y/m/d", strtotime($_POST['inv_date']));
$skid_id = filter_input(INPUT_POST, 'skid_id');
$quantity = filter_input(INPUT_POST, 'quantity');
$line_price = filter_input(INPUT_POST, 'line_price');


$insert_invoice = 'INSERT INTO invoice
                    (emp_id, cust_id, inv_date)
                VALUES
                    (:emp_id, :cust_id, :inv_date);
                INSERT INTO invoice_line
                    (invoice_id, skid_id, quantity, line_price)
                VALUES
                    (:invoice_id, :skid_id, :quantity, :line_price)';
$stmt = $db->prepare($insert_invoice);
$stmt->bindValue(':emp_id', $emp_id);
$stmt->bindValue(':cust_id', $cust_id);
$stmt->bindValue(':inv_date', $inv_date);
$stmt->bindValue(':invoice_id', $invoice_id);
$stmt->bindValue(':skid_id', $skid_id);
$stmt->bindValue(':quantity', $quantity);
$stmt->bindValue(':line_price', $line_price);
$stmt->execute();
$stmt->closeCursor();


$skid_id_edit = $skid_id;
$action = 'invoice_add';
include('index.php');
?>