<?php
include("../inc/db_connect.php");

if(!isset($skid_id_add)){
        $skid_id_add = filter_input(INPUT_POST, 'skid_id_add', FILTER_VALIDATE_INT);
}
if(!isset($skid_id_edit)){
        $skid_id_edit = filter_input(INPUT_POST, 'skid_id_edit', FILTER_VALIDATE_INT);
}
if(!isset($inv_num_add)){
$inv_num_add = filter_input(INPUT_POST, 'inv_num_add', FILTER_VALIDATE_INT);
}
if(!isset($inv_num_edit)){
$inv_num_edit = filter_input(INPUT_POST, 'inv_num_edit', FILTER_VALIDATE_INT);
}

if(!isset($action)){
        $action = filter_input(INPUT_POST, 'select');
}


$query_skid = 'SELECT skid.skid_id, vendor_id, species, thickness, edge, square_foot, date_received, skid_price, bund_price, location, date_counted,
                        bundle_id, width, bundle_qty, visible
                FROM skid
                JOIN bundle ON skid.skid_id = bundle.skid_id
                WHERE skid.skid_id = :skid_id_edit';
$stmt = $db->prepare($query_skid);
$stmt->bindValue(':skid_id_edit', 'MS-'.$skid_id_edit);
$stmt->execute();
$skids = $stmt->fetchAll();
$stmt->closeCursor();

$query_invoice ='SELECT invoice.invoice_id, emp_id, cust_id, inv_date, skid_id, quantity, line_price, paid_status
                FROM invoice
                JOIN invoice_line ON invoice.invoice_id = invoice_line.invoice_id';
$stmt1 = $db->prepare($query_invoice);
$stmt1->execute();
$invoices = $stmt1->fetchAll();
$stmt1->closeCursor();


include("modify.php");
?>

