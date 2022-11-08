
<?php include 'config/functions.php';?>
<?php 
save_visitors();
if(isset($_GET['add-to-cart']) == true) { 
    add_to_cart_from_links($_GET['id']);
}

if(isset($_GET['remove-cart']) == true) { 
    remove_cart_from_links($_GET['id'],$_GET['accounts_id']);
    header('Location: cart.php?success=true&message='.urlencode('Item has been removed to your cart'));
}

if(isset($_GET['logout']) == true) { 
    logout();
}
if(isset($_GET['method-of-payment']) == 'Stripe') {
    $method_of_payment = $_GET['method-of-payment'];
    $stripe_note = $_GET['stripe_note'];
    $stripe_shipping_trigger = $_GET['stripe_shipping_trigger'];
    $stripeToken = $_GET['stripeToken'];
    $stripeEmail = $_GET['stripeEmail'];
    stripe($stripe_shipping_trigger,$method_of_payment,$stripe_note,$stripeToken,$stripeEmail);
}

if(isset($_GET['search']) == true) {
    $wildcard = urlencode($db->real_escape_string($_GET['wildcard']));
    $category = $db->real_escape_string($_GET['category']);
    get_searched_result($wildcard,$category);
    header('location: search.php?wildcard='.$wildcard.'&category='.$category);
}

?>

<?php if(isset($_SESSION['id'])) { ?>
    <?php $query         = account_details($_SESSION['id'])?>
    <?php $user          = $query->fetch_assoc();?>
    <?php $billingQuery  = account_billing_address($_SESSION['id'])?>
    <?php $billing       = $billingQuery->fetch_assoc();?>
    <?php $shippingQuery = account_shipping_address($_SESSION['id'])?>
    <?php $shipping      = $shippingQuery->fetch_assoc();?>
   
<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>I-Agri</title>
    <link rel="canonical" href="<?=canonical()?>" />
    <link rel="stylesheet" href="assets/css/plugins.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/parsley/parsley.css" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/image/favicon.ico">
    <link rel="stylesheet" href="assets/css/footable.bootstrap.min.css" />

    <style>
        /* body{
            background:#daecd2;
        } */
    </style>
</head>
