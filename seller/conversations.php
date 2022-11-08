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
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Messages</span> -
                            Conversations</h4>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="dashboard.php" class="breadcrumb-item">Dashboard</a>
                            <a href="conversations.php" class="breadcrumb-item">Messages</a>
                            <a href="#" class="breadcrumb-item active" aria-current="page">Conversations</a>
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
                                <table class="table datatable-responsive">
                                    <thead>
                                        <tr>
                                            <th style="width:1px">#</th>
                                            <th>Code</th>
                                            <th>Status</th>
                                            <th style="width:1px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach(view_conversations($_SESSION['vendor_id']) as $conversations) { ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$conversations['chat_group']?></td>
                                                <td><?=$conversations['status'] == 0 ? 'On Going' : 'Closed'?></td>
                                                <td><a href="chat.php?code=<?=$conversations['chat_group']?>&vendor_id=<?=$_SESSION['vendor_id']?>"><i class="icon-eye"></i></a></td>
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
    <?php include 'layouts/scripts.php';?>
    <!-- Theme JS files -->
    <script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script src="assets/js/demo_pages/datatables_responsive.js"></script>

    
</body>


</html>