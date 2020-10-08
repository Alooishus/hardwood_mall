<?php 
include("../inc/db_connect.php");

$action = filter_input(INPUT_POST, 'select');
$skid_id = filter_input(INPUT_POST, 'skid_id');
$hide = filter_input(INPUT_POST, 'hide');
$show = filter_input(INPUT_POST, 'show');

if($action == 'update_bundle'){
    $width = filter_input(INPUT_POST, 'width');
    $bundle_qty = filter_input(INPUT_POST, 'bundle_qty');

    $update_bundle = 'UPDATE bundle
                    SET bundle_qty = :bundle_qty
                    WHERE width = :width';
    $stmt2 = $db->prepare($update_bundle);
    $stmt2->bindValue(':bundle_qty', $bundle_qty);
    $stmt2->bindValue(':width', $width);
    $stmt2->execute();
    $stmt2->closeCursor();

}elseif($action == 'update_skid'){
    $skid_price = filter_input(INPUT_POST, 'skid_price');
    $bund_price = filter_input(INPUT_POST, 'bund_price');
    $date_received = date("Y/m/d", strtotime($_POST['date_received']));
    $date_counted = date("Y/m/d", strtotime($_POST['date_counted']));

    $update_skid = 'UPDATE skid
                SET skid_price = :skid_price, bund_price = :bund_price, date_received = :date_received, date_counted = :date_counted
                WHERE skid_id = :skid_id';
    $stmt = $db->prepare($update_skid);
    $stmt->bindValue(':skid_id', 'MS-'.$skid_id);
    $stmt->bindValue(':skid_price', $skid_price);
    $stmt->bindValue(':bund_price', $bund_price);
    $stmt->bindValue(':date_received', $date_received);
    $stmt->bindValue(':date_counted', $date_counted);
    $stmt->execute();
    $stmt->closeCursor();
}

if(isset($hide)){
    $update_visible = 'UPDATE bundle
                    SET visible = :visible
                    WHERE width = :width';
    $stmt3 = $db->prepare($update_visible);
    $stmt3->bindValue(':visible', 0);
    $stmt3->bindValue(':width', $width);
    $stmt3->execute();
    $stmt3->closeCursor();
}elseif(isset($show)){
    $update_visible = 'UPDATE bundle
                    SET visible = :visible
                    WHERE width = :width';
    $stmt3 = $db->prepare($update_visible);
    $stmt3->bindValue(':visible', 1);
    $stmt3->bindValue(':width', $width);
    $stmt3->execute();
    $stmt3->closeCursor();
}

$skid_id_edit = $skid_id;
$action = 'skid_edit';
include('index.php');
?>