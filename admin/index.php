<?php
include("../inc/db_connect.php");

if(!isset($action)){
    $action = "View All";
    if(filter_input(INPUT_POST, 'select')){
        $action = filter_input(INPUT_POST, 'select');
    }else{
        $err_msg = 'select invalid';
        $species = NULL;
    }
}
if(!isset($species)){
    if(filter_input(INPUT_POST, 'species')){
        $species = filter_input(INPUT_POST, 'species');
    }else{
        $err_msg = 'species invalid';
        $species = NULL;
    }
}
if(!isset($price)){
    if(filter_input(INPUT_POST, 'price')){
        $price = filter_input(INPUT_POST, 'price');
    }else{
        $err_msg = 'price invalid';
        $price = NULL;
    }
}
if(!isset($width)){
    if(filter_input(INPUT_POST, 'width')){
        $width = filter_input(INPUT_POST, 'width');
    }else{
        $err_msg = 'width invalid';
        $width = NULL;
    }
}
if(!isset($sqft)){
    if(filter_input(INPUT_POST, 'sqft')){
        $sqft = filter_input(INPUT_POST, 'sqft');
    }else{
        $err_msg = 'sqft invalid';
        $sqft = NULL;
    }
}
if(!isset($b_width)){
    if(filter_input(INPUT_POST, 'b_width')){
        $b_width = filter_input(INPUT_POST, 'b_width');
    }else{
        $err_msg = 'b_width invalid';
        $b_width = NULL;
    }
}
if(!isset($b_species)){
    if(filter_input(INPUT_POST, 'b_species')){
        $b_species = filter_input(INPUT_POST, 'b_species');
    }else{
        $err_msg = 'b_species invalid';
        $b_species = NULL;
    }
}
if(!isset($inv_id)){
    if(filter_input(INPUT_POST, 'inv_id')){
        $inv_id = filter_input(INPUT_POST, 'inv_id');
    }else{
        $err_msg = 'inv_id invalid';
        $inv_id = NULL;
    }
}
if(!isset($s_id)){
    if(filter_input(INPUT_POST, 's_id')){
        $s_id = filter_input(INPUT_POST, 's_id');
    }else{
        $err_msg = 's_id invalid';
        $s_id = NULL;
    }
}
$sort_prices = 'SELECT * FROM bundle
                INNER JOIN skid
                    ON bundle.skid_id = skid.skid_id
                ORDER BY skid_price DESC';
$statement = $db->prepare($sort_prices);
$statement->execute();
$sort_prices = $statement->fetchAll();
$statement->closeCursor();

$skid_bundle = 'SELECT * FROM bundle
                INNER JOIN skid
                    ON bundle.skid_id = skid.skid_id
                WHERE visible = 1';
                
$statement1 = $db->prepare($skid_bundle);
$statement1->execute();
$skid_bundle = $statement1->fetchAll();
$statement1->closeCursor();

                        
$query_skid = 'SELECT * FROM skid
                    ORDER BY skid_id';
$statement2 = $db->prepare($query_skid);
$statement2->execute();
$skids = $statement2->fetchAll();
$statement2->closeCursor();

$query_bundle = 'SELECT * FROM bundle
                    ORDER BY bundle_id';
$statement3 = $db->prepare($query_bundle);
$statement3->execute();
$bundles = $statement3->fetchAll();
$statement3->closeCursor();

$query_password = 'SELECT emp_lname, emp_password FROM employee';
$statement4 = $db->prepare($query_password);
$statement4->execute();
$passwords = $statement4->fetchAll();
$statement4->closeCursor();

$query_width = 'SELECT DISTINCT width FROM bundle
                    ORDER BY width';
$statement5 = $db->prepare($query_width);
$statement5->execute();
$widths = $statement5->fetchAll();
$statement5->closeCursor();

$query_b_width = 'SELECT skid.skid_id, location, species, width, bundle_qty FROM skid
                    INNER JOIN bundle
                        ON bundle.skid_id = skid.skid_id
                    WHERE species = :b_species
                    AND width = :b_width';
$statement6 = $db->prepare($query_b_width);
$statement6->bindValue(':b_species', $b_species);
$statement6->bindValue(':b_width', $b_width);
$statement6->execute();
$each_bundles = $statement6->fetchAll();
$statement6->closeCursor();

$bundles = 0;
foreach($each_bundles as $each_bundle){
    $bundles += $each_bundle['bundle_qty'];
}

$query_invoice = 'SELECT * FROM invoice
                    INNER JOIN invoice_line
                        ON invoice.invoice_id = invoice_line.invoice_id
                    ORDER BY invoice.invoice_id';
$statement7 = $db->prepare($query_invoice);
$statement7->execute();
$invoices = $statement7->fetchAll();
$statement7->closeCursor();

$price_select_query = 'SELECT DISTINCT skid_price FROM skid
                        ORDER BY skid_price';

$statement8 = $db->prepare($price_select_query);
$statement8->execute();
$select_prices = $statement8->fetchAll();
$statement8->closeCursor();

$species_select_query = 'SELECT DISTINCT species FROM skid
                        ORDER BY species';

$statement9 = $db->prepare($species_select_query);
$statement9->execute();
$select_species = $statement9->fetchAll();
$statement9->closeCursor();

$sqft_select_query = 'SELECT DISTINCT square_foot FROM skid
                        ORDER BY square_foot';

$statement10 = $db->prepare($sqft_select_query);
$statement10->execute();
$select_sqfts = $statement10->fetchAll();
$statement10->closeCursor();




include("admin.php");
?>