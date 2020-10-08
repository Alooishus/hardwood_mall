<?php 
include("../inc/db_connect.php");
date_default_timezone_set('America/New_York');

$action = filter_input(INPUT_POST, 'select');

if($action == 'add_skid' || $action == 'add_bundle'){
    $width = filter_input(INPUT_POST, 'width');
    $bundles = filter_input(INPUT_POST, 'bundles');
    $skid_id = filter_input(INPUT_POST, 'skid_id');
    if($action == 'add_skid'){
        $skid_loc = filter_input(INPUT_POST, 'skid_loc');
        $species = filter_input(INPUT_POST, 'species');
        $thickness = filter_input(INPUT_POST, 'thickness');
        $edge = filter_input(INPUT_POST, 'edge');
        $sqft = filter_input(INPUT_POST, 'sqft');
        $s_price = filter_input(INPUT_POST, 's_price');
        $b_price = filter_input(INPUT_POST, 'b_price');
        $vendor_id = filter_input(INPUT_POST, 'vendor_id');
        $date_received = date("Y/m/d", strtotime($_POST['date_rec']));
        $curr_date = date('Y/m/d');

        $insert_skid = 'INSERT INTO skid
                        (skid_id, vendor_id, species, thickness, edge, square_foot, date_received, skid_price, bund_price, location, date_counted)
                    VALUES
                        (:skid_id, :vendor_id, :species, :thickness, :edge, :square_foot, :date_received, :skid_price, :bund_price, :location, :date_counted);
                    INSERT INTO bundle
                        (skid_id, width, bundle_qty)
                    VALUES
                        (:skid_id, :width, :bundle_qty)';
                    
        $stmt = $db->prepare($insert_skid);
        $stmt->bindValue(':skid_id', $skid_id);
        $stmt->bindValue(':vendor_id', $vendor_id);
        $stmt->bindValue(':species', $species);
        $stmt->bindValue(':thickness', $thickness);
        $stmt->bindValue(':edge', $edge);
        $stmt->bindValue(':square_foot', $sqft);
        $stmt->bindValue(':date_received', $date_received);
        $stmt->bindValue(':skid_price', $s_price);
        $stmt->bindValue(':bund_price', $b_price);
        $stmt->bindValue(':location', $skid_loc);
        $stmt->bindValue(':date_counted', $curr_date);
        $stmt->bindValue(':width', $width);
        $stmt->bindValue(':bundle_qty', $bundles);
        $stmt->execute();
        $stmt->closeCursor();
    }elseif ($action == 'add_bundle'){
        $insert_bund = 'INSERT INTO bundle
                        (skid_id, width, bundle_qty)
                        VALUES
                        (:skid_id, :width, :bundle_qty)';
        $stmt = $db->prepare($insert_bund);
        $stmt->bindValue(':skid_id', 'MS-'.$skid_id);
        $stmt->bindValue(':width', $width);
        $stmt->bindValue(':bundle_qty', $bundles);
        $stmt->execute();
        $stmt->closeCursor();
    }
}

$skid_id_add = $skid_id;
$action = 'skid_add';
include('index.php');
?>