
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-section sidebar-user my-1">
					<div class="sidebar-section-body">
						<div class="media">
							<a href="dashboard.php" class="mr-3">
								<img src="assets/images/placeholders/users.png" class="rounded-circle" alt="">
							</a>

							<div class="media-body">
								<div class="font-weight-semibold"><?=$userVendor['firstname'].' '.$userVendor['surname']?></div>
								<div class="font-size-sm line-height-sm opacity-50">
									<?=empty($store['store_name']) || is_null($store['store_name']) ? 'Not Available' : $store['store_name']?>
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-xl-inline-flex d-lg-inline-flex d-md-inline-flex d-inline-flex">
									<i class="icon-transmission"></i>
								</button>

								<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-xl-none d-lg-none d-md-none d-none">
									<i class="icon-cross2"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="sidebar-section">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item ">
							<a href="dashboard.php" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
					<!-- Layout -->
					
                        <li class="nav-item"><a href="forum.php" class="nav-link"><i class="icon-bubble"></i> <span>Forum</span></a></li>
                        <li class="nav-item"><a href="report-a-problem.php" class="nav-link"><i class="icon-envelope"></i> <span>Report a Problem</span></a></li>
                        
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Products</div> <i class="icon-menu" title="Content Management"></i></li>
						<li class="nav-item"><a href="add-new-products.php" class="nav-link"><i class="icon-stack2"></i> <span>Product</span></a></li>
						<li class="nav-item"><a href="transaction.php" class="nav-link"><i class="icon-stack2"></i> <span>Transaction</span></a></li>
						

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Exchange</div> <i class="icon-menu" title="Content Management"></i></li>
						<li class="nav-item"><a href="exchange-to-farmers.php" class="nav-link"><i class="icon-users"></i> <span>Farmers</span></a></li>
                        <li class="nav-item"><a href="exchange-requesting.php" class="nav-link"><i class="icon-users"></i> <span>Requesting</span></a></li>
                        <li class="nav-item"><a href="exchange-approval.php" class="nav-link"><i class="icon-users"></i> <span>Approval</span></a></li>
						
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Reports</div> <i class="icon-menu" title="Content Management"></i></li>
						<li class="nav-item "><a href="sales-report.php" 	class="nav-link"><i class="icon-home4"></i><span>Sales</span></a></li>

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>