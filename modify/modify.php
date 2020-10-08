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
        Admin Edit Page</span><br>
        <a href='../admin/index.php'><button class='btn btn-primary' id='edit' type='button'>Search</button></a>
    </div>
    
    
    <div class='row'>
        <div class='col-md-2' id='sidebar'>   
<!-- Add Skid -->
            <form action='index.php' method='post' id="">
                <h2>Add Skid/Add Bundles</h2>
                <div class="col" id="drop_downs">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='skid_id_add' placeholder="Skid #" value='<?php echo $skid_id_add; ?>' aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" name='select' value='skid_add' type="submit">Button</button>
                        </div>
                    </div>
                </div>
            </form>
<!-- Edit Skid -->
            <form action="index.php" method='post' id="">
                <h2>Edit Skid</h2>
                <div class="col" id="drop_downs">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='skid_id_edit' placeholder="Skid #" value='<?php echo $skid_id_edit; ?>' aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" name='select' value='skid_edit' type="submit">Button</button>
                        </div>
                    </div>
                </div>
            </form>
<!-- Invoice Add -->
            <form action="index.php" method='post'>
                <h2>Add Invoice</h2>
                <div class="col" id="drop_downs">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='inv_num_add' placeholder="Invoice #" value='<?php echo $inv_num_add; ?>' aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" name='select' value='invoice_add' type="submit">Button</button>
                        </div>
                    </div>
                </div>
            </form>
<!-- Invoice Edit -->
            <form action="index.php" method='post'>
                <h2>Edit Invoice</h2>
                <div class="col" id="drop_downs">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='inv_num_edit' placeholder="Leave blank for all" value='<?php echo $inv_num_edit; ?>' aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" name='select' value='invoice_edit' type="submit">Button</button>
                        </div>
                    </div>
                </div>  
            </form>
        </div>
<!-- Add Skid Form -->
    <?php if($action == 'skid_add'): ?>
        <div class='col-md-4' id='table_data' id='test'>
            <form action="add_skid.php" method='post'>
                <h2>Add Skid: MS-<?php echo $skid_id_add ?></h2>
                <label for="skid_id_edit" id='skid_edit_label'>Skid ID</label>
                <input class="form-control" id='input_skid_add' type="text" name="skid_id" value='MS-<?php echo $skid_id_add; ?>'>
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Location</label>
                <input class="form-control" id='input_skid_add' type="text" name="skid_loc">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Species </label>
                <input class="form-control" id='input_skid_add' type="text" name="species">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Thickness </label>
                <input class="form-control" id='input_skid_add' type="text" name="thickness">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Edge </label>
                <input class="form-control" id='input_skid_add' type="text" name="edge">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Square Footage </label>
                <input class="form-control" id='input_skid_add' type="text" name="sqft">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Skid Price </label>
                <input class="form-control" id='input_skid_add' type="text" name="s_price">
    
                <label for="skid_id_edit" id='skid_edit_label'>Bundle Price </label>
                <input class="form-control" id='input_skid_add' type="text" name="b_price">
    
                <label for="skid_id_edit" id='skid_edit_label'>Vendor </label>
                <input class="form-control" id='input_skid_add' type="text" name="vendor_id">

                <label for="skid_id_edit" id='skid_edit_label'>Date Received </label>
                <input class="form-control" id='input_skid_add' type="text" name="date_rec">
                
                <label for="skid_id_edit" id='skid_edit_label'>Width</label>
                <input class="form-control" id='input_skid_add' type="text" name="width">
    
                <label for="skid_id_edit" id='skid_edit_label'>Bundles</label>
                <input class="form-control" id='input_skid_add' type="text" name="bundles">
                
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" name='select' value='add_skid' type="submit" id='submit_button'>Add Skid</button>
                    <button class="btn btn-outline-secondary" name='select' value='invoice_edit' type="submit" id='delete_button'>Cancel</button>
                </div>
            </form>
        </div>
        <div class='col-md-6' id='table_data'>
            <form action="add_skid.php" method='post'>
                <h2><h2>Add Bundles to Skid: MS-<?php echo $skid_id_add ?></h2></h2>
                <input type="hidden" name='skid_id' value='<?php echo $skid_id_add ?>'>
                <label for="skid_id_edit" id='skid_edit_label'>Width</label>
                <input class="form-control" id='input_skid_add' type="text" name="width">
    
                <label for="skid_id_edit" id='skid_edit_label'>Bundles</label>
                <input class="form-control" id='input_skid_add' type="text" name="bundles">
    
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" name='select' value='add_bundle' type="submit" id='submit_button'>Add Bundle</button>
                    <button class="btn btn-outline-secondary" name='select' value='invoice_edit' type="submit" id='delete_button'>Clear</button>
                </div>
            </form>  
        </div>
        </div>
        
    <?php endif ?>
