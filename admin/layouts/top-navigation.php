<div class="navbar navbar-expand-lg navbar-dark navbar-static">

		<div class="d-flex flex-1 d-lg-none">

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-transmission"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
		
		</div>

		<ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">

			<li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
					<img src="assets/images/placeholders/users.png" class="rounded-pill mr-lg-2" height="34" alt="">
					<span class="d-none d-lg-inline-block"><?=$user['firstname'].' '.$user['surname']?></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<!-- <div class="dropdown-divider"></div> -->
					<a href="?logout=true" class="dropdown-item">Logout</a>
				</div>
			</li>
		</ul>
	</div>