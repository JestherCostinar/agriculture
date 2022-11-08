iamge<?php include 'layouts/header.php'; ?>
<?php if (!isset($_SESSION['id'])) { ?>
	<?php header('location: products.php?success=true&message=' . urlencode('Your cart is empty')) ?>
<?php } ?>
<?php if (isset($_POST['update_cart'])) {
	$id = $_POST['id'];
	$quantity = $_POST['quantity'];
	update_cart($id, $quantity);
}
?>

<style>

</style>

<body>
	<div class="site-wrapper">
		<?php include 'layouts/navigation.php'; ?>
		<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="home.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Cart</li>
				</ol>
			</div>
		</nav>


		<div class="cart_area cart-area-padding sp-inner-page--top">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<form method="POST">
							<!-- Cart Table -->
							<div class=" text-center mb--40">
								<table class="table">
									<!-- Head Row -->
									<thead>
										<tr>
											<th class="pro-remove table-success"></th>
											<th class="pro-thumbnail table-success">Image</th>
											<th class="pro-thumbnail table-success">Store</th>
											<th class="pro-title table-success">Product</th>
											<th data-breakpoints="xs" class="pro-title table-success">Shipping Fee</th>
											<th data-breakpoints="xs" class="pro-price table-success">Price</th>
											<th data-breakpoints="xs" class="pro-quantity table-success">Quantity</th>
											<th data-breakpoints="xs" class="pro-subtotal table-success">Total</th>
										</tr>

									</thead>
									<tbody>
										<!-- Product Row -->
										<?php $total = 0; ?>
										<?php foreach (get_total_price_in_cart() as $cart) {
											$total = $cart['total_price_in_cart'] ?>
										<?php } ?>

										<?php foreach (get_shipping_fee() as $cart) { ?>

											<?php $shipping_fee = $cart['total_shipping_fee']; ?>

										<?php } ?>

										<?php foreach (get_cart_item_of_user_with_vendor() as $cart) { ?>
											<tr>

												<td data-expanded="true" class="pro-remove"><a href="?remove_cart=true&id=<?= $cart['id'] ?>" onclick="return confirm('Are you sure you want to remove this from your card')" class="text-danger"><i class="far fa-trash-alt"></i></a></td>
												<td class="pro-thumbnail"><a href="javascript:void(0)">
														<?php if (empty($cart['image']) || is_null($cart['image'])) { ?>
															<img style="width:73px;height:73px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" alt="">
														<?php } else { ?>
															<img style="width:73px;height:73px" src="assets/image/product/<?= $cart['image'] ?>" alt="">
														<?php } ?>

													</a></td>
												<td class="pro-title"><a href="javascript:void(0)"><?= $cart['store_name'] ?></a></td>
												<td class="pro-title"><a href="javascript:void(0)"><?= $cart['title'] ?></a></td>
												<td class="pro-price"><span>₱<?= number_format($shipping_fee, 2) ?></span></td>
												<td class="pro-price"><span>₱<?= number_format($cart['price'], 2) ?></span></td>
												<td class="pro-quantity">
													<div class="pro-qty">
														<div class="count-input-block">
															<input type="hidden" name="id[]" value="<?= $cart['variation_id'] ?>">
															<input type="number" id="quantity" name="quantity[]" class="form-control text-center" min=1 value="<?= $cart['qty'] ?>">
														</div>
													</div>
												</td>
												<td class="pro-subtotal"><span>₱<?= number_format($cart['price'] * $cart['qty'], 2) ?></span></td>
											</tr>
										<?php } ?>

										<!-- Product Row -->
									</tbody>
									<tfoot>
										<tr>
											<td colspan="8" class="actions pull-left ">
												<div class="pull-left ">
													<br>
													Sub Total : <strong>₱<?= number_format($total + $shipping_fee, 2) ?></strong>
													<br>
													<br>
													<!-- <button type="submit" class="btn" name="update_cart">Update cart</button> -->
													<a href="checkout.php" class="btn btn-success text-white" name="update_cart">Checkout</a>
													<br>
													<br>
												</div>
											</td>
										</tr>
									</tfoot>
								</table>
								<!-- Discount Row  -->

							</div>

						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Slider bLock 4 -->

		<?php include 'layouts/footer.php'; ?>
	</div>
	<?php include 'layouts/scripts.php'; ?>

	<script>
		// kelangan i instanciate yong footable para gumana.. kelangan din na tama yong url ng asset bago gumana etong plugin (footable)
		jQuery('#quantity').bind('keypress', function(e) {
			e.preventDefault();
		});
	</script>
</body>

</html>