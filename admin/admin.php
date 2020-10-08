<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../scripts/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../scripts/css/style.css">

    <title>ADMIN</title>
</head>
<body>

<div class='row' id="">
<div class='container-fluid' id='full'>
    <div class='col-12' id="header">
        <?php echo $connect_message; ?>
        <span id="subhead"><!-- <img src="../img/HM-Banner1.png" class="img-fluid" alt="Responsive image"> -->
        Admin Search Page</span><br>
        <a href='../modify/index.php'><button class='btn btn-primary' id='edit' type='button'>Edit</button></a>
    </div>
    
    
    <div class='row'>
        <div class='col-md-2' id='sidebar'>
                <h2>Queries</h2>
               <form action='index.php' method='post' id="myForm">
<!-- Price select -->
                    <div class="col" id="drop_downs">
                        <label for="exampleFormControlSelect1">Price</label>
                        <div class='input-group'>
                            <select class="form-control" id="price_select" name='price'>
                            <option selected disabled>Choose One</option>
                            <option value="3"<?php if($price == '3') echo 'selected' ?>>$3 or less</option>
                            <option value="4"<?php if($price == '4') echo 'selected' ?>>$4 or less</option>
                            <option value="5"<?php if($price == '5') echo 'selected' ?>>$5 or less</option>
                            </select>
                            <span class="input-group-btn">
                                <!-- <input type="submit" class="btn btn-primary" value='Price' name='select'> -->
                                <button class='btn btn-primary' name='select' value='price' type='submit'>Search</button>
                            </span>
                        </div>
                    </div>
<!-- Species select -->
                    <div class="col" id="drop_downs">
                        <label for="exampleFormControlSelect1">Species</label>
                        <div class="input-group">
                            <select class="form-control" id="species_select" name='species'>
                            <option selected disabled>Choose One</option>
                            <?php foreach($select_species as $select_spec):
                                if($select_spec['species'] == $species){
                                    $is_selected = "selected";
                                }else{
                                    $is_selected = "";
                                }
                            ?>
                            <option value="<?php echo $select_spec['species']; ?>"<?php echo $is_selected; ?>> <?php echo $select_spec['species']; ?></option>
                            <?php endforeach ?>
                            </select>
                            <span class="input-group-btn">
                                <!-- <input type="submit" class="btn btn-primary" value='Species' name='select'> -->
                                <button class='btn btn-primary' name='select' value='species' type='submit'>Search</button>
                            </span>
                        </div>
                    </div>
<!-- Width select -->
                    <div class="col" id="drop_downs">
                        <label for="exampleFormControlSelect1">Width</label>
                        <div class='input-group'>
                            <select class="form-control" id="width_select" name='width'>
                            <option selected disabled>Choose One</option>
                            <?php foreach($widths as $w):
                                if($w['width'] == $width){
                                    $is_selected = "selected";
                                }else{
                                    $is_selected = "";
                                }
                            ?>
                            <option value="<?php echo $w['width']; ?>"<?php echo $is_selected; ?>> <?php echo $w['width']; ?></option>
                            <?php endforeach ?>
                            </select>
                            <span class="input-group-btn">
                                <!-- <input type="submit" class="btn btn-primary" value='Width' name='select'> -->
                                <button class='btn btn-primary' name='select' value='width' type='submit'>Search</button>
                            </span>
                        </div>
                    </div>
<!-- SQFT select -->
                    <div class="col" id="drop_downs">
                        <label for="exampleFormControlSelect1">Square Footage</label>
                        <div class='input-group'>
                            <select class="form-control" id="sqft_select" name='sqft'>
                            <option selected disabled>Choose One</option>
                            <?php foreach($select_sqfts as $select_sqft):
                                if($select_sqft['square_foot'] == $sqft){
                                    $is_selected = "selected";
                                }else{
                                    $is_selected = "";
                                }
                            ?>
                            <option value="<?php echo $select_sqft['square_foot']; ?>"<?php echo $is_selected; ?>> <?php echo $select_sqft['square_foot']; ?></option>
                            <?php endforeach ?>
                            </select>
                            <span class="input-group-btn">
                                <!-- <input type="submit" class="btn btn-primary" value='SQFT' name='select'> -->
                                <button class='btn btn-primary' name='select' value='square_foot' type='submit'>Search</button>
                            </span>
                        </div>
                    </div>
