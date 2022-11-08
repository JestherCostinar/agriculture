<?php include 'layouts/header.php';?>
<?php if(!isset($_SESSION['customer'])) { 
	header('location:login.php');

}
?>
<?php if(isset($_POST['btn_account_details'])) {
	global $db;
	$firstname = $db->real_escape_string($_POST['firstname']);
	$surname   = $db->real_escape_string($_POST['surname']);
	$email 	   = $db->real_escape_string($_POST['email']);
	$contact   = $db->real_escape_string($_POST['contact']);
	$birthday  = $db->real_escape_string($_POST['birthday']);
	$gender    = $db->real_escape_string($_POST['gender']);
	update_account_details($firstname,$surname,$email,$contact,$birthday,$gender);
}

if(isset($_POST['btn_account_billing'])) {
	global $db;
	$id  	  = $db->real_escape_string($_POST['billing_id']);
	$country  = $db->real_escape_string($_POST['billing_country']);
	$city	  = $db->real_escape_string(($_POST['billing_city']));
	$state	  = $db->real_escape_string($_POST['billing_state']);
	$zip	  = $db->real_escape_string($_POST['billing_zip']);
	$address  = $db->real_escape_string($_POST['billing_address']);
	insert_or_update_account_billing_details($id,$country,$city,$state,$zip,$address,'Billing Address');
}

if(isset($_POST['btn_account_shipping'])) {
	global $db;
	$id  	  			= $db->real_escape_string($_POST['shipping_id']);
	$shipping_firstname = $db->real_escape_string($_POST['shipping_firstname']);
	$shipping_surname  	= $db->real_escape_string($_POST['shipping_surname']);
	$contact  			= $db->real_escape_string($_POST['contact']);
	$country  			= $db->real_escape_string($_POST['shipping_country']);
	$city	  			= $db->real_escape_string(($_POST['shipping_city']));
	$state	  			= $db->real_escape_string($_POST['shipping_state']);
	$zip	  			= $db->real_escape_string($_POST['shipping_zip']);
	$address  			= $db->real_escape_string($_POST['shipping_address']);
	insert_or_update_account_shipping_details($id,$shipping_firstname,$shipping_surname,$contact,$country,$city,$state,$zip,$address,'Shipping Address');
}

