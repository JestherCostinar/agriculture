<?php include 'layouts/header.php';?>
<?php 
    if(isset($_POST['btn_create_new_account'])) {
        global $db;
        $email      = $db->real_escape_string($_POST['email']);
        $username   = $db->real_escape_string($_POST['username']);
        $password   = $db->real_escape_string($_POST['password']);
        $role       = $db->real_escape_string($_POST['role']);
        $surname    = $db->real_escape_string($_POST['surname']);
        $firstname  = $db->real_escape_string($_POST['firstname']);
        $contact    = $db->real_escape_string($_POST['contact']);
        $valid_id   = $db->real_escape_string($_POST['valid_id']);
        $store_name = $db->real_escape_string($_POST['store_name']);
        create_new_account($surname,$firstname,$contact,$email,$username,$password,$role,$valid_id,$store_name);
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
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </div>
        </nav>
        <!-- Promotion Block 2 -->

        <main class="page-section pb--10 pt--50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                        <!-- Login Form s-->
                        <form method="POST" enctype="multipart/form-data" data-parsley-validate>

                            <div class="login-form" style="background:#fff">
                                <div class="row">

                                    <div class="col-md-12 col-12 mb--20">
                                        <label>Surname <a style="text-align:right; font-size:smaller; color: red;" >*</a></label>
                                        <input class="mb-0"  type="text" name="surname" required>
                                    </div>

                                    <div class="col-md-12 col-12 mb--20">
                                        <label>First Name <a style="text-align:right; font-size:smaller; color: red;" >*</a></label>
                                        <input class="mb-0"  type="text" name="firstname" required>
                                    </div>

                                    <div class="col-md-12 col-12 mb--20">
                                        <label>Contact Number <a style="text-align:right; font-size:smaller; color: red;" >*</a></label>
                                        <input class="mb-0"  type="text" name="contact" required>
                                    </div>

                                    <div class="col-md-12 col-12 mb--20">
                                        <label>Email Address <a style="text-align:right; font-size:smaller; color: red;" >*</a></label>
                                        <input class="mb-0"  type="email" name="email" required>
                                    </div>

                                    <div class="col-md-12 col-12 mb--20">
                                        <label>Registered as: </label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="1">Customer</option>
                                            <option value="2">Seller</option>
                                        </select>
                                    </div>

                                    <div id="seller" hidden>
                                        <div class="col-md-12 col-12 mb--20">
                                            <label>Valid ID: </label>
                                            <select name="valid_id" class="form-control">
                                                <optgroup label="Primary">
                                                    <option value="Philippine Passport">Philippine Passport</option>
                                                    <option value="SSS ID or SSS UMID Card">SSS ID or SSS UMID Card</option>
                                                    <option value="GSIS ID or GSIS UMID Card">GSIS ID or GSIS UMID Card</option>
                                                    <option value="Driver's License">Driver's License</option>
                                                    <option value="PRC ID">PRC ID</option>
                                                    <option value="OWWA ID">OWWA ID</option>
                                                    <option value="iDOLE Card">iDOLE Card</option>
                                                    <option value="Voter's ID">Voter's ID</option>
                                                    <option value="Senior Citizen ID">Senior Citizen ID</option>
                                                    <option value="Philhealth ID">Philhealth ID</option>
                                                </optgroup>

                                                <optgroup label="Secondary">
                                                    <option value="TIN ID">TIN ID</option>
                                                    <option value="Postal ID">Postal ID</option>
                                                    <option value="Barangay Certification">Barangay Certification</option>
                                                    <option value="GSIS e-Card">GSIS e-Card</option>
                                                    <option value="Seaman's Book">Seaman's Book</option>
                                                    <option value="DSWD Certification">DSWD Certification</option>
                                                    <option value="Police Clearance">Police Clearance</option>
                                                    <option value="Barangay Clearance">Barangay Clearance</option>
                                                    <option value="Cedula">Cedula</option>
                                                    <option value="PSA Marriage Contract">PSA Marriage Contract</option>
                                                    <option value="PSA Birth Certificate">PSA Birth Certificate</option>
                                                </optgroup>
                                                <optgroup label="Others">
                                                    <input class="mb-0"  type="text" name="otherID" required > Input Another ID
                                                </optgroup>
                                            </select>
                                        </div>

                                        <div class="col-md-12 col-12 mb--20">
                                            <label>Image: </label>
                                            <input type="file" name="files" id="images" class="form-control">
                                        </div>

                                        <div class="col-md-12 col-12 mb--20">
                                            <label>Store Name: </label>
                                            <input type="text" name="store_name" id="store_name" class="mb-0" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-12 mb--20">
                                        <label>Username <a style="text-align:right; font-size:smaller; color: red;" >*</a></label>
                                        <input class="mb-0"  type="text" name="username" required >
                                    </div>

                                    <div class="col-12 mb--20">
                                        <label>Password <a style="text-align:right; font-size:smaller; color: red;" >*</a></label>
                                        <input class="mb-0" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  data-parsley-equalto="#confirm_password" name="password" id="password" required minlength="8" maxlength="20">
                                        <a style="text-align:right; font-size:smaller; color: red;" >Use 8 or more characters with a mix of letters, uppercase, numbers & symbols </a><br>
                                        <a href="javascript:void(0)" style="text-align:right" id="togglePassword1" >Show</a>
                                    </div>

                                    <div class="col-12 mb--20">
                                        <label>Confirm Password <span class="hovertext" data-hover="Required Field"> * </span>
                                        <input class="mb-0" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="confirm_password" id="confirm_password"  data-parsley-equalto="#password"  required minlength="8" maxlength="20">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <button type="submit" name="btn_create_new_account" class="btn btn-success text-white w-100">Create New Account</button>
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
        $('#role').change(e => {
            e.preventDefault();
            var role = $('#role').val();
            if(role == 2) {
                $('#seller').removeAttr('hidden',false)
                $('#images,#store_name').attr('required',true)
            } else {
                $('#seller').attr('hidden',true)
                $('#store_name').val('')
                $('#images,#store_name').attr('required',false)
                $('#images').val('')
            }

        })
        
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