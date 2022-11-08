<?php include 'layouts/header.php';?>
<?php 
if(isset($_POST['btn_create_vendor'])) {
    $surname    = $db->real_escape_string($_POST['surname']);
    $firstname  = $db->real_escape_string($_POST['firstname']);
    $email      = $db->real_escape_string($_POST['email']);
    $contact    = $db->real_escape_string($_POST['contact']);
    $username   = $db->real_escape_string($_POST['username']);
    $password   = $db->real_escape_string($_POST['password']);
    $role       = $db->real_escape_string($_POST['role']);
    create_vendor($surname,$firstname,$email,$contact,$username,$password,$role);
}

if(isset($_POST['btn_update_vendor'])) {
    $id           = $db->real_escape_string($_POST['update_id']);
    $surname      = $db->real_escape_string($_POST['update_surname']);
    $firstname    = $db->real_escape_string($_POST['update_firstname']);
    $email        = $db->real_escape_string($_POST['update_email']);
    $contact      = $db->real_escape_string($_POST['update_contact']);
    $is_verified  = $db->real_escape_string($_POST['is_verified']);
    update_vendor($id,$surname,$firstname,$email,$contact,$is_verified);
}

if(isset($_GET['delete']) == 'true') {
    delete_vendor($_GET['id']);
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
                        <h4><span class="font-weight-semibold">Manage User</span>
                            - Create</h4>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
                    <div class="d-flex">
                        <nav aria-label="breadcrumb">
                            <div class="container">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="add-new-vendor.php">Manage User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                                </ol>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- /page header -->
            

            <!-- Content area -->
            <div class="content">
                <div class="form-group">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_create_vendor">Add
                        New</button>
                </div>
                <!-- Basic card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table datatable-responsive">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Role</th>
                                            <th style="width:1px">Verified</th>
                                            <th style="width:100px"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach(get_vendors() as $vendors) { ?>
                                        <tr>
                                            <td style="width:1px"><?=$i++?></td>
                                            <td><?=$vendors['firstname']?> <?=$vendors['surname']?></td>
                                            <td><?=$vendors['email']?></td>
                                            <td><?=$vendors['contact']?></td>
                                            <td>
                                                <?php
                                                    if($vendors['role'] == 0) { 
                                                        echo 'Administrator';
                                                    } elseif($vendors['role'] == 2) {
                                                        echo 'Seller';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if($vendors['role'] == 2) { ?>
                                                    <?=$vendors['is_verified'] == 0 ? 'No' : 'Yes'?>
                                                <?php }  ?>
                                            </td>
                                            <td><a href="javascript:void(0)" onclick="modal_edit_vendor('<?=$vendors['id']?>','<?=$vendors['surname']?>','<?=$vendors['firstname']?>','<?=$vendors['email']?>','<?=$vendors['contact']?>','<?=$vendors['requirement']?>','<?=$vendors['is_verified']?>')"><i class="icon-eye"></i> | <a href="?delete=true&id=<?=$vendors['id']?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
                                                    
    <form method="POST" enctype="multipart/form-data">
        <div id="modal_create_vendor" class="modal" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title update-modal-title">Create User</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Surname</label>
                                    <input type="text" pattern="[a-zA-Z ]*" style="text-transform: capitalize;" name="surname" class="form-control" required minlength="1" maxlength="20">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Firstname</label>
                                    <input type="text" pattern="[a-zA-Z ]*" style="text-transform: capitalize;" name="firstname" class="form-control" required minlength="2" maxlength="25">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">email</label>
                                    <input type="email" pattern="[^ @]*@[^ @]*" name="email" class="form-control" required minlength="4" maxlength="40">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">contact</label>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="contact" class="form-control" required minlength="12" maxlength="12">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" style="text-transform: capitalize;" name="username" class="form-control" required minlength="4" maxlength="20">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" value="12345678"
                                        required minlength="4" maxlength="15"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" class="form-control" id="">
                                        <option value="0">Administrator</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn_create_vendor" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" enctype="multipart/form-data">
        <div id="modal_update_vendor" class="modal" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title update-modal-title">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Surname</label>
                                    <input type="text" pattern="[a-zA-Z ]*" pattern="[^()/<>[]\,'|\x22]+" style="text-transform: capitalize;" name="update_surname" id="update_surname" class="form-control" required minlength="2" maxlength="20">
                                    <input type="hidden" name="update_id" id="update_id" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Firstname</label>
                                    <input type="text" pattern="[a-zA-Z ]*" pattern="[^()/<>[]\,'|\x22]+" style="text-transform: capitalize;" name="update_firstname" id="update_firstname" class="form-control" required minlength="4" maxlength="25">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">email</label>
                                    <input type="text" pattern="[^ @]*@[^ @]*" style="text-transform: capitalize;" name="update_email" id="update_email" class="form-control" required minlength="4" maxlength="40">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">contact</label>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" pattern="[^()/<>[]\,'|\x22]+" name="update_contact" id="update_contact" class="form-control" required minlength="11" maxlength="11">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Account Status</label>
                                    <select name="is_verified" id="is_verified" class="form-control">
                                        <option value="0">Unverify</option>
                                        <option value="1">Verify</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <img src="" class="img-responsive" id="requirements">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn_update_vendor" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php include 'layouts/scripts.php';?>
    <script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script src="assets/js/demo_pages/datatables_responsive.js"></script>
    <script>
        function modal_edit_vendor(id,surname,firstname,email,contact,image,is_verified) {
            $('#modal_update_vendor').modal()
            $('#update_id').val(id);
            $('#update_surname').val(surname);
            $('#update_firstname').val(firstname);
            $('#update_email').val(email);
            $('#update_contact').val(contact);
            $('#is_verified').val(is_verified);
            $("#requirements").attr("src",'../assets/image/requirement/'+image);
        }
    </script>
</body>

</html>