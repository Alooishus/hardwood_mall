<?php
include("inc/db_connect.php");
/* include("../inc/functions.php"); */


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

$query_width = 'SELECT DISTINCT width FROM bundle
                    ORDER BY width';
$statement5 = $db->prepare($query_width);
$statement5->execute();
$widths = $statement5->fetchAll();
$statement5->closeCursor();

$price_select_query = 'SELECT DISTINCT skid_price FROM skid
                        ORDER BY skid_price';

$statement6 = $db->prepare($price_select_query);
$statement6->execute();
$select_prices = $statement6->fetchAll();
$statement6->closeCursor();

$species_select_query = 'SELECT DISTINCT species FROM skid
                        ORDER BY species';

$statement7 = $db->prepare($species_select_query);
$statement7->execute();
$select_species = $statement7->fetchAll();
$statement7->closeCursor();

$sqft_select_query = 'SELECT DISTINCT square_foot FROM skid
                        ORDER BY square_foot';

$statement8 = $db->prepare($sqft_select_query);
$statement8->execute();
$select_sqfts = $statement8->fetchAll();
$statement8->closeCursor();


include("stocksheet/stocksheet.php");
?>