<!-- Skid ID select -->
                    <div class="col" id="drop_downs">
                        <label for="exampleFormControlSelect1">Skid ID</label>
                        <div class='input-group'>
                            <select class="form-control" id="id_select" name='s_id'>
                            <option selected disabled>Choose One</option>
                            <?php foreach($skids as $skid):
                                if($skid['skid_id'] == $s_id){
                                    $is_selected = "selected";
                                }else{
                                    $is_selected = "";
                                }
                            ?>
                            <option value="<?php echo $skid['skid_id']; ?>"<?php echo $is_selected; ?>> <?php echo $skid['skid_id']; ?></option>
                            <?php endforeach ?>
                            </select>
                            <span class="input-group-btn">
                                <!-- <input type="submit" class="btn btn-primary" value='SQFT' name='select'> -->
                                <button class='btn btn-primary' name='select' value='s_id' type='submit'>Search</button>
                            </span>
                        </div>
                    </div>
<!-- Bundle by Species select-->
                    <div class="col" id="drop_downs">
                        <label for="exampleFormControlSelect1">How many Widths</label>
                        <div class='input-group'>
                        <select class="form-control" id="b_s_select" name='b_species'>
                            <option selected disabled>Pick</option>
                            <?php foreach($select_species as $select_spec):
                                if($select_spec['species'] == $b_species){
                                    $is_selected = "selected";
                                }else{
                                    $is_selected = "";
                                }
                            ?>
                            <option value="<?php echo $select_spec['species']; ?>"<?php echo $is_selected; ?>> <?php echo $select_spec['species']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <select class="form-control" id="b_w_select" name='b_width'>
                            <option selected disabled>Pick</option>
                            <?php foreach($widths as $w):
                                if($w['width'] == $b_width){
                                    $is_selected = "selected";
                                }else{
                                    $is_selected = "";
                                }
                            ?>
                            <option value="<?php echo $w['width']; ?>"<?php echo $is_selected; ?>> <?php echo $w['width']; ?></option>
                            <?php endforeach ?>
                        </select>
                            <span class="input-group-btn">
                                <button class='btn btn-primary' name='select' value='b_id' type='submit'>Search</button>
                            </span>
                        </div>
                    </div>
<!-- Invoices select-->
                    <div class="col" id="drop_downs">
                        <label for="exampleFormControlSelect1">Invoice</label>
                        <div class='input-group'>
                            <select class="form-control" id="invoice_select" name='inv_id'>
                            <option selected disabled>Choose One</option>
                            <?php foreach($invoices as $invoice):
                                if($invoice['invoice_id'] == $inv_id){
                                    $is_selected = "selected";
                                }else{
                                    $is_selected = "";
                                }
                            ?>
                            <option value="<?php echo $invoice['invoice_id']; ?>"<?php echo $is_selected; ?>> <?php echo $invoice['invoice_id']; ?></option>
                            <?php endforeach ?>
                            </select>
                            <span class="input-group-btn">
                                <!-- <input type="submit" class="btn btn-primary" value='SQFT' name='select'> -->
                                <button class='btn btn-primary' name='select' value='inv_id' type='submit'>Search</button>
                            </span>
                        </div>
                    </div>
<!-- Customers select not wanted now-->
<!-- Vendors select not wanted now-->
                    <div class="col">
                        <input type="submit" class="btn btn-primary" value='View All' name='select'>
                        <input type="submit" class="btn btn-primary" value='View Hidden' name='select'>
                    </div>
               </form>
        </div>
<!-- VIEW ALL BUTTON -->
         <?php if($action == 'View All'): ?>
        <div class='col-md-10' id='table_data'>
            <h2>All Overstock Flooring Skids</h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">Skid ID</th>
                    <th scope="col">Species</th>
                    <th scope="col">Thickness</th>
                    <th scope="col">Edge</th>
                    <th scope="col">Width</th>
                    <th scope="col">Bundles</th>
                    <th scope="col">Square Feet</th>
                    <th scope="col">SqFt Price</th>
                    <th scope="col">Bundle Price</th>
                    <th scope="col">Bundle Total</th>
                    <th scope="col">Skid Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($skid_bundle as $skid): ?>
                    <tr>
                        <th scope='row'><?php echo $skid['skid_id']; ?>
                        <td><?php echo $skid['species']; ?></td>
                        <td><?php echo $skid['thickness']; ?>"</td>
                        <td><?php echo $skid['edge']; ?></td>
                        <td><?php echo $skid['width']; ?>"</td>
                        <td><?php echo $skid['bundle_qty']; ?></td>
                        <td><?php echo $skid['square_foot']; ?></td>
                        <td>$<?php echo $skid['skid_price']; ?></td>
                        <td>$<?php echo $skid['bund_price']; ?></td>
                        <td>$
                            <?php
                                if($skid['width'] <=3.5){
                                $bund_total = ((($skid['width'] * 84) / 12) * $skid['bund_price']) * $skid['bundle_qty'];
                                echo number_format((float)$bund_total, 2);
                                }else{
                                    $bund_total = ((($skid['width'] * 42) / 12) * $skid['bund_price']) * $skid['bundle_qty'];
                                    echo number_format((float)$bund_total, 2);
                                }

                            ?>
                        </td>
                        <td>$<?php echo number_format((float)$skid['skid_price'] * $skid['square_foot'], 2); ?></td>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php endif ?>