<!-- Edit Skid Form -->
    <?php if($action == 'skid_edit'): ?>
        <div class='col-md-10' id='table_data'>
            <h2>Edit Skid: MS-<?php echo $skid_id_edit ?></h2>
            <div class="table-responsive" >
            <table class="table table-striped table-sm" id="test">
                <thead>
                    <tr>
                        <th scope="col">Skid ID</th>
                        <th scope="col">Width</th>
                        <th scope="col">Bundles</th>
                        <th scope="col">Species</th>
                        <th scope="col">Thickness</th>
                        <th scope="col">Edge</th>
                        <th scope="col">Square Feet</th>
                        <th scope="col">Visible</th>
                    </tr>
                </thead>
                <tbody>
                 <?php foreach($skids as $skid): ?>
                <form class="form-group row" action="edit_skid.php" method='post' >
                   
                        <tr>
                            <th scope='row'><?php echo $skid['skid_id']; ?>
                            <input type="hidden" name='skid_id' value='<?php echo $skid_id_edit; ?>'>
                            <input type="hidden" name='width' value='<?php echo $skid['width']; ?>'>
                            <td><?php echo $skid['width']; ?>"</td>
                            <td><input type="text" id='bundle_input_box' name='bundle_qty' value='<?php echo $skid['bundle_qty']; ?>'></td>
                            <td><?php echo $skid['species']; ?></td>
                            <td><?php echo $skid['thickness']; ?>"</td>
                            <td><?php echo $skid['edge']; ?></td>
                            <td><?php echo $skid['square_foot']; ?></td>
                            <td>
                            <?php if($skid['visible']){
                                echo 'True';
                            }else{
                                echo 'False';
                            } ?>
                            </td>
                            <td>
                                <input type="checkbox" class="" id="exampleCheck1" name='hide'>
                                <label class="form-check-label" for="exampleCheck1">Hide</label>
                                <input type="checkbox" class="" id="exampleCheck1" name='show'>
                                <label class="form-check-label" for="exampleCheck1">Show</label>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm" name='select' value='update_bundle' type="submit" id='row_button'>Update</button>
                            </td>
                        </tr>
                    </form>
                    <?php endforeach ?>
                
                <form class="form-group row" action="edit_skid.php" method='post' >
                
                    <div class='row' id='label_row'>
                        <div class='col-xs-1 col-sm-1 col-md-1 col-lg-2'>
                            <label for="skid_id_edit" id='skid_edit_label'>Skid Price</label>
                            <input type="text" class="form-control" name='skid_price' value='<?php echo $skids[0]['skid_price']; ?>' aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        <div class='col-xs-1 col-sm-2 col-md-2 col-lg-2'>
                            <label for="skid_id_edit" id='skid_edit_label'>Bundle Price</label>
                            <input type="text" class="form-control" name='bund_price' value='<?php echo $skids[0]['bund_price']; ?>' aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        <div class='col-xs-1 col-sm-2 col-md-2 col-lg-2'>
                            <label for="skid_id_edit" id='skid_edit_label'>Date Received</label>
                            <input type="text" class="form-control" name='date_received' value='<?php echo $skids[0]['date_received']; ?>' aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                        <div class='col-xs-1 col-sm-2 col-md-2 col-lg-2'>
                            <label for="skid_id_edit" id='skid_edit_label'>Date Counted</label>
                            <input type="text" class="form-control" name='date_counted' value='<?php echo $skids[0]['date_counted']; ?>' aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="input-group-append">
                    <input type="hidden" name='skid_id' value='<?php echo $skid_id_edit; ?>'>
                        <button class="btn btn-outline-secondary" name='select' value='update_skid' type="submit" id='submit_button'>Submit Changes</button>

                    </div>
                   
                </form>
                </tbody>
            </table>
            </div>
            
            
        </div>
    <?php endif ?>
