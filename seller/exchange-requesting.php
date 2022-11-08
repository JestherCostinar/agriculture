<?php include 'layouts/header.php';?>

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
                        Requesting</h4>
                </div>
            </div>

            <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard.php" class="breadcrumb-item">Dashboard</a>
                        <a href="transaction.php" class="breadcrumb-item">Exchange</a>
                        <a href="" class="breadcrumb-item active" aria-current="page">Requesting</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Basic card -->
            <?php if(isset($_GET['reference'])) { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table datatable-responsive">
                                    <thead>
                                    <tr>
                                        <th style="width:1px">#</th>
                                        <th>Reference</th>
                                        <th>Approver</th>
                                        <th>Product</th>
                                        <th>Variant</th>

                                        <th>Price</th>

                                        <th>Quantity</th>

                                        <th>Total</th>

                                        <th>Status</th>
                                        <th style="width:1px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach(view_my_exchange_lists_all($_SESSION['vendor_id'],$_GET['reference']) as $orders) { ?>
                                        <?php $row = account_details($orders['requestor_id'])->fetch_assoc();?>
                                        <?php if($_SESSION['vendor_id'] != $orders['requestor_id']) { ?>

                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$orders['reference']?></td>
                                                <td><?=$row['firstname'].' '.$row['surname']?></td>
                                                <td><?=$orders['title']?></td>
                                                <td><?=$orders['variant']?></td>
                                                <td>₱<?=number_format($orders['price'],2)?></td>
                                                <td><?=$orders['quantity']?></td>
                                                <td>₱<?=number_format($orders['price']*$orders['quantity'],2)?></td>


                                                <td><?=$orders['status']==0?'Pending':'Completed'?></td>

                                                <td style="width:1px"> <a href="exchange-requesting.php?reference=<?=$orders['reference']?>" >View</a></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table datatable-responsive">
                                    <thead>
                                    <tr>
                                        <th style="width:1px">#</th>
                                        <th>Reference</th>
                                        <th>Approver</th>
                                        <th>Email</th>
                                        <th>Contact</th>

                                        <th>Status</th>
                                        <th style="width:1px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach(view_my_exchange_requesting($_SESSION['vendor_id']) as $orders) { ?>

                                        <?php $row = account_details($orders['approver_id'])->fetch_assoc();?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$orders['reference']?></td>
                                            <td><?=$row['firstname'].' '.$row['surname']?></td>
                                            <td><?=$row['email']?></td>
                                            <td><?=$row['contact']?></td>
                                            <td><?=$orders['status']==0?'Pending':'Completed'?></td>

                                            <td style="width:1px"> <a href="exchange-requesting.php?reference=<?=$orders['reference']?>" >View</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

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
<script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
<script src="assets/js/demo_pages/datatables_responsive.js"></script>
</body>


</html>