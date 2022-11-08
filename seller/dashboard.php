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
                        <h4>Dashboard</h4>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="dashboard.php" class="breadcrumb-item active"><i class="icon-home2 mr-2"></i> Dashboard</a>
                        </div>
                        <a href="dashboard.php" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

            

                <!-- Basic card -->
                <div class="row">
                <div class="col-md-6 col-lg-3 col-12">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-cart icon-3x text-warning"></i>
                                </div>

                                <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0"><?=get_transaction_status(0,$_SESSION['vendor_id'])?></h3>
                                    <span class="text-uppercase font-size-sm text-muted">Pending</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-cart icon-3x text-primary"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h3 class="font-weight-semibold mb-0"><?=get_transaction_status(1,$_SESSION['vendor_id'])?></h3>
                                    <span class="text-uppercase font-size-sm text-muted">Processing</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-cart icon-3x text-success"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h3 class="font-weight-semibold mb-0"><?=get_transaction_status(2,$_SESSION['vendor_id'])?></h3>
                                    <span class="text-uppercase font-size-sm text-muted">Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-cart icon-3x text-danger"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h3 class="font-weight-semibold mb-0"><?=get_transaction_status(3,$_SESSION['vendor_id'])?></h3>
                                    <span class="text-uppercase font-size-sm text-muted">Cancelled</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row ">
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-cash icon-3x text-success"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h3 class="font-weight-semibold mb-0">₱<?=get_transaction_sales($_SESSION['vendor_id'])?></h3>
                                    <span class="text-uppercase font-size-sm text-muted">Total Sales</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="row">

               
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart" id="google-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /basic card -->

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
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
                        /* ------------------------------------------------------------------------------
                *
                *  # Google Visualization - lines
                *
                *  Google Visualization line chart demonstration
                *
                * ---------------------------------------------------------------------------- */


                // Setup module
                // ------------------------------

                var GoogleLineBasic = function() {


                //
                // Setup module components
                //

                // Line chart
                var _googleLineBasic = function() {
                    if (typeof google == 'undefined') {
                        console.warn('Warning - Google Charts library is not loaded.');
                        return;
                    }

                    // Initialize chart
                    google.charts.load('current', {
                        callback: function () {

                            // Draw chart
                            drawLineChart();

                            // Resize on sidebar width change
                            var sidebarToggle = document.querySelectorAll('.sidebar-control');
                            if (sidebarToggle) {
                                sidebarToggle.forEach(function(togglers) {
                                    togglers.addEventListener('click', drawLineChart);
                                });
                            }

                            // Resize on window resize
                            var resizeLineBasic;
                            window.addEventListener('resize', function() {
                                clearTimeout(resizeLineBasic);
                                resizeLineBasic = setTimeout(function () {
                                    drawLineChart();
                                }, 1);
                            });
                        },
                        packages: ['corechart']
                    });

                    // Chart settings
                    function drawLineChart() {

                        // Define charts element
                        var line_chart_element = document.getElementById('google-line');

                        // Data
                                var data = google.visualization.arrayToDataTable([
                                    ['Year','Sales'],
                                    <?php if(get_all_sales_transaction($_SESSION['vendor_id'])->num_rows > 0) { ?>
                                        <?php foreach(get_all_sales_transaction($_SESSION['vendor_id']) as $transaction) { ?>
                                            ['<?=date('M',strtotime($transaction['created_at']))?> <?=date('Y',strtotime($transaction['created_at']))?>',<?=get_sales($transaction['month'],$transaction['year'],$_SESSION['vendor_id'])?>],
                                        <?php } ?>
                                    <?php } else { ?>
                                        ['<?=date('Y')?>',0]
                                    <?php } ?>
                                   
                                ]);

                                // Options
                                var options = {
                                    fontName: 'Roboto',
                                    height: 400,
                                    fontSize: 12,
                                    chartArea: {
                                        left: '5%',
                                        width: '94%',
                                        height: 350
                                    },
                                    pointSize: 7,
                                    curveType: 'function',
                                    backgroundColor: 'transparent',
                                    tooltip: {
                                        textStyle: {
                                            fontName: 'Roboto',
                                            fontSize: 13
                                        }
                                    },
                                    vAxis: {
                                        title: 'Sales in Peso',
                                        titleTextStyle: {
                                            fontSize: 13,
                                            italic: false,
                                            color: '#333'
                                        },
                                        textStyle: {
                                            color: '#333'
                                        },
                                        baselineColor: '#ccc',
                                        gridlines:{
                                            color: '#eee',
                                            count: 10
                                        },
                                        minValue: 0
                                    },
                                    hAxis: {
                                        textStyle: {
                                            color: '#333'
                                        }
                                    },
                                    legend: {
                                        position: 'top',
                                        alignment: 'center',
                                        textStyle: {
                                            color: '#333'
                                        }
                                    },
                                    series: {
                                        0: { color: '#EF5350' }
                                    }
                                };

                                // Draw chart
                                var line_chart = new google.visualization.LineChart(line_chart_element);
                                line_chart.draw(data, options);
                            }
                        };


                        //
                        // Return objects assigned to module
                        //

                        return {
                            init: function() {
                                _googleLineBasic();
                            }
                        }
                        }();


                        // Initialize module
                        // ------------------------------

                        GoogleLineBasic.init();

    </script>

</body>

</html>