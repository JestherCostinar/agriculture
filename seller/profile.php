<?php include 'layouts/header.php';?>
<?php 
    if(isset($_POST['btn_information'])) {
        global $db;
        $surname     = $db->real_escape_string($_POST['surname']);
        $firstname   = $db->real_escape_string($_POST['firstname']);
        $email       = $db->real_escape_string($_POST['email']);
        $contact     = $db->real_escape_string($_POST['contact']);
        $contact     = $db->real_escape_string($_POST['contact']);
        update_account_details($firstname,$surname,$email,$contact);
    }
    
    if(isset($_POST['btn_address'])) {
        global $db;
        $id      = $_SESSION['vendor_id'];
        $city    = $db->real_escape_string($_POST['city']);
        $state   = $db->real_escape_string($_POST['state']);
        $zip     = $db->real_escape_string($_POST['zip']);
        $address = $db->real_escape_string($_POST['address']);
        insert_or_update_address($id,$city,$state,$zip,$address);
    }

    if(isset($_POST['btn_store'])) {
        global $db;
        $store_name     = $db->real_escape_string($_POST['store_name']);
        $shipping_fee     = $db->real_escape_string($_POST['shipping_fee']);
        
        update_store($store_name,$shipping_fee);
    }

    if(isset($_POST['btn_credentials'])) {
        global $db;
        $password           = $db->real_escape_string($_POST['password']);
        $confirm_password   = $db->real_escape_string($_POST['confirm_password']);
        
        change_vendor_password($password,$confirm_password);
    }
?>
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
                        <h4><span class="font-weight-semibold">Profile</span></h4>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="dashboard.php" class="breadcrumb-item">Dashboard</a>
                            <a href="profile.php" class="breadcrumb-item active">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Basic card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                    <h6>My Information</h6>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Surname:</label>
											<div class="col-lg-9">
												<input type="text" pattern="[a-zA-Z ]*" style="text-transform: capitalize;" class="form-control" name="surname" value="<?=$user['surname']?>" required >
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Firstname:</label>
											<div class="col-lg-9">
												<input type="text" pattern="[a-zA-Z ]*" style="text-transform: capitalize;" class="form-control" name="firstname" value="<?=$user['firstname']?>" required  >
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Email:</label>
											<div class="col-lg-9">
                                            <input type="email" pattern="[^ @]*@[^ @]*" style="text-transform: capitalize;" class="form-control" name="email" value="<?=$user['email']?>" required>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Contact:</label>
											<div class="col-lg-9">
												<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" class="form-control" name="contact" value="<?=$user['contact']?>" required minlength="11" maxlength="11">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Requirement:</label>
											<div class="col-lg-9">
												<input type="file" class="form-control" name="images[]">
											</div>
										</div>


                                        <?php if(empty($user['requirement']) || is_null($user['requirement'])) { ?>
                                        <?php } else { ?>
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label"></label>
											<div class="col-lg-9">
                                                <img src="../assets/image/requirement/<?=$user['requirement']?>" style="object-fit: cover;width: 100%;height: 300px;">
											</div>
										</div>
                                        <?php } ?>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Account Status:</label>
											<div class="col-lg-9">
                                            <span class="mt-1 text-uppercase <?=$user['is_verified'] == 0 ? 'badge badge-danger' : 'badge badge-success'?> "><?=$user['is_verified'] == 0 ? 'Unverified Account' : 'Verified Account'?></span>
											</div>
										</div>


                                        <div class="form-group row">
											<div class="col-lg-12">
												<button class="btn float-right btn-primary" name="btn_information">Save Changes</button>
											</div>
										</div>
									</form>
                                    <hr>
                                    <h6>Address</h6>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">City:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="city" value="<?=$addressQuery['city']?>" required>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">State:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="state" value="<?=$addressQuery['state']?>" required>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Address:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="address" value="<?=$addressQuery['address']?>" required>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Zip:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="zip" value="<?=$addressQuery['zip']?>" required>
											</div>
										</div>

                                   
                                     
                                        <div class="form-group row">
											<div class="col-lg-12">
												<button class="btn float-right btn-primary" name="btn_address">Save Changes</button>
											</div>
										</div>
									</form>
                                    <hr>
                                    <h6>My Credentials</h6>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Username:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="username" value="<?=$user['username']?>" required>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Password:</label>
											<div class="col-lg-9">
												<input type="password" class="form-control" name="password" required>
											</div>
										</div>

                                   
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Confirm Password:</label>
											<div class="col-lg-9">
												<input type="password" class="form-control" name="confirm_password"  required>
											</div>
										</div>

                                        <div class="form-group row">
											<div class="col-lg-12">
												<button class="btn float-right btn-primary" name="btn_credentials">Save Changes</button>
											</div>
										</div>
									</form>
                                    <hr>
                                    <h6>My Store </h6>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label"></label>
											<div class="col-lg-9">
                                                <img style="width:270px;height:270px" src="<?=$store['images'] == null ? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU' : '../assets/image/vendor/'.$store['images']?>" alt="">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Store Image:</label>
											<div class="col-lg-9">
												<input type="file" class="form-control" name="images[]">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Store Name:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="store_name" value="<?=$store['store_name']?>" required minlength="4" maxlength="20">
											</div>
										</div>

                                  
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Setup Shipping Fee:</label>
											<div class="col-lg-9">
												<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" name="shipping_fee" value="<?=$store['shipping_fee']?>" required required minlength="1" maxlength="2">
											</div>
										</div>

                                        <div class="form-group row">
											<div class="col-lg-12">
												<button name="btn_store" class="btn float-right btn-primary">Save Changes</button>
											</div>
										</div>
									</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- Theme JS files -->
</body>


</html>