<!-- Invoice_edit Form -->
    <?php if($action == 'invoice_edit'): ?>
        <div class='col-md-10' id='table_data'>
            <h2>Invoice</h2>
            <div class="table-responsive" >
            <table class="table table-striped table-sm" id="test">
                <thead>
                    <tr>
                        <th scope="col">Invoice ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Invoice Date</th>
                        <th scope="col">Skid ID</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Line Price</th>
                        <th scope="col">Paid Status</th>
                    </tr>
                </thead>
                <tbody>

                <?php if($inv_num_edit != FALSE): ?>
                <form class="form-group row" action="invoice_edit.php" method='post' >
                    <tr>
                        <td><?php echo $invoices[0]['invoice_id']; ?></td>
                        <td><?php echo $invoices[0]['emp_id']; ?></td>
                        <td><?php echo $invoices[0]['cust_id']; ?></td>
                        <td><?php echo $invoices[0]['inv_date']; ?></td>
                        <td><?php echo $invoices[0]['skid_id']; ?></td>
                        <td><?php echo $invoices[0]['quantity']; ?></td>
                        <td>$<input type="text" name='line_price' value ='<?php echo $invoices[0]['line_price']; ?>'></td>
                        <td>
                            <?php if($invoices[0]['paid_status']){
                                echo 'True';
                            }else{
                                echo 'False';
                            } ?>
                            </td>
                        <td>
                            <input type="checkbox" class="" id="exampleCheck1" name='paid'>
                            <label class="form-check-label" for="exampleCheck1">Paid</label>
                            <input type="checkbox" class="" id="exampleCheck1" name='unpaid'>
                            <label class="form-check-label" for="exampleCheck1">Unpaid</label>
                        </td>

                        <input type="hidden" name='invoice_id' value='<?php echo $invoices[0]['invoice_id']; ?>'>

                        <td><button class="btn btn-outline-secondary btn-sm" name='select' value='update_invoice' type="submit" id='row_button'>Update</button></td>
                    </tr>
                </form>
                <?php else:
                        foreach($invoices as $invoice): 
                 ?>
                <form class="form-group row" action="invoice_edit.php" method='post' >
                    <tr>
                        <td><?php echo $invoice['invoice_id']; ?></td>
                        <td><?php echo $invoice['emp_id']; ?></td>
                        <td><?php echo $invoice['cust_id']; ?></td>
                        <td><?php echo $invoice['inv_date']; ?></td>
                        <td><?php echo $invoice['skid_id']; ?></td>
                        <td><?php echo $invoice['quantity']; ?></td>
                        <td>$<input type="text" name='line_price' value ='<?php echo $invoice['line_price']; ?>'></td>
                        <td>
                            <?php if($invoice['paid_status']){
                                echo 'True';
                            }else{
                                echo 'False';
                            } ?>
                            </td>
                        <td>
                            <input type="checkbox" class="" id="exampleCheck1" name='paid'>
                            <label class="form-check-label" for="exampleCheck1">Paid</label>
                            <input type="checkbox" class="" id="exampleCheck1" name='unpaid'>
                            <label class="form-check-label" for="exampleCheck1">Unpaid</label>
                        </td>

                        <input type="hidden" name='invoice_id' value='<?php echo $invoice['invoice_id']; ?>'>

                        <td><button class="btn btn-outline-secondary btn-sm" name='select' value='update_invoice' type="submit" id='row_button'>Update</button></td>
                    </tr>
                </form>
                <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
            </div> 
        </div>
    <?php endif ?>
<!-- Add Skid Form -->
    <?php if($action == 'invoice_add'): ?>
        <div class='col-md-10' id='table_data' id='test'>
            <form action="invoice_add.php" method='post'>
                <h2>Add Invoice</h2>
                <label for="skid_id_edit" id='skid_edit_label'>Invoice ID</label>
                <input class="form-control" id='input_skid_add' type="text" name="invoice_id" value='<?php echo $inv_num_add; ?>'>
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Employee ID</label>
                <input class="form-control" id='input_skid_add' type="text" name="emp_id">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Customer ID </label>
                <input class="form-control" id='input_skid_add' type="text" name="cust_id">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Date </label>
                <input class="form-control" id='input_skid_add' type="text" name="inv_date">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Skid ID </label>
                <input class="form-control" id='input_skid_add' type="text" name="skid_id">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Quantity </label>
                <input class="form-control" id='input_skid_add' type="text" name="quantity">
    
    
                <label for="skid_id_edit" id='skid_edit_label'>Line Price</label>
                <input class="form-control" id='input_skid_add' type="text" name="line_price">
                
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" name='select' value='add_skid' type="submit" id='submit_button'>Add Skid</button>
                </div>
            </form>
        </div>
        
        
    <?php endif ?>
    </div>
    <footer><a href="../index.php">Home</a></footer>
</div>

<script src="../scripts/jquery-3.4.1.js"></script>
<script src="../scripts/js/bootstrap.min.js"></script>
</body>
</html>