<!-- Price -->
        <?php if($action == "price"): ?>
        <div class='col-md-10' id='table_data'>
            <h2>Available Skids for: $<?php echo $price ?> per square foot</h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">Skid ID</th>
                    <th scope="col">Species</th>
                    <th scope="col">Thickness</th>
                    <th scope="col">Edge</th>
                    <th scope="col">Width</th>
                    <th scope="col">Bundles</th>
                    <th scope="col">Square Feet</th>
                    <th scope="col">SqFt Price</th>
                    <th scope="col">Bundle Price</th>
                    <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($sort_prices as $sort_price): ?>
                <?php if($sort_price['skid_price'] <= $price): ?>
                    <tr>
                        <th scope='row'><?php echo $sort_price['skid_id']; ?>
                        <td><?php echo $sort_price['species']; ?></td>
                        <td><?php echo $sort_price['thickness']; ?>"</td>
                        <td><?php echo $sort_price['edge']; ?></td>
                        <td><?php echo $sort_price['width']; ?>"</td>
                        <td><?php echo $sort_price['bundle_qty']; ?></td>
                        <td><?php echo $sort_price['square_foot']; ?></td>
                        <td>$<?php echo $sort_price['skid_price']; ?></td>
                        <td>$<?php echo $sort_price['bund_price']; ?></td>
                        <td>$<?php echo ($sort_price['skid_price'] * $sort_price['square_foot']); ?></td>
                <?php endif ?>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php endif ?>
<!-- Species -->
        <?php if($action == "species"): ?>
        <div class='col-md-10' id='table_data'>
            <h2><?php echo $species ?> Skids</h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">Skid ID</th>
                    <th scope="col">Species</th>
                    <th scope="col">Thickness</th>
                    <th scope="col">Edge</th>
                    <th scope="col">Width</th>
                    <th scope="col">Bundles</th>
                    <th scope="col">Square Feet</th>
                    <th scope="col">SqFt Price</th>
                    <th scope="col">Bundle Price</th>
                    <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($skid_bundle as $skid): ?>
                <?php if($skid['species'] == $species): ?>
                    <tr>
                        <th scope='row'><?php echo $skid['skid_id']; ?>
                        <td><?php echo $skid['species']; ?></td>
                        <td><?php echo $skid['thickness']; ?>"</td>
                        <td><?php echo $skid['edge']; ?></td>
                        <td><?php echo $skid['width']; ?>"</td>
                        <td><?php echo $skid['bundle_qty']; ?></td>
                        <td><?php echo $skid['square_foot']; ?></td>
                        <td>$<?php echo $skid['skid_price']; ?></td>
                        <td>$<?php echo $skid['bund_price']; ?></td>
                        <td>$<?php echo ($skid['skid_price'] * $skid['square_foot']); ?></td>
                <?php endif ?>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php endif ?>
<!-- Width -->
        <?php if($action == "width"): ?>
        <div class='col-md-10' id='table_data'>
            <h2><?php echo $width ?>" Skids</h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">Skid ID</th>
                    <th scope="col">Species</th>
                    <th scope="col">Thickness</th>
                    <th scope="col">Edge</th>
                    <th scope="col">Width</th>
                    <th scope="col">Bundles</th>
                    <th scope="col">Square Feet</th>
                    <th scope="col">SqFt Price</th>
                    <th scope="col">Bundle Price</th>
                    <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($skid_bundle as $skid): ?>
                <?php if($skid['width'] == $width): ?>
                    <tr>
                        <th scope='row'><?php echo $skid['skid_id']; ?>
                        <td><?php echo $skid['species']; ?></td>
                        <td><?php echo $skid['thickness']; ?>"</td>
                        <td><?php echo $skid['edge']; ?></td>
                        <td><?php echo $skid['width']; ?>"</td>
                        <td><?php echo $skid['bundle_qty']; ?></td>
                        <td><?php echo $skid['square_foot']; ?></td>
                        <td>$<?php echo $skid['skid_price']; ?></td>
                        <td>$<?php echo $skid['bund_price']; ?></td>
                        <td>$<?php echo ($skid['skid_price'] * $skid['square_foot']); ?></td>
                <?php endif ?>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php endif ?>
