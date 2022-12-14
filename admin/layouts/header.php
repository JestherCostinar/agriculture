<?php include '../config/functions.php';?>
<?php 
if(!isset($_SESSION['administrator'])) {
	header('location: index.php');
}
$user = account_details($_SESSION['admin_id'])->fetch_assoc();

if(isset($_GET['logout']) == true) {
	unset($_SESSION['administrator']);
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en" class="layout-static">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin |  A-Agri</title>
    <link rel="canonical" href="<?=canonical()?>" />
    <link rel="stylesheet" href="../assets/css/plugins.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

	<!-- pag di gumana alisin! -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<style>
		button {
			border-radius:0px !important;
		}
	</style>
</head>