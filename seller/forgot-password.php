<?php include '../config/functions.php';?>
<?php
if(isset($_POST['btn_forgot_password'])) {
    global $db;
    $email = $db->real_escape_string($_POST['email']);
    forgot_password_vendor($email);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
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
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Password recovery form -->
                <form class="login-form" method="POST">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-pill p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Password recovery</h5>
                                <span class="d-block text-muted">We'll send you instructions in email</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="email" class="form-control" name="email" placeholder="Your email">
                                <div class="form-control-feedback">
                                    <i class="icon-mail5 text-muted"></i>
                                </div>
                            </div>

                            <button type="submit" name="btn_forgot_password" class="btn btn-primary btn-block"><i class="icon-spinner11 mr-2"></i> Reset password</button>
                        </div>
                    </div>
                </form>
                <!-- /password recovery form -->

            </div>
            <!-- /content area -->


        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
