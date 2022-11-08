<?php include 'layouts/header.php';?>
<?php if(!isset($_SESSION['id'])) { 
	header('location:login.php');
}
?>
<?php if(get_order_details($_GET['reference'])->num_rows == 0) {
	header('location:my-account.php');
}

if(isset($_GET['cancel']) == 'true') {
	cancel($_GET['reference']);
}

?>
<?php foreach(get_order_details($_GET['reference'],$vendor_id = null) as $orders) { ?>
	<?php $shipping_trigger  = $orders['shipping_trigger']; ?>
	<?php $method_of_payment = $orders['method_of_payment']; ?>
	<?php $status   		 = $orders['status']; ?>
	<?php $receipt_image	 = $orders['receipt_image']; ?>
	<?php $is_received	     = $orders['is_received']; ?>
<?php } ?>

<?php 
if(isset($_POST['btn_upload'])) { 
	update_receipt($_GET['reference']);
}
if(isset($_GET['delete']) == 'true') {
	delete_receipt($_GET['reference']);
}

if(isset($_GET['received']) == 'true') {
	received_item($_GET['reference']);
}
?>


<body>
	<div class="site-wrapper">
		<?php include 'layouts/navigation.php';?>
		<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="home.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">My Account</li>
				</ol>
			</div>
		</nav>
		<!-- Promotion Block 2 -->

		<div class="page-section sp-inner-page">
			<div class="container">
				<div class="mb--10">
				<a href="my-account.php" class="btn btn-success">Back</a>
				<?php if($method_of_payment == 'Stripe'){ ?>
				<?php } else { ?>
					<?php if($status == 0) { ?>
						<a href="?cancel=true&reference=<?=$_GET['reference']?>" onclick="return confirm('Are you sure you want to cancel this transaction?')"  class="btn btn-danger">Cancel</a>
					<?php } ?>

					<?php if($is_received == 0  && $status == 2) { ?>
						<a href="?received=true&reference=<?=$_GET['reference']?>" onclick="return confirm('Are you sure you want to update this transaction?')"  class="btn btn-info text-white">Item Receive</a>
					<?php } ?>
					
				<?php } ?>
				</div>

				<div class="row">
					<?php if(get_tracking($_GET['reference'])->num_rows > 0) { ?>
						<?php $detect=true;?>
						<div class="col-md-4 col-12">
						<div class="site-faq-accordion accordion" id="accordionExample">
							<div class="card">
							<?php $i=1; foreach(get_tracking($_GET['reference']) as $track) { ?>
								<div class="card-header" id="headingOne">
									<h2 class="mb-0">
										<button class="btn btn-link" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapseOne_<?=$i?>" aria-expanded="true" aria-controls="collapseOne">
											<?php if($track['status'] == 0) {  ?>
											<strong>Pending  <br><?=$track['created_at']?></strong>
											<?php } elseif($track['status'] == 1) { ?>
											<strong>Processing  <br><?=$track['created_at']?></strong>
											<?php } elseif($track['status'] == 2) { ?>
											<strong>Completed  <br><?=$track['created_at']?></strong>
											<?php } else { ?>
											<strong>Cancelled  <br><?=$track['created_at']?></strong>
											<?php } ?>
										</button>
									</h2>
								</div>

								<div id="collapseOne_<?=$i?>" class="collapse show" aria-labelledby="headingOne"
									data-parent="#accordionExample">
									<div class="card-body">
										<?=$track['message']?>
									</div>
								</div>
								<?php $i++?>
							<?php } ?>
								
							</div>
						</div>

					</div>
					<?php } else { ?>
						<?php $detect=false;?>
					<?php } ?>
					
					<div class="col-md-<?=$detect=='true' || $detect == true ? '8' : '12'?> col-12">
					<div class="row">
					<div class="col-md-4 col-12">
						<h5 class="sidebar-title" >Billing Address</h5>
						<label>
							Name: <?=$user['firstname']?> <?=$user['surname']?> <br>
							Contact: <?=$user['contact']?><br>
							Contact: <?=$user['email']?> <br>
							Address: <?=$billing['address']?> <?=$billing['state']?> <br><?=$billing['city']?>
							<?=$billing['country']?>, <?=$billing['zip']?> <br>
						</label>
					</div>

					<?php if($shipping_trigger == 'Yes') {  ?>
						<div class="col-md-4 col-12">
							<h5 class="sidebar-title" >Shipping Address</h5>
							<label>
								Name: <?=$shipping['shipping_firstname']?> <?=$shipping['shipping_surname']?> <br>
								Contact: <?=$shipping['contact']?><br>
								Address: <?=$shipping['address']?> <?=$shipping['state']?> <br><?=$shipping['city']?>
								<?=$shipping['country']?>, <?=$shipping['zip']?> <br>
							</label>
						</div>
					<?php } else { ?>
						<div class="col-md-4 col-12">
							<h5 class="sidebar-title" >Shipping Address</h5>
							<label>
								Name: <?=$user['firstname']?> <?=$user['surname']?> <br>
								Contact: <?=$user['contact']?><br>
								Contact: <?=$user['email']?> <br>
								Address: <?=$billing['address']?> <?=$billing['state']?> <br><?=$billing['city']?>
								<?=$billing['country']?>, <?=$billing['zip']?> <br>
							</label>
						</div>
					<?php } ?>

					<div class="col-md-4 col-12">
						
						<h5 class="sidebar-title">Order Details</h5>
						<label>
							Status: 
							<?php if($status == 0 || $status == 'PENDING') {  ?> 
								<strong>Pending</strong>
							<?php } elseif($status == 1) { ?>
								<strong>Processing</strong>
							<?php } elseif($status == 2) { ?>
								<strong>Completed</strong>
							<?php } else { ?>
								<strong>Cancelled</strong>
							<?php } ?>
							
							
							<br>
							Reference: <strong><?=$_GET['reference']?></strong>
							<br>
							Method of Payment: <strong><?=$method_of_payment?></strong> 
									<?php if($status == 2) { ?>
										<?php if($is_received == 1) { ?>
											<br>
											Received Status: 
											<strong>Received</strong>
										<?php } ?>
									<?php } ?>
							<?php if($status == 0 && $method_of_payment == 'Bank Transfer' || $method_of_payment == 'GCash') { ?>
								<?php if($receipt_image == NULL || empty($receipt_image)) { ?>
									<br>
									<?php if($receipt_image == null && $status == 2) { ?>
									<?php } else { ?>
										<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#receipt" href="javascript:void(0)"><small>Upload Receipt</small></a>
									<?php } ?>
								<?php } else { ?>
									<br>
									<a data-bs-toggle="modal" data-bs-target="#receipt" href="javascript:void(0)"><small>View Receipt</small></a>
									<?php if($status == 2 || $status == 3) { ?>
									<?php } else { ?>
										| 
										<a href="orders.php?reference=<?=$_GET['reference']?>&delete=true&success=true&message=<?=urlencode('Receipt has been deleted')?>"><small>Delete Receipt</small></a>
									<?php } ?>
									
								<?php } ?>
							<?php } ?>
							<br>
						</label>
					</div>
				</div>
				<br>
				<div class="col-12">
					<table class="table table-bordered">
						<thead class="thead-light">
							<tr>
								<th>#</th>
								<th>Product</th>
								<th style="width:1px;text-align:center">Shipping</th>
								<th style="width:1px;text-align:center">Items</th>
								<th style="width:1px;text-align:center">Price</th>
							
								<th style="width:1px;text-align:center">Total</th>
							</tr>
						</thead>

						<tbody>
							<?php $i=1;?>
							<?php $total = 0?>
							<?php foreach(get_order_details($_GET['reference']) as $orders) { ?>
							<?php $vendor = store_details($orders['vendor_id'])->fetch_assoc() ?>
							<?php $total += $orders['price'] * $orders['quantity'] + ($orders['shipping_fee']/$orders['items'])?>

							<tr>
								<td style="width:1px"><?=$i++?></td>
								<td><?=$vendor['store_name'].' - '.$orders['product']?></td>
								<td style="width:1px;text-align:right">₱<?=number_format(($orders['shipping_fee']/$orders['items']),2)?></td>
								<td style="width:1px;text-align:center"><?=$orders['quantity']?></td>
								<td style="width:1px;text-align:right">
									₱<?=number_format($orders['price'] * $orders['quantity'],2)?></td>
								<td style="width:1px;text-align:right">
								₱<?=number_format($orders['price'] * $orders['quantity'] + ($orders['shipping_fee']/$orders['items']),2)?></td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan=4></td>
								<td></td>
								<td style="width:1px;text-align:right">₱<?=number_format($total,2)?></td>
							</tr>
						</tfoot>
					</table>
				</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
	</div>


	<div class="modal modal-quick-view" id="receipt" tabindex="-1" role="dialog" aria-labelledby="receipt"
         aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content" style="width:400px;margin:auto" >
                <div class="pm-product-details">
              
                    <div class="row">
                      <div class="col-12">
						  	<?php if($receipt_image == NULL || empty($receipt_image)) { ?>
								<form method="POST" class="mt--10" enctype="multipart/form-data">

									<?php if($method_of_payment == 'GCash') { ?>
									<?php } else { ?>
										<div class="form-group">
											<label for="">Account Number</label>
											<label class="form-control">109351130135</label>
										</div>

										<div class="form-group">
											<label for="">Account Name</label>
											<label class="form-control">Rusty Lopez</label>
										</div>

										<div class="form-group">
											<label for="">Bank</label>
											<label class="form-control">Unionbank</label>
										</div>

										<hr>
										
									<?php } ?>
									
									<div class="form-group">
										<input type="file" class="form-control" name="files" accept="image/x-png,image/gif,image/jpeg"  required>
									</div>
									<div class="form-group">
										<button type="submit" name="btn_upload" class="btn btn-success w-100">Upload</button>
									</div>
								</form>
							<?php } else { ?>
							<img src="assets/image/receipt/<?=$receipt_image?>" class="image-responsive" style="width:100%" alt="">
							<?php } ?>
					  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Slider bLock 4 -->

	<?php include 'layouts/footer.php';?>
	</div>
	<?php include 'layouts/scripts.php';?>
</body>

</html>