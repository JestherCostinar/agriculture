<?php include '../config/functions.php';?>
<?php 
    if(isset($_POST['btn_login'])) {
        global $db;
        $role     = $db->real_escape_string($_POST['role']);
        $username = $db->real_escape_string($_POST['username']);
        $password = $db->real_escape_string($_POST['password']);
        login($username,$password,$role);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Store |  I-Agri</title>
    <link rel="canonical" href="<?=canonical()?>" />
    <link rel="stylesheet" href="assets/css/plugins.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

	<!-- pag di gumana alisin! -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DWTCPK0QT1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-DWTCPK0QT1');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7006703530854355"
     crossorigin="anonymous"></script>
	<!--  -->

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="assets/js/main/jquery.min.js"></script>
	<script src="assets/js/main/bootstrap.bundle.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="assets/js/app.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					<!-- Login card -->
					<form class="login-form" method="POST">
                    <input type="hidden" name="role" value="2">
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-3">
									<i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Login to your account</h5>
									<span class="d-block text-muted">Your credentials</span>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" class="form-control" name="username" placeholder="Username" required>
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
                                </div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
                                    <a href="javascript:void(0)"  id="togglePassword1" >Show</a>
                                </div>

								<div class="form-group">
									<button type="submit" name="btn_login" class="btn btn-primary btn-block">Sign in</button>
								</div>

                                <div class="text-center">
                                    <a href="forgot-password.php">Forgot password?</a>
                                </div>

								<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
							</div>
						</div>
					</form>
					<!-- /login card -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
    <script>
        const togglePassword1 = document.querySelector('#togglePassword1');
        const current = document.querySelector('#password');

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
    </script>
</body>
</html>
