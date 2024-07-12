<?php require 'templates/header.php'; ?>
<?php if (!isset($_SESSION['isLoggedIn'])) {

header('Location: signin.php');
exit;
} else { ?>
<body>
	<div class="loader-container">
		<label class="label">Loading...</label>
	</div>

	<?php require 'templates/nav.php'; ?>

	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		// get the item ID to delete from the cart
		$item_id = $_GET['id'];
		$page_url = $_GET['return_url'];

		// get the cart data from the session
		$cart_items = $_SESSION['cart'];

		// check if the item exists in the cart
		if (isset($cart_items[$item_id])) {
		    
		    unset($cart_items[$item_id]);

		    
		    $_SESSION['cart'] = $cart_items;

		    $_SESSION['notification'] = "Item Removed from cart!";
		    header('location: ' . $page_url);
		} else {
		    $_SESSION['notification'] = "Item Not found in cart!";
		}
	}
	?>


	<section id="banner" class="banner-bg cart-banner">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner-title text-center">
						<p class="banner-heading">shopping cart</p>
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a href="index.php">Home</a>
							</li>
							<li class="breadcrumb-item active text-uppercase" aria-current="page">shopping cart</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="cart container-fluid">
		<div class="row">
			<div class="container">
				<div class="row mt">
					<div class="col-12">
						<div class="cart__table-container">
							<div class="cart__table-scroll">
								<table class="table table-bordered mb-0">
									<thead class="">
										<tr>
											<th>Product</th>
											<th>Product Name</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Sub Total</th>
											<th>Action</th>
										</tr>
									</thead>
									<?php if (isset($_SESSION['cart'])) { 
									foreach ($_SESSION['cart'] as $item_id => $item_data) {
									?>
									<tr>
										<td>
											<img src="./admin/uploads/<?php echo $item_data['image']; ?>" alt="">
										</td>
										<td>
											<div class=""><span><?php echo $item_data['name']; ?></span>
											</div>
										</td>
										<td>
											<div class="cart__price text-center"><span>$<?php echo $item_data['price']; ?></span>
											</div>
										</td>
										<td>
											<div class="cart__qty text-center">
												<input type="text" name="cart__qty" id="cart_qty1" class="p-2" value="<?php echo $item_data['quantity']; ?>" style="border: none;" readonly>
											</div>
										</td>
										<td>
											<div class="text-center cart__price ">
												<span>$<?php $subtotal = $item_data['price'] * $item_data['quantity']; 
													echo $subtotal;
													?>
												</span>
											</div>
										</td>
										<td>
											<div class="text-center cart__action">
												<form action="item-cart.php?id=<?php echo $item_data['id']; ?>&return_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" method="POST">
													<button type="submit" onclick="return confirm('Are you sure you want to Delete it?')"><i class="fa fa-trash" aria-hidden="true"></i>
													</button>
												</form>
											</div>	
											<!-- <div class="text-center cart__action">
												<form action="item-cart.php?id=<?php //echo $item_data['id']; ?>&return_url=<?php //echo urlencode($_SERVER['REQUEST_URI']); ?>" method="POST">
													<button type="submit">
													</button>
												</form>
											</div>	 -->
										</td>
									</tr>
									<?php } } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="cart__border-bottom">
							<div class="cart__two-btn d-flex justify-content-between flex-md-row flex-column my-4"> <a href="shop-categories.html" class="cart__btn mb-4 mb-md-0 mx-auto mx-md-0"> &lt; continue shopping</a>
								<!-- <a class="cart__btn mx-auto mx-md-0">update cart</a> -->
							</div>
						</div>
					</div>
				</div>
				<div class="row my-4">
					<div class="col-12 col-md-6">
						
					</div>
					<div class="col-12 col-md-6">
						<div class="cart__right-container">
							<table class="table border">
								<thead>
									<tr>
										<th colspan="2" class="text-center text-md-left">Cart total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><span>Item(s) Subtotal</span>
										</td>
										<td>
											<div class="cart__price">
												<span>$<?php echo $totalAmount;?></span>
											</div>
										</td>
									</tr>
									<tr>
										<td><span>Delivery Charge</span>
										</td>
										<td>
											<div class="cart__price"><span>$20.00</span>
											</div>
										</td>
									</tr>
									<tr>
										<td><span class="font-weight-bold">Amount payable</span>
										</td>
										<td>
											<div class="cart__price cart__total-pay">
												<span>$
													<?php $payableAmount = $totalAmount + 20;
													echo $payableAmount;
													 ?>
												</span>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="row mb">
					<div class="col-12">
						<div class="cart__proceed-container">
							<div class="cart__proceed-btn d-flex justify-content-center justify-content-md-end mt-4"> <a href="checkout.php">Proceed to checkout > </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<?php require 'templates/footer.php';} ?>