<!-- SQFT -->
        <?php if($action == "square_foot"): ?>
        <div class='col-md-10' id='table_data'>
            <h2><?php echo $sqft ?> SQFT Skids</h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">Skid ID</th>
                    <th scope="col">Species</th>
                    <th scope="col">Thickness</th>
                    <th scope="col">Edge</th>
                    <th scope="col">Width</th>
                    <th scope="col">Bundles</th>
                    <th scope="col">Square Feet</th>
                    <th scope="col">SqFt Price</th>
                    <th scope="col">Bundle Price</th>
                    <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($skid_bundle as $skid): ?>
                <?php if($skid['square_foot'] == $sqft): ?>
                    <tr>
                        <th scope='row'><?php echo $skid['skid_id']; ?>
                        <td><?php echo $skid['species']; ?></td>
                        <td><?php echo $skid['thickness']; ?>"</td>
                        <td><?php echo $skid['edge']; ?></td>
                        <td><?php echo $skid['width']; ?>"</td>
                        <td><?php echo $skid['bundle_qty']; ?></td>
                        <td><?php echo $skid['square_foot']; ?></td>
                        <td>$<?php echo $skid['skid_price']; ?></td>
                        <td>$<?php echo $skid['bund_price']; ?></td>
                        <td>$<?php echo ($skid['skid_price'] * $skid['square_foot']); ?></td>
                <?php endif ?>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php endif ?>
<!-- Skid ID -->
        <?php if($action == "s_id"): ?>
        <div class='col-md-10' id='table_data'>
            <h2>Skid: <?php echo $s_id ?></h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">Skid ID</th>
                    <th scope="col">Species</th>
                    <th scope="col">Thickness</th>
                    <th scope="col">Edge</th>
                    <th scope="col">Width</th>
                    <th scope="col">Bundles</th>
                    <th scope="col">Square Feet</th>
                    <th scope="col">SqFt Price</th>
                    <th scope="col">Bundle Price</th>
                    <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($skid_bundle as $skid): ?>
                <?php if($skid['skid_id'] == $s_id): ?>
                    <tr>
                        <th scope='row'><?php echo $skid['skid_id']; ?>
                        <td><?php echo $skid['species']; ?></td>
                        <td><?php echo $skid['thickness']; ?>"</td>
                        <td><?php echo $skid['edge']; ?></td>
                        <td><?php echo $skid['width']; ?>"</td>
                        <td><?php echo $skid['bundle_qty']; ?></td>
                        <td><?php echo $skid['square_foot']; ?></td>
                        <td>$<?php echo $skid['skid_price']; ?></td>
                        <td>$<?php echo $skid['bund_price']; ?></td>
                        <td>$<?php echo ($skid['skid_price'] * $skid['square_foot']); ?></td>
                <?php endif ?>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php endif ?>
<!-- Bundle by Species -->
        <?php if($action == "b_id"): ?>
        <div class='col-md-10' id='table_data'>
            <h2><?php echo $b_species; echo ": "; echo $b_width ?>"</h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Species</th>
                        <th scope="col">Width</th>
                        <th scope="col">Bundles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $b_species; ?></td>
                        <td><?php echo $b_width; ?>"</td>
                        <td><?php echo $bundles; ?></td>
                    </tr>  
                </tbody>
            </table>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Location</th>
                        <th scope="col">Bundles</th>
                        <th scope="col">Width</th>
                        <th scope="col">Species</th>      
                    </tr>
                    <?php foreach($each_bundles as $each_bundle): ?>
                    <tr>
                        <td><?php echo $each_bundle['location']; ?></td>
                        <td><?php echo $each_bundle['bundle_qty']; ?></td>
                        <td><?php echo $each_bundle['width']; ?></td>
                        <td><?php echo $each_bundle['species']; ?></td>
                    </tr>
                    <?php endforeach ?>
                </thead>
            </table>
            
            </div>
        </div>
        <?php endif ?>