if(isset($_POST['btn_change_password'])) {
	global $db;
	$old_password  	   	   = $db->real_escape_string($_POST['old_password']);
	$new_password 	   	   = $db->real_escape_string($_POST['new_password']);
	$confirm_new_password  = $db->real_escape_string($_POST['confirm_new_password']);
	change_password($old_password,$new_password,$confirm_new_password);
}
?>
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
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
			<div class="row">
				<div class="col-12">
					<div class="row">
						<!-- My Account Tab Menu Start -->
						<div class="col-lg-3 col-12">
							<div class="myaccount-tab-menu nav" role="tablist">
								<a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fas fa-tachometer-alt"></i>
									Dashboard</a>

								<a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

								<a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

								<a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

								<a href="#change-password" data-bs-toggle="tab"><i class="fa fa-lock"></i> Change Password</a>

								<a href="?logout=true"><i class="fas fa-sign-out-alt"></i> Logout</a>
							</div>
						</div>
						<!-- My Account Tab Menu End -->

						<!-- My Account Tab Content Start -->
						<div class="col-lg-9 col-12 mt--30 mt-lg-0">
							<div class="tab-content" id="myaccountContent">
								<!-- Single Tab Content Start -->
								<div class="tab-pane  show active" id="dashboad" role="tabpanel">
									<div class="myaccount-content">
										<h3>Dashboard</h3>
										<div class="welcome mb-20">
											<p>Hello, <strong><?=!empty($user['firstname']) ? $user['firstname'].' '.$user['surname'] : $user['username']?></strong>, </p>
										</div>
										<p class="mb-0">
										Welcome to <strong> I-Agri</strong></p>
										<br>
										<p class="mb-0">From your account dashboard. you can easily check &amp; view your
											recent orders, manage your shipping and billing addresses and edit your
											password and account details.</p>
									</div>
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								
								<div class="tab-pane" id="orders" role="tabpanel">
									<div class="myaccount-content">
										<h3>Orders</h3>

										<div class="myaccount-table table-responsive text-center">
											<table class="table" id="myTable">
												<thead class="col-12">
												<tr>
													<th>No</th>
													<th>Reference</th>
													<th>Mode of Payment</th>
													<th>Date</th>
													<th style="width:1px">Status</th>
													<th style="width:1px">Total</th>
													<th style="width:1px">Items</th>
													<th style="width:1px"></th>
												</tr>
												</thead>

												<tbody>
													<?php $i=1;?>
													<?php foreach(my_orders() as $orders) { ?>
														<tr>
															<td><?=$i++?></td>
															<td><?=$orders['reference']?></td>
															<td><?=$orders['method_of_payment']?></td>
															<td><?=$orders['created_at']?></td>
															<td>
																<?php 
																	if($orders['status'] == 0) {
																		echo 'Pending';
																	} elseif($orders['status'] == 1) {
																		echo 'Processing';
																	} elseif($orders['status'] == 2) {
																		echo 'Completed';
																	} else {
																		echo 'Cancelled';
																	}
																?>
															</td>
															<td>₱<?=number_format($orders['total'] + $orders['sf'],2)?></td>
															<td><?=$orders['total_items']?></td>
															<td><a href="orders.php?reference=<?=$orders['reference']?>" class="">View</a></td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								<div class="tab-pane " id="address-edit" role="tabpanel">
									<div class="myaccount-content">
										<h3>Billing Address</h3>

										<div class="account-details-form">
											<form method="POST">
												<div class="row">
													<div class="col-12 mb-30">
														<input type="hidden" name="billing_country" value="PH">
														<input id="country" placeholder="Country" readonly value="Philippines" type="text">
														<input type="hidden" name="billing_id" value="<?=$billing['id']?>">
													</div>

													<div class="col-12 mb-30">
														<select name="billing_city" class="form-control" id="city">
															<optgroup label="REGION I">
																<option value="Batag City" <?=$billing['city'] == 'Batag City' ? 'selected ' : ''?>>Batag City</option>
																<option value="Laoag City" <?=$billing['city'] == 'Laoag City' ? 'selected ' : ''?>>Laoag City</option>
																<option value="Candon City" <?=$billing['city'] == 'Candon City' ? 'selected ' : ''?>>Candon City</option>
																<option value="Vigan City" <?=$billing['city'] == 'Vigan City' ? 'selected ' : ''?>>Vigan City</option>
																<option value="San Fernando City" <?=$billing['city'] == 'San Fernando City' ? 'selected ' : ''?>>San Fernando City</option>
																<option value="Alaminos City" <?=$billing['city'] == 'Alaminos City' ? 'selected ' : ''?>>Alaminos City</option>
																<option value="Dagupan City" <?=$billing['city'] == 'Dagupan City' ? 'selected ' : ''?>>Dagupan City</option>
																<option value="San Carlos City" <?=$billing['city'] == 'San Carlos City' ? 'selected ' : ''?>>San Carlos City</option>
																<option value="Urdaneta City" <?=$billing['city'] == 'Urdaneta City' ? 'selected ' : ''?>>Urdaneta City</option>
															</optgroup>

															<optgroup label="REGION II">
																<option value="Tuguegarao City" <?=$billing['city'] == 'Tuguegarao City' ? 'selected ' : ''?>>Tuguegarao City</option>
																<option value="Cauayan City" <?=$billing['city'] == 'Cauayan City' ? 'selected ' : ''?>>Cauayan City</option>
																<option value="Ilagan City" <?=$billing['city'] == 'Ilagan City' ? 'selected ' : ''?>>Ilagan City</option>
																<option value="Santiago City" <?=$billing['city'] == 'Santiago City' ? 'selected ' : ''?>>Santiago City</option>
															</optgroup>

															<optgroup label="REGION III">
																<option value="Balanga City" <?=$billing['city'] == 'Balanga City' ? 'selected ' : ''?>>Balanga City</option>
																<option value="Malolos City" <?=$billing['city'] == 'Malolos City' ? 'selected ' : ''?>>Malolos City</option>
																<option value="Meycauayan City" <?=$billing['city'] == 'Meycauayan City' ? 'selected ' : ''?>>Meycauayan City</option>
																<option value="San Jose del Monte City" <?=$billing['city'] == 'San Jose del Monte City' ? 'selected ' : ''?>>San Jose del Monte City</option>
																<option value="Cabanatuan City" <?=$billing['city'] == 'Cabanatuan City' ? 'selected ' : ''?>>Cabanatuan City</option>
																<option value="Gapan City" <?=$billing['city'] == 'Gapan City' ? 'selected ' : ''?>>Gapan City</option>
																<option value="Muñoz City" <?=$billing['city'] == 'Muñoz City' ? 'selected ' : ''?>>Muñoz City</option>
																<option value="Palayan City" <?=$billing['city'] == 'Palayan City' ? 'selected ' : ''?>>Palayan City</option>
																<option value="Angeles City" <?=$billing['city'] == 'Angeles City' ? 'selected ' : ''?>>Angeles City</option>
																<option value="Mabalacat City" <?=$billing['city'] == 'Mabalacat City' ? 'selected ' : ''?>>Mabalacat City</option>
																<option value="San Fernando City" <?=$billing['city'] == 'San Fernando City' ? 'selected ' : ''?>>San Fernando City</option>
																<option value="Tarlac City" <?=$billing['city'] == 'Tarlac City' ? 'selected ' : ''?>>Tarlac City</option>
																<option value="Olongapo City" <?=$billing['city'] == 'Olongapo City' ? 'selected ' : ''?>>Olongapo City</option>
																<option value="San Jose City" <?=$billing['city'] == 'San Jose City' ? 'selected ' : ''?>>San Jose City</option>
															</optgroup>

															<optgroup label="REGION IV-A">
																<option value="Batangas City" <?=$billing['city'] == 'Batangas City' ? 'selected ' : ''?>>Batangas City</option>
																<option value="Lipa City" <?=$billing['city'] == 'Lipa City' ? 'selected ' : ''?>>Lipa City</option>
																<option value="Tanauan City" <?=$billing['city'] == 'Tanauan City' ? 'selected ' : ''?>>Tanauan City</option>
																<option value="Bacoor City" <?=$billing['city'] == 'Bacoor City' ? 'selected ' : ''?>>Bacoor City</option>
																<option value="Cavite City" <?=$billing['city'] == 'Cavite City' ? 'selected ' : ''?>>Cavite City</option>
																<option value="Dasmariñas City" <?=$billing['city'] == 'Dasmariñas City' ? 'selected ' : ''?>>Dasmariñas City</option>
																<option value="Imus City" <?=$billing['city'] == 'Imus City' ? 'selected ' : ''?>>Imus City</option>
																<option value="Tagaytay City" <?=$billing['city'] == 'Tagaytay City' ? 'selected ' : ''?>>Tagaytay City</option>
																<option value="Trece Martires City" <?=$billing['city'] == 'Trece Martires City' ? 'selected ' : ''?>>Trece Martires City</option>
																<option value="Biñan City" <?=$billing['city'] == 'Biñan City' ? 'selected ' : ''?>>Biñan City</option>
																<option value="Cabuyao City" <?=$billing['city'] == 'Cabuyao City' ? 'selected ' : ''?>>Cabuyao City</option>
																<option value="San Pablo City" <?=$billing['city'] == 'San Pablo City' ? 'selected ' : ''?>>San Pablo City</option>
																<option value="Santa Rosa City" <?=$billing['city'] == 'Santa Rosa City' ? 'selected ' : ''?>>Santa Rosa City</option>
																<option value="Lucena City" <?=$billing['city'] == 'Lucena City' ? 'selected ' : ''?>>Lucena City</option>
																<option value="Tayabas City" <?=$billing['city'] == 'Tayabas City' ? 'selected ' : ''?>>Tayabas City</option>
																<option value="Antipolo City" <?=$billing['city'] == 'Antipolo City' ? 'selected ' : ''?>>Antipolo City</option>
																<option value="Calamba City" <?=$billing['city'] == 'Calamba City' ? 'selected ' : ''?>>Calamba City</option>
															</optgroup>

															<optgroup label="MIMAROPA REGION">
																<option value="Calapan City" <?=$billing['city'] == 'Calapan City' ? 'selected ' : ''?>>Calapan City</option>
																<option value="Puerto Princesa City" <?=$billing['city'] == 'Puerto Princesa City' ? 'selected ' : ''?>>Puerto Princesa City</option>
															</optgroup>

															<optgroup label="REGION V">
																<option value="Legazpi City" <?=$billing['city'] == 'Legazpi City' ? 'selected ' : ''?>>Legazpi City</option>
																<option value="Ligao City" <?=$billing['city'] == 'Ligao City' ? 'selected ' : ''?>>Ligao City</option>
																<option value="Tabaco City" <?=$billing['city'] == 'Tabaco City' ? 'selected ' : ''?>>Tabaco City</option>
																<option value="Iriga City" <?=$billing['city'] == 'Iriga City' ? 'selected ' : ''?>>Iriga City</option>
																<option value="Naga City" <?=$billing['city'] == 'Naga City' ? 'selected ' : ''?>>Naga City</option>
																<option value="Masbate City" <?=$billing['city'] == 'Masbate City' ? 'selected ' : ''?>>Masbate City</option>
																<option value="Sorsogon City" <?=$billing['city'] == 'Sorsogon City' ? 'selected ' : ''?>>Sorsogon City</option>
															</optgroup>

															<optgroup label="Cordillera Administrative Region (CAR)">
																<option value="Baguio City" <?=$billing['city'] == 'Baguio City' ? 'selected ' : ''?>>Baguio City</option>
																<option value="Tabuk City" <?=$billing['city'] == 'Tabuk City' ? 'selected ' : ''?>>Tabuk City</option>
															</optgroup>

															<optgroup label="National Capital Region (NCR)">
																<option value="Caloocan City" <?=$billing['city'] == 'Caloocan City' ? 'selected ' : ''?>>Caloocan City</option>
																<option value="Las Piñas City" <?=$billing['city'] == 'Las Piñas City' ? 'selected ' : ''?>>Las Piñas City</option>
																<option value="Makati City" <?=$billing['city'] == 'Makati City' ? 'selected ' : ''?>>Makati City</option>
																<option value="Malabon City" <?=$billing['city'] == 'Malabon City' ? 'selected ' : ''?>>Malabon City</option>
																<option value="Mandaluyong City" <?=$billing['city'] == 'Mandaluyong City' ? 'selected ' : ''?>>Mandaluyong City</option>
																<option value="Manila City" <?=$billing['city'] == 'Manila City' ? 'selected ' : ''?>>Manila City</option>
																<option value="Marikina City" <?=$billing['city'] == 'Marikina City' ? 'selected ' : ''?>>Marikina City</option>
																<option value="Muntinlupa City" <?=$billing['city'] == 'Muntinlupa City' ? 'selected ' : ''?>>Muntinlupa City</option>
																<option value="Navotas City" <?=$billing['city'] == 'Navotas City' ? 'selected ' : ''?>>Navotas City</option>
																<option value="Parañaque City" <?=$billing['city'] == 'Parañaque City' ? 'selected ' : ''?>>Parañaque City</option>
																<option value="Pasay City" <?=$billing['city'] == 'Pasay City' ? 'selected ' : ''?>>Pasay City</option>
																<option value="Pasig City" <?=$billing['city'] == 'Pasig City' ? 'selected ' : ''?>>Pasig City</option>
																<option value="Quezon City" <?=$billing['city'] == 'Quezon City' ? 'selected ' : ''?>>Quezon City</option>
																<option value="San Juan City" <?=$billing['city'] == 'San Juan City' ? 'selected ' : ''?>>San Juan City</option>
																<option value="Taguig City" <?=$billing['city'] == 'Taguig City' ? 'selected ' : ''?>>Taguig City</option>
																<option value="Valenzuela City" <?=$billing['city'] == 'Valenzuela City' ? 'selected ' : ''?>>Valenzuela City</option>
															</optgroup>
														</select>
													</div>

													<div class="col-12 mb-30">
														<input id="state" style="text-transform: capitalize;" placeholder="State" value="<?=$billing['state']?>" name="billing_state" type="text" required >
													</div>


													<div class="col-12 mb-30">
														<input id="zip"  placeholder="Zip" value="<?=$billing['zip']?>" name="billing_zip" type="text" >
													</div>

													<div class="col-md-12 col-12 mb-30">
														<input id="address" placeholder="Address" value="<?=$billing['address']?>" name="billing_address" type="text" required >
													</div>

													<div class="col-12">
														<button type="submit" name="btn_account_billing" class="text-success" class="theme-btn">Save Changes</button>
													</div>

												</div>
											</form>
										</div>
									</div>

									<div class="myaccount-content">
										<h3>Shipping Details</h3>

										<div class="account-details-form">
											<form method="POST">
												<div class="row">

													<div class="col-12 mb-30">
														<input id="shipping_firstname" style="text-transform: capitalize;" class="form-control" placeholder="Shipping First Name" name="shipping_firstname" value="<?=$shipping['shipping_firstname']?>" type="text" required minlength="4" maxlength="25">
													</div>

													<div class="col-12 mb-30">
														<input id="shipping_surname" style="text-transform: capitalize;" class="form-control" placeholder="Shipping Last Name" name="shipping_surname" value="<?=$shipping['shipping_surname']?>" type="text" required minlength="2" maxlength="20">
													</div>

													<div class="col-12 mb-30">
														<input id="contact" minlength="11" maxlength="12"  class="form-control" placeholder="Shipping Contact" name="contact" value="<?=$shipping['contact']?>" type="text" required>
													</div>

													<div class="col-12 mb-30">
													<input type="hidden" name="shipping_country" value="PH">
													<input type="hidden" name="shipping_id" value="<?=$shipping['id']?>">
														<input id="country" placeholder="Country" readonly value="Philippines" type="text">
													</div>	

													<div class="col-12 mb-30">
														<select name="shipping_city" class="form-control" id="city">
														<optgroup label="REGION I">
																<option value="Batag City" <?=$billing['city'] == 'Batag City' ? 'selected ' : ''?>>Batag City</option>
																<option value="Laoag City" <?=$billing['city'] == 'Laoag City' ? 'selected ' : ''?>>Laoag City</option>
																<option value="Candon City" <?=$billing['city'] == 'Candon City' ? 'selected ' : ''?>>Candon City</option>
																<option value="Vigan City" <?=$billing['city'] == 'Vigan City' ? 'selected ' : ''?>>Vigan City</option>
																<option value="San Fernando City" <?=$billing['city'] == 'San Fernando City' ? 'selected ' : ''?>>San Fernando City</option>
																<option value="Alaminos City" <?=$billing['city'] == 'Alaminos City' ? 'selected ' : ''?>>Alaminos City</option>
																<option value="Dagupan City" <?=$billing['city'] == 'Dagupan City' ? 'selected ' : ''?>>Dagupan City</option>
																<option value="San Carlos City" <?=$billing['city'] == 'San Carlos City' ? 'selected ' : ''?>>San Carlos City</option>
																<option value="Urdaneta City" <?=$billing['city'] == 'Urdaneta City' ? 'selected ' : ''?>>Urdaneta City</option>
															</optgroup>

															<optgroup label="REGION II">
																<option value="Tuguegarao City" <?=$billing['city'] == 'Tuguegarao City' ? 'selected ' : ''?>>Tuguegarao City</option>
																<option value="Cauayan City" <?=$billing['city'] == 'Cauayan City' ? 'selected ' : ''?>>Cauayan City</option>
																<option value="Ilagan City" <?=$billing['city'] == 'Ilagan City' ? 'selected ' : ''?>>Ilagan City</option>
																<option value="Santiago City" <?=$billing['city'] == 'Santiago City' ? 'selected ' : ''?>>Santiago City</option>
															</optgroup>

															<optgroup label="REGION III">
																<option value="Balanga City" <?=$billing['city'] == 'Balanga City' ? 'selected ' : ''?>>Balanga City</option>
																<option value="Malolos City" <?=$billing['city'] == 'Malolos City' ? 'selected ' : ''?>>Malolos City</option>
																<option value="Meycauayan City" <?=$billing['city'] == 'Meycauayan City' ? 'selected ' : ''?>>Meycauayan City</option>
																<option value="San Jose del Monte City" <?=$billing['city'] == 'San Jose del Monte City' ? 'selected ' : ''?>>San Jose del Monte City</option>
																<option value="Cabanatuan City" <?=$billing['city'] == 'Cabanatuan City' ? 'selected ' : ''?>>Cabanatuan City</option>
																<option value="Gapan City" <?=$billing['city'] == 'Gapan City' ? 'selected ' : ''?>>Gapan City</option>
																<option value="Muñoz City" <?=$billing['city'] == 'Muñoz City' ? 'selected ' : ''?>>Muñoz City</option>
																<option value="Palayan City" <?=$billing['city'] == 'Palayan City' ? 'selected ' : ''?>>Palayan City</option>
																<option value="Angeles City" <?=$billing['city'] == 'Angeles City' ? 'selected ' : ''?>>Angeles City</option>
																<option value="Mabalacat City" <?=$billing['city'] == 'Mabalacat City' ? 'selected ' : ''?>>Mabalacat City</option>
																<option value="San Fernando City" <?=$billing['city'] == 'San Fernando City' ? 'selected ' : ''?>>San Fernando City</option>
																<option value="Tarlac City" <?=$billing['city'] == 'Tarlac City' ? 'selected ' : ''?>>Tarlac City</option>
																<option value="Olongapo City" <?=$billing['city'] == 'Olongapo City' ? 'selected ' : ''?>>Olongapo City</option>
																<option value="San Jose City" <?=$billing['city'] == 'San Jose City' ? 'selected ' : ''?>>San Jose City</option>
															</optgroup>

															<optgroup label="REGION IV-A">
																<option value="Batangas City" <?=$billing['city'] == 'Batangas City' ? 'selected ' : ''?>>Batangas City</option>
																<option value="Lipa City" <?=$billing['city'] == 'Lipa City' ? 'selected ' : ''?>>Lipa City</option>
																<option value="Tanauan City" <?=$billing['city'] == 'Tanauan City' ? 'selected ' : ''?>>Tanauan City</option>
																<option value="Bacoor City" <?=$billing['city'] == 'Bacoor City' ? 'selected ' : ''?>>Bacoor City</option>
																<option value="Cavite City" <?=$billing['city'] == 'Cavite City' ? 'selected ' : ''?>>Cavite City</option>
																<option value="Dasmariñas City" <?=$billing['city'] == 'Dasmariñas City' ? 'selected ' : ''?>>Dasmariñas City</option>
																<option value="Imus City" <?=$billing['city'] == 'Imus City' ? 'selected ' : ''?>>Imus City</option>
																<option value="Tagaytay City" <?=$billing['city'] == 'Tagaytay City' ? 'selected ' : ''?>>Tagaytay City</option>
																<option value="Trece Martires City" <?=$billing['city'] == 'Trece Martires City' ? 'selected ' : ''?>>Trece Martires City</option>
																<option value="Biñan City" <?=$billing['city'] == 'Biñan City' ? 'selected ' : ''?>>Biñan City</option>
																<option value="Cabuyao City" <?=$billing['city'] == 'Cabuyao City' ? 'selected ' : ''?>>Cabuyao City</option>
																<option value="San Pablo City" <?=$billing['city'] == 'San Pablo City' ? 'selected ' : ''?>>San Pablo City</option>
																<option value="Santa Rosa City" <?=$billing['city'] == 'Santa Rosa City' ? 'selected ' : ''?>>Santa Rosa City</option>
																<option value="Lucena City" <?=$billing['city'] == 'Lucena City' ? 'selected ' : ''?>>Lucena City</option>
																<option value="Tayabas City" <?=$billing['city'] == 'Tayabas City' ? 'selected ' : ''?>>Tayabas City</option>
																<option value="Antipolo City" <?=$billing['city'] == 'Antipolo City' ? 'selected ' : ''?>>Antipolo City</option>
																<option value="Calamba City" <?=$billing['city'] == 'Calamba City' ? 'selected ' : ''?>>Calamba City</option>
															</optgroup>

															<optgroup label="MIMAROPA REGION">
																<option value="Calapan City" <?=$billing['city'] == 'Calapan City' ? 'selected ' : ''?>>Calapan City</option>
																<option value="Puerto Princesa City" <?=$billing['city'] == 'Puerto Princesa City' ? 'selected ' : ''?>>Puerto Princesa City</option>
															</optgroup>

															<optgroup label="REGION V">
																<option value="Legazpi City" <?=$billing['city'] == 'Legazpi City' ? 'selected ' : ''?>>Legazpi City</option>
																<option value="Ligao City" <?=$billing['city'] == 'Ligao City' ? 'selected ' : ''?>>Ligao City</option>
																<option value="Tabaco City" <?=$billing['city'] == 'Tabaco City' ? 'selected ' : ''?>>Tabaco City</option>
																<option value="Iriga City" <?=$billing['city'] == 'Iriga City' ? 'selected ' : ''?>>Iriga City</option>
																<option value="Naga City" <?=$billing['city'] == 'Naga City' ? 'selected ' : ''?>>Naga City</option>
																<option value="Masbate City" <?=$billing['city'] == 'Masbate City' ? 'selected ' : ''?>>Masbate City</option>
																<option value="Sorsogon City" <?=$billing['city'] == 'Sorsogon City' ? 'selected ' : ''?>>Sorsogon City</option>
															</optgroup>

															<optgroup label="Cordillera Administrative Region (CAR)">
																<option value="Baguio City" <?=$billing['city'] == 'Baguio City' ? 'selected ' : ''?>>Baguio City</option>
																<option value="Tabuk City" <?=$billing['city'] == 'Tabuk City' ? 'selected ' : ''?>>Tabuk City</option>
															</optgroup>

															<optgroup label="National Capital Region (NCR)">
																<option value="Caloocan City" <?=$billing['city'] == 'Caloocan City' ? 'selected ' : ''?>>Caloocan City</option>
																<option value="Las Piñas City" <?=$billing['city'] == 'Las Piñas City' ? 'selected ' : ''?>>Las Piñas City</option>
																<option value="Makati City" <?=$billing['city'] == 'Makati City' ? 'selected ' : ''?>>Makati City</option>
																<option value="Malabon City" <?=$billing['city'] == 'Malabon City' ? 'selected ' : ''?>>Malabon City</option>
																<option value="Mandaluyong City" <?=$billing['city'] == 'Mandaluyong City' ? 'selected ' : ''?>>Mandaluyong City</option>
																<option value="Manila City" <?=$billing['city'] == 'Manila City' ? 'selected ' : ''?>>Manila City</option>
																<option value="Marikina City" <?=$billing['city'] == 'Marikina City' ? 'selected ' : ''?>>Marikina City</option>
																<option value="Muntinlupa City" <?=$billing['city'] == 'Muntinlupa City' ? 'selected ' : ''?>>Muntinlupa City</option>
																<option value="Navotas City" <?=$billing['city'] == 'Navotas City' ? 'selected ' : ''?>>Navotas City</option>
																<option value="Parañaque City" <?=$billing['city'] == 'Parañaque City' ? 'selected ' : ''?>>Parañaque City</option>
																<option value="Pasay City" <?=$billing['city'] == 'Pasay City' ? 'selected ' : ''?>>Pasay City</option>
																<option value="Pasig City" <?=$billing['city'] == 'Pasig City' ? 'selected ' : ''?>>Pasig City</option>
																<option value="Quezon City" <?=$billing['city'] == 'Quezon City' ? 'selected ' : ''?>>Quezon City</option>
																<option value="San Juan City" <?=$billing['city'] == 'San Juan City' ? 'selected ' : ''?>>San Juan City</option>
																<option value="Taguig City" <?=$billing['city'] == 'Taguig City' ? 'selected ' : ''?>>Taguig City</option>
																<option value="Valenzuela City" <?=$billing['city'] == 'Valenzuela City' ? 'selected ' : ''?>>Valenzuela City</option>
															</optgroup>
														</select>
													</div>

													<div class="col-12 mb-30">
														<input id="state" style="text-transform: capitalize;" placeholder="State" value="<?=$shipping['state']?>" name="shipping_state" type="text" required >
													</div>


													<div class="col-12 mb-30">
														<input id="zip"  placeholder="Zip" value="<?=$shipping['zip']?>" name="shipping_zip" type="text" >
													</div>

													<div class="col-md-12 col-12 mb-30">
														<input id="address" placeholder="Address" value="<?=$shipping['address']?>" name="shipping_address" type="text" required >
													</div>

													<div class="col-12">
														<button type="submit" name="btn_account_shipping" class="theme-btn">Save Changes</button>
													</div>

												</div>
											</form>
										</div>
									</div>
									
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								<div class="tab-pane " id="account-info" role="tabpanel">
									<div class="myaccount-content">
										<h3>Account Details</h3>

										<div class="account-details-form">
											<form method="POST" enctype="multipart/form-data" data-parsley-validate>
												<div class="row">
													<div class="col-md-4 col-12">
													    <img style="width:100%" class="img-responsive" src="<?=is_null($user['profile']) || empty($user['profile']) ? 'https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-avatar-vector-isolated-on-white-background-png-image_1694546.jpg' : 'https://i-agri.tk/assets/profile/'.$user['profile']?>">
													    
													    <div class="col-12">
    														<input class="form-control" accept="image/png, image/gif, image/jpeg"  name="images[]" type="file">
    													</div>
													</div>
													<div class="col-md-8 col-12">
													    <div class="row">
													        <div class="col-12 mb-30">
        													<label for="">First Name</label>
        														<input id="name" style="text-transform: capitalize;" placeholder="First Name" name="firstname" value="<?=$user['firstname']?>" type="text" required minlength="4" maxlength="20">
        													</div>
        
        													<div class="col-12 mb-30">
        														<label for="">Last Name</label>
        														<input id="last-name" style="text-transform: capitalize;" placeholder="Last Name" name="surname" value="<?=$user['surname']?>" type="text" required minlength="1" maxlength="20">
        													</div>
        
        													<div class="col-12 mb-30">
        													<label for="">Email Address</label>
        														<input id="email" pattern="[^ @]*@[^ @]*" readonly placeholder="Email Address" value="<?=$user['email']?>" name="email" type="email" required minlength="4" maxlength="30">
        													</div>
        
        													<div class="col-12 mb-30">
        														<label for="">Contact Number</label>
        														<input id="display-name"  placeholder="Contact Number" value="<?=$user['contact']?>" name="contact" type="text" required >
        													</div>
        
        
        													<div class="col-12 mb-30">
        														<label for="">Birth Date</label>
        														<input id="birthday" placeholder="Birth Date" value="<?=$user['birthday']?>" name="birthday" type="date">
        													</div>
        													
        													<div class="col-12 mb-30">
        														<label for="">Gender</label>
        														<select class="form-control" name="gender">
        														    <option value="Male" <?=$user['gender'] == 'Male' ? 'selected' : ''?>>Male</option>
        														    <option value="Female" <?=$user['gender'] == 'Female' ? 'selected' : ''?>>Female</option>
        														</select>
        													</div>
													    </div>
													</div>

													<div class="col-12">
														<button type="submit" name="btn_account_details" class="theme-btn">Save Changes</button>
													</div>

												</div>
											</form>
										</div>
									</div>
								</div>

								<div class="tab-pane " id="change-password" role="tabpanel">
									<div class="myaccount-content">
										<h3>Password change</h3>

										<div class="account-details-form">
											<form method="POST" >
												<div class="row">

													<div class="col-12 mb-30">
														<input id="current-pwd" placeholder="Current Password" name="old_password" type="password" required minlength="4" maxlength="15">
														<a href="javascript:void(0)" style="text-align:right" id="togglePassword1" >Show</a>
													</div>

													<div class="col-12 mb-30">
														<input id="new-pwd" placeholder="New Password" name="new_password" type="password" required minlength="4" maxlength="15">
														<a href="javascript:void(0)" style="text-align:right" id="togglePassword2" >Show</a>
													</div>

													<div class="col-12 mb-30">
														<input id="confirm-pwd" placeholder="Confirm Password" name="confirm_new_password" type="password" required minlength="4" maxlength="15">
														<a href="javascript:void(0)" style="text-align:right" id="togglePassword" >Show</a>
														
													</div>


													<div class="col-12">
														<button type="submit" name="btn_change_password" class="theme-btn">Save Changes</button>
													</div>

												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->
							</div>
						</div>
						<!-- My Account Tab Content End -->
					</div>

				</div>
			</div>
		</div>
    </div>
        <!-- Slider bLock 4 -->

        <?php include 'layouts/footer.php';?>
    </div>
    <?php include 'layouts/scripts.php';?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script>
		$('#birthday').change( e => {
			var dob = $('#birthday').val();
			if(dob != ''){
				var age = moment().diff(moment(dob, 'YYYY-MM-DD'), 'years');
				$('#age').val(age);
			}
		})
		
		$('#myTable').DataTable();

		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#confirm-pwd');
		
		togglePassword.addEventListener('click', function (e) {
			// toggle the type attribute
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			if(type === 'password') {
				$('#togglePassword').html('Show')
			} else {
				$('#togglePassword').html('Hide')
			}
			// toggle the eye slash icon
		});



		const togglePassword1 = document.querySelector('#togglePassword1');
		const current = document.querySelector('#current-pwd');
		
		togglePassword1.addEventListener('click', function (e) {
			// toggle the type attribute
			const type = current.getAttribute('type') === 'password' ? 'text' : 'password';
			current.setAttribute('type', type);
			if(type === 'password') {
				$('#togglePassword1').html('Show')
			} else {
				$('#togglePassword1').html('Hide')
			}
			// toggle the eye slash icon
		});


		const tp = document.querySelector('#togglePassword2');
		const zxx = document.querySelector('#new-pwd');
		
		tp.addEventListener('click', function (e) {
			// toggle the type attribute
			const type = zxx.getAttribute('type') === 'password' ? 'text' : 'password';
			zxx.setAttribute('type', type);
			if(type === 'password') {
				$('#togglePassword2').html('Show')
			} else {
				$('#togglePassword2').html('Hide')
			}
			// toggle the eye slash icon
		});



	
	</script>
</body>

</html>