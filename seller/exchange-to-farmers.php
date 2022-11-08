<?php include 'layouts/header.php';?>
<?php if(isset($_GET['transaction']) == 'true') { ?>
    <?php exchanger($_SESSION['exchange_cart_from'],$_SESSION['exchange_cart_to'])?>
<?php } ?>
<?php if(isset($_GET['farmers'])) { ?>
    <?php if(account_details($_GET['farmers'])->num_rows > 0) { ?>
        <?php $exchangeTo = account_details($_GET['farmers'])->fetch_assoc();?>
        <?php $exchangeFrom = account_details($_SESSION['vendor_id'])->fetch_assoc();?>
        <?php $storeFrom = store_details($exchangeFrom['id'])->fetch_assoc()?>
        <?php $storeTo = store_details($exchangeTo['id'])->fetch_assoc()?>
    <?php } else { ?>
        <?php header('location: exchange-to-farmers.php') ?>
    <?php } ?>
    
    <?php 
        if(isset($_POST['btn_exchange_from'])) { 
            global $db;
            $from_items    = $db->real_escape_string($_POST['from_items']);
            $from_quantity = $db->real_escape_string($_POST['from_quantity']);  
            exchange_products_from($from_items,$from_quantity,$_GET['farmers']);
        }
        
        if(isset($_POST['btn_exchange_to'])) { 
            global $db;
            $to_items    = $db->real_escape_string($_POST['to_items']);
            $to_quantity = $db->real_escape_string($_POST['to_quantity']);  
            exchange_products_to($to_items,$to_quantity,$_GET['farmers']);
        }
    ?>

<?php } ?>
<body>

    <!-- Main navbar -->
    <?php include 'layouts/top-navigation.php';?>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php include 'layouts/navigation.php';?>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content d-sm-flex">
                    <div class="page-title">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Exchange</span> -
                            Farmers</h4>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="dashboard.php" class="breadcrumb-item">Dashboard</a>
                            <a href="javascript:void(0"" class="breadcrumb-item">Exchange</a>
                            <a href="javascript:void(0"" class="breadcrumb-item active" aria-current="page">Farmers</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
                <!-- Basic card -->
                <?php if(isset($_GET['farmers'])) { ?>
                <?php if(isset($_SESSION['exchange_cart_from']) && count($_SESSION['exchange_cart_from']) > 0 && isset($_SESSION['exchange_cart_to']) && count($_SESSION['exchange_cart_to']) > 0) { ?>
                    <div class="form-group">
                        <a href="?transaction=true" class="btn btn-primary text-right">Complete Exchange</a>
                    </div>
                <?php } else { ?>
                <?php } ?>
                <?php } ?>
             
                <div class="row">
                    
                    <?php if(isset($_GET['farmers'])) { ?>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">(<?=$exchangeFrom['firstname'].' '.$exchangeFrom['surname']?> - <?=$storeFrom['store_name']?>)
                                    </div>

                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Items:</label>
											<div class="col-lg-9">
												<select name="from_items" class="form-control">
												    <?php foreach(exchange_products($_SESSION['vendor_id']) as $product) { ?>
												        <option value="<?=$product['product_id'].'='.$product['variations_id'].'='.$product['price'].'='.$product['stocks'].'='.$product['title'].'='.$product['variant']?>"><?=$product['title'].' - '.$product['variant'].' - ₱'.$product['price']?> - <?=$product['stocks']?> Stocks Available</option>
												    <?php } ?>
												</select>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Quantity:</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="from_quantity" required>
											</div>
										</div>
										
										<div class="form-group row mb-0">
											<label class="col-lg-3 col-form-label"></label>
											<div class="col-lg-9 text-right  mb-0">
												<button class="btn btn-primary" name="btn_exchange_from" type="submit">Exchange</button>
											</div>
										</div>
									</form>
									<hr>
									<h5>My Exchange Lists</h5>
									<table class='table'>
									    <thead>
									        <tr>
    									        <th>Item</th>
        									    <th style="width:1px">Price</th>
        									    <th style="width:1px">Qty</th>
        									    <th style="width:1px">Total</th>
        									    <th style="width:1px"></th>
    									    </tr>
									    </thead>
									    <tbody>
									        <?php if(isset($_SESSION['exchange_cart_from'])) { ?>
									        <?php $total = 0;?>
									        <?php $i=0;?>
									        <?php foreach($_SESSION['exchange_cart_from'][$_SESSION['vendor_id']] as $ef) { ?>
									        <?php $total += $ef['price'] * $ef['quantity'];?>
									        <tr>
									            <td><?=$ef['title'].' - '.$ef['variant']?></td>
									            <td class="text-center" style="width:1px">₱<?=number_format($ef['price'],2)?></td>
									            <td class="text-center" style="width:1px"><?=$ef['quantity']?></td>
									            <td class="text-center" style="width:1px">₱<?=number_format($ef['price']*$ef['quantity'],2)?></td>
									            <td style="width:1px"><a href="?remove=true&exchange_id=<?=$i?>">Remove</a></td>
									        </tr>
									        <?php $i++?>
									        <?php } ?>
									        <?php } else { ?>
									        <tr>
									            <td class="text-center" colspan=5>No record found</td>
									        </tr>
									        <?php } ?>
									    </tbody>
									    <tfoot>
									        <tr>
									            <td colspan=3 class="text-right">Total</td>
									            <td class="text-center">₱<?=isset($total) ? number_format($total,2) : 0?></td>
									            <td></td>
									        </tr>
									    </tfoot>
									</table>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">(<?=$exchangeTo['firstname'].' '.$exchangeTo['surname']?> - <?=$storeTo['store_name']?>)</div>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Items:</label>
											<div class="col-lg-9">
												<select name="to_items" class="form-control">
												    <?php foreach(exchange_products($_GET['farmers']) as $product) { ?>
												        <option value="<?=$product['product_id'].'='.$product['variations_id'].'='.$product['price'].'='.$product['stocks'].'='.$product['title'].'='.$product['variant']?>"><?=$product['title'].' - '.$product['variant'].' - ₱'.$product['price']?> - <?=$product['stocks']?> Stocks Available</option>
												    <?php } ?>
												</select>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Quantity:</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="to_quantity" required>
											</div>
										</div>
										
										<div class="form-group row mb-0">
											<label class="col-lg-3 col-form-label"></label>
											<div class="col-lg-9 text-right  mb-0">
												<button class="btn btn-primary" name="btn_exchange_to" type="submit">Exchange</button>
											</div>
										</div>
									</form>
									<hr>
									<h5>My Exchange Lists</h5>
									<table class='table'>
									    <thead>
									        <tr>
    									        <th>Item</th>
        									    <th style="width:1px">Price</th>
        									    <th style="width:1px">Qty</th>
        									    <th style="width:1px">Total</th>
        									    <th style="width:1px"></th>
    									    </tr>
									    </thead>
									    <tbody>
									        <?php if(isset($_SESSION['exchange_cart_to'])) { ?>
									        <?php $total_to = 0;?>
									        <?php $i=0;?>
									        <?php foreach($_SESSION['exchange_cart_to'][$_GET['farmers']] as $ef) { ?>
									        <?php $total_to += $ef['price'] * $ef['quantity'];?>
									        <tr>
									            <td><?=$ef['title'].' - '.$ef['variant']?></td>
									            <td class="text-center" style="width:1px">₱<?=number_format($ef['price'],2)?></td>
									            <td class="text-center" style="width:1px"><?=$ef['quantity']?></td>
									            <td class="text-center" style="width:1px">₱<?=number_format($ef['price']*$ef['quantity'],2)?></td>
									            <td style="width:1px"><a href="?remove=true&exchange_id=<?=$i?>">Remove</a></td>
									        </tr>
									        <?php $i++?>
									        <?php } ?>
									        <?php } else { ?>
									        <tr>
									            <td class="text-center" colspan=5>No record found</td>
									        </tr>
									        <?php } ?>
									    </tbody>
									    <tfoot>
									        <tr>
									            <td colspan=3 class="text-right">Total</td>
									            <td class="text-center">₱<?=isset($total_to) ? number_format($total_to,2) : 0?></td>
									            <td></td>
									        </tr>
									    </tfoot>
									</table>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table datatable-responsive">
                                        <thead>
                                            <tr>
                                                <th style="width:1px">#</th>
                                                <th>Farmer</th>
                                                <th>Store</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Pending</th>
                                                <th>Completed</th>
                                                <th style="width:1px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach(get_stores() as $farmers) { ?>
                                                <?php if($_SESSION['vendor_id'] != $farmers['store_id']){ ?>
                                                    <?php $exchange_pending   = exchange_status(0,$_SESSION['vendor_id'],$farmers['store_id'])->fetch_assoc();?>
                                                    <?php $exchange_completed = exchange_status(1,$_SESSION['vendor_id'],$farmers['store_id'])->fetch_assoc();?>
                                                    <tr>
                                                        <td><?=$i++?></td>
                                                        <td><?=$farmers['firstname']?> <?=$farmers['surname']?></td>
                                                        <td><?=$farmers['store_name']?></td>
                                                        <td><?=$farmers['contact']?></td>
                                                        <td><?=$farmers['email']?></td>
                                                        <td class="text-center" style="width:1px"><a><?=exchange_status(0,$_SESSION['vendor_id'],$farmers['store_id'])->num_rows?></a></td>
                                                        <td class="text-center" style="width:1px"><a><?=exchange_status(1,$_SESSION['vendor_id'],$farmers['store_id'])->num_rows?></a></td>
                                                        <td style="width:1px"><a href="?farmers=<?=$farmers['store_id']?>">Exchange</a></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                </div>

            </div>
            <!-- /content area -->


            <!-- Footer -->
            <?php include 'layouts/footer.php';?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>

    <!-- /page content -->
    <?php include 'layouts/scripts.php';?>
    <script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script src="assets/js/demo_pages/datatables_responsive.js"></script>
</body>

</html>