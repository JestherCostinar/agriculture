<?php include 'layouts/header.php';?>
<?php 
    if(!isset($_SESSION['is_code'])) {
        header('location: login.php?success=false&message='.urlencode('You are not authorized to access this page.'));
    } else {
        if(isset($_POST['btn_retrieve'])) {
            global $db;
            $is_code              = $db->real_escape_string($_POST['is_code']);
            $confirm_password     = $db->real_escape_string($_POST['confirm_password']);
            $confirm_new_password = $db->real_escape_string($_POST['confirm_new_password']);
            retrieve_account($is_code,$confirm_password,$confirm_new_password);
        }
    }
?>
<body>
    <div class="site-wrapper">
        <?php include 'layouts/navigation.php';?>
        <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">My Account</li>
                    <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
                </ol>
            </div>
        </nav>
        <!-- Promotion Block 2 -->

        <main class="page-section pb--10 pt--50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                        <form method="POST" data-parsley-validate>
                        <input type="hidden" name="role" value="1">

                            <div class="login-form" style="background:#fff">
                                <div class="row">
                                    <div class="col-md-12 col-12 mb--20">
                                        <label>Security Code </label>
                                        <input class="mb-0" type="text" name="is_code" required maxlength="20">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>New Password</label>
                                        <input class="mb-0" type="password"  data-parsley-equalto="#current-pwd2"  name="confirm_password" id="current-pwd" required minlength="8" maxlength="20">
                                        <a href="javascript:void(0)" style="text-align:right" id="togglePassword1" >Show</a>
                                    </div>
                                    
                                    <div class="col-12 mb--20">
                                        <label>Confirm New Password</label>
                                        <input class="mb-0" type="password" data-parsley-equalto="#current-pwd"  name="confirm_new_password" id="current-pwd2" required minlength="8" maxlength="20">
                                        <a href="javascript:void(0)" style="text-align:right" id="togglePassword2" >Show</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <button type="submit" name="btn_retrieve" class="btn btn-success text-white w-100">Retrieve</button>
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </main>

        <!-- Slider bLock 4 -->

        <?php include 'layouts/footer.php';?>
    </div>
    <?php include 'layouts/scripts.php';?>
    <script>
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
		
		const togglePassword2 = document.querySelector('#togglePassword2');
		const current2 = document.querySelector('#current-pwd2');
		
		togglePassword2.addEventListener('click', function (e) {
			// toggle the type attribute
			const type = current.getAttribute('type') === 'password' ? 'text' : 'password';
			current2.setAttribute('type', type);
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