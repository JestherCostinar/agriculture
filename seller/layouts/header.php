<?php include '../config/functions.php';?>

<?php
 
if(!isset($_SESSION['vendor'])) {
	header('location: index.php');
}
$userVendor = account_details($_SESSION['vendor_id'])->fetch_assoc();
$addressQuery = get_accounts_address($_SESSION['vendor_id'])->fetch_assoc();
$store = store_details($_SESSION['vendor_id'])->fetch_assoc();
if(isset($_GET['approve']) == true) {
    complete_exchange($_GET['approver'],$_GET['reference']);
}

if(isset($_GET['approve']) == '2') {
    reject_exchange($_GET['approver'],$_GET['reference']);
}

if(isset($_GET['logout']) == true) {
	unset($_SESSION['vendor']);
    header('location: index.php');
}

$self = $_SERVER['PHP_SELF'];

if($userVendor['is_verified'] == 0 && $self != '/seller/profile.php') {
	header('location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en" class="layout-static">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Stores | A-Agri</title>
    <link rel="canonical" href="<?=canonical()?>" />
    <link rel="stylesheet" href="assets/css/plugins.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
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