<!-- Invoices -->
        <?php if($action == "inv_id"): ?>
        <div class='col-md-10' id='table_data'>
            <h2>Invoice #  <?php echo $inv_id ?></h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">Invoice ID</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Skid ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($invoices as $invoice): ?>
                <?php if($invoice['invoice_id'] == $inv_id): ?>
                    <tr>
                        <td><?php echo $invoice['invoice_id']; ?></td>
                        <td><?php echo $invoice['cust_id']; ?></td>
                        <td><?php echo $invoice['emp_id']; ?></td>
                        <td><?php echo $invoice['inv_date']; ?></td>
                        <td><?php echo $invoice['skid_id']; ?></td>
                        <td><?php echo $invoice['quantity']; ?></td>
                        <td>$<?php echo $invoice['line_price']; ?></td>
                        
                <?php endif ?>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php endif ?>
    </div>
    <footer><a href="../index.php">Home</a></footer>
</div>
</div>



<script src="../scripts/jquery-3.4.1.js"></script>
<script src="../scripts/js/bootstrap.min.js"></script>

<?php if($action == "price"): ?>
    <script>
            $('#sqft_select').prop('selectedIndex', "Choose One");
            $('#species_select').prop('selectedIndex', "Choose One");
            $('#width_select').prop('selectedIndex', "Choose One");
            $('#id_select').prop('selectedIndex', "Choose One");
            $('#b_s_select').prop('selectedIndex', "Choose One");
            $('#b_w_select').prop('selectedIndex', "Choose One");
            $('#invoice_select').prop('selectedIndex', "Choose One");
    </script>
<?php endif ?>
<?php if($action == "species"): ?>
    <script>
            $('#sqft_select').prop('selectedIndex', "Choose One");
            $('#price_select').prop('selectedIndex', "Choose One");
            $('#width_select').prop('selectedIndex', "Choose One");
            $('#id_select').prop('selectedIndex', "Choose One");
            $('#b_s_select').prop('selectedIndex', "Choose One");
            $('#b_w_select').prop('selectedIndex', "Choose One");
            $('#invoice_select').prop('selectedIndex', "Choose One");
    </script>
<?php endif ?>
<?php if($action == "width"): ?>
    <script>
            $('#sqft_select').prop('selectedIndex', "Choose One");
            $('#species_select').prop('selectedIndex', "Choose One");
            $('#price_select').prop('selectedIndex', "Choose One");
            $('#id_select').prop('selectedIndex', "Choose One");
            $('#b_s_select').prop('selectedIndex', "Choose One");
            $('#b_w_select').prop('selectedIndex', "Choose One");
            $('#invoice_select').prop('selectedIndex', "Choose One");
    </script>
<?php endif ?>
<?php if($action == "square_foot"): ?>
    <script>
            $('#price_select').prop('selectedIndex', "Choose One");
            $('#species_select').prop('selectedIndex', "Choose One");
            $('#width_select').prop('selectedIndex', "Choose One");
            $('#id_select').prop('selectedIndex', "Choose One");
            $('#b_s_select').prop('selectedIndex', "Choose One");
            $('#b_w_select').prop('selectedIndex', "Choose One");
            $('#invoice_select').prop('selectedIndex', "Choose One");
    </script>
<?php endif ?>
<?php if($action == "s_id"): ?>
    <script>
            $('#sqft_select').prop('selectedIndex', "Choose One");
            $('#price_select').prop('selectedIndex', "Choose One");
            $('#width_select').prop('selectedIndex', "Choose One");
            $('#species_select').prop('selectedIndex', "Choose One");
            $('#b_s_select').prop('selectedIndex', "Choose One");
            $('#b_w_select').prop('selectedIndex', "Choose One");
            $('#invoice_select').prop('selectedIndex', "Choose One");
    </script>
<?php endif ?>
<?php if($action == "b_id"): ?>
    <script>
            $('#sqft_select').prop('selectedIndex', "Choose One");
            $('#species_select').prop('selectedIndex', "Choose One");
            $('#price_select').prop('selectedIndex', "Choose One");
            $('#id_select').prop('selectedIndex', "Choose One");
            $('#sqft_select').prop('selectedIndex', "Choose One");
            $('#invoice_select').prop('selectedIndex', "Choose One");
    </script>
<?php endif ?>
<?php if($action == "inv_id"): ?>
    <script>
            $('#price_select').prop('selectedIndex', "Choose One");
            $('#species_select').prop('selectedIndex', "Choose One");
            $('#width_select').prop('selectedIndex', "Choose One");
            $('#id_select').prop('selectedIndex', "Choose One");
            $('#b_s_select').prop('selectedIndex', "Choose One");
            $('#b_w_select').prop('selectedIndex', "Choose One");
            $('#sqft_select').prop('selectedIndex', "Choose One");
    </script>
<?php endif ?>
</body>
</html>