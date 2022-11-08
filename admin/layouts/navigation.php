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
								<div class="font-weight-semibold"><?=$user['firstname'].' '.$user['surname']?></div>
								<div class="font-size-sm line-height-sm opacity-50">
									Administrator
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-xl-inline-flex d-lg-inline-flex d-md-inline-flex d-inline-flex">
									<i class="icon-transmission"></i>
								</button>

								<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-xl-none d-lg-none d-md-none  d-none">
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

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Manage User</div> <i class="icon-menu" title="Sub Categories"></i></li>
						<li class="nav-item "><a href="add-new-vendor.php" class="nav-link"><i class="icon-home4"></i><span>Create</span></a></li>


						<!-- Layout -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Products</div> <i class="icon-menu" title="Content Management"></i></li>
						<li class="nav-item "><a href="view-products.php" class="nav-link"><i class="icon-home4"></i><span>View</span></a></li>
						<li class="nav-item"><a href="transaction.php" class="nav-link"><i class="icon-stack2"></i> <span>Transaction</span></a></li>

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Categories</div> <i class="icon-menu" title="Categories"></i></li>
						<li class="nav-item "><a href="add-new-categories.php" class="nav-link"><i class="icon-home4"></i><span>Create</span></a></li>

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Sub Categories</div> <i class="icon-menu" title="Sub Categories"></i></li>
						<li class="nav-item "><a href="add-new-sub-categories.php" class="nav-link"><i class="icon-home4"></i><span>Create</span></a></li>

						<!-- <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Search Engine Optimizaton</div> <i class="icon-menu" title="Search Engine Optimizaton"></i></li> -->
						<!-- <li class="nav-item "><a href="add-new-seo.php" class="nav-link"><i class="icon-home4"></i><span>Create</span></a></li> -->
						
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Reports</div> <i class="icon-menu" title="Content Management"></i></li>
						<!-- <li class="nav-item "><a href="product-report.php"  class="nav-link"><i class="icon-home4"></i><span>Product</span></a></li> -->
						<li class="nav-item "><a href="sales-report.php" 	class="nav-link"><i class="icon-home4"></i><span>Sales</span></a></li>
						<!-- <li class="nav-item "><a href="users-report.php" 	class="nav-link"><i class="icon-home4"></i><span>Users</span></a></li>
						<li class="nav-item "><a href="payment-report.php"  class="nav-link"><i class="icon-home4"></i><span>Payment</span></a></li>
						<li class="nav-item "><a href="age-report.php" 		class="nav-link"><i class="icon-home4"></i><span>Age</span></a></li>
						<li class="nav-item "><a href="gender-report.php" 	class="nav-link"><i class="icon-home4"></i><span>Gender</span></a></li>
						<li class="nav-item "><a href="marital-report.php" 	class="nav-link"><i class="icon-home4"></i><span>Martial</span></a></li>
						<li class="nav-item "><a href="location-report.php" class="nav-link"><i class="icon-home4"></i><span>Location</span></a></li> -->

						<!-- /layout -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>