<?php require 'templates/header.php'; ?>
<?php if ((!isset($_SESSION['isLoggedIn'])) || !isset($_SESSION['cart'])) {

	header('Location: signin.php');
	exit;
} else { ?>

	<body>
		<div class="loader-container">
			<label class="label">Loading...</label>
		</div>

		<?php require 'templates/nav.php'; ?>

		<section id="banner" class="banner-bg checkout-banner">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="banner-title text-center">
							<p class="banner-heading">checkout</p>
							<ol class="breadcrumb justify-content-center">
								<li class="breadcrumb-item"><a href="index.html">Home</a>
								</li>
								<li class="breadcrumb-item"><a href="cart.html">cart</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">checkout</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="checkout container-fluid">
			<div class="row">
				<div class="container">
					<div class="row my-lg-5 mb-5">
						<div class="col-12 col-lg-8">
							<div class="checkout__form my-5">
								<h4 class="text-uppercase font-weight-bold mb-4">billing details</h4>
								<?php
								require 'db_connection.php';

								$id = $_SESSION['userID'];

								$sql = "SELECT * FROM user WHERE id = $id";

								$results = $conn->query($sql);

								$data = $results->fetch_assoc();







								?>
								<div class="form">
									<div class="form-group mb-4">
										<label for="fname" class="text-capitalize">Full name</label>
										<input type="text" class="form-control" id="fname" value="<?php echo $data['full_name']; ?>" style="">
									</div>
									<div class="form-group mb-4">
										<label for="email" class="text-capitalize">email</label>
										<input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $data['email']; ?>" placeholder="name@example.com">
									</div>
									<div class="form-group mb-4">
										<label for="pnumber" class="text-capitalize">Phone number</label>
										<input type="text" class="form-control" id="pnumber" value="<?php echo $data['phone_number']; ?>">
										<input type="hidden" name="userId" value="<?php echo $data['id']; ?>">
									</div>
									<?php

									$sql = "SELECT user_address, user_zip, user_area FROM user WHERE id = $id";
									

									$results = $conn->query($sql);

									if ($results->num_rows > 0){
										$data = $results->fetch_assoc();
										echo "sql found";
									?>
										<form action="place_order.php" method="POST">
											<div class="form-group mb-4">
												<label for="address" class="text-capitalize">Address</label>
												<input type="text" class="form-control" id="address" name="address" value="<?php echo $data['user_address']; ?>">
											</div>
											<div class="row">
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label for="addresszip" class="text-capitalize">Pastcode/Zip</label>
														<input type="text" class="form-control" id="addresszip" name="addresszip" value="<?php echo $data['user_zip']; ?>">
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label for="addressname" class="text-capitalize">Area</label>
														<input type="text" class="form-control" id="addressname" name="area" value="<?php echo $data['user_area']; ?>">
														<input type="hidden" name="stored_address" value="true">
													</div>
												</div>
											</div>
										<?php } else { ?>
											<form action="place_order.php" method="POST">
												<div class="form-group mb-4">
													<label for="address" class="text-capitalize">Address</label>
													<input type="text" class="form-control" id="address" name="address" required>
												</div>
												<div class="row">
													<div class="col-12 col-md-6">
														<div class="form-group">
															<label for="addresszip" class="text-capitalize">Pastcode/Zip</label>
															<input type="text" class="form-control" id="addresszip" name="addresszip" required>
														</div>
													</div>
													<div class="col-12 col-md-6">
														<div class="form-group">
															<label for="addressname" class="text-capitalize">Area</label>
															<input type="text" class="form-control" id="addressname" name="area" required>
															<input type="hidden" name="stored_address" value="true">
														</div>
													</div>
												</div>
											<?php } ?>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-4">
							<?php if (isset($_SESSION['cart'])) { ?>
								<div class="checkout__order-section my-lg-5">
									<h4 class="text-uppercase font-weight-bold">your order</h4>
									<div class="checkout__order-item-container mb-5">
										<?php
										foreach ($_SESSION['cart'] as $item_id => $item_data) {
										?>
											<div class="checkout__order-item py-4 d-flex">
												<div class="checkout__order-item__img-container">
													<a href="shop-detail.html">
														<img src="./admin/uploads/<?php echo $item_data['image']; ?>" class="p-2 mr-3" alt="">
													</a>
												</div>
												<div class="checkout__order-item__content">
													<a href="shop-detail.html" class="checkout__order-item__text">
														<p class="mb-0 font-weight-bold "><?php echo $item_data['name']; ?></p>
													</a> <span class="d-block checkout__order-item__price font-weight-bold"> $<?php echo $item_data['price']; ?></span>
													<span class="checkout__order-item__qty">Qty: <span class="checkout__order-item__num"><?php echo $item_data['quantity']; ?></span></span>
												</div>
											</div>
										<?php } ?>

									</div>
									<div class="checkout__order-bill mb-4">
										<table class="table border text-capitalize">
											<tr>
												<td>OrderPlace :</td>
												<td><?php echo $current_date = date('j F'); ?></td>
											</tr>
											<tr>
												<td>Total :</td>
												<td class="checkout__order-bill__price">$<?php echo $totalAmount + 20; ?></td>
											</tr>
											<tr>
												<td>Payment :</td>
												<td>COD</td>
											</tr>
											<tr>
												<td>Order No. :</td>
												<td>#11071</td>
											</tr>
										</table>
									</div>

									<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2">Place order</button>

									
									
<?php if (isset($item_data['id'])) {
							$item = $item_data['id'];
							
							$sql2 = "SELECT *
								FROM menu_items AS m
								INNER JOIN user AS u
								ON m.user_id = u.id
								WHERE m.id = $item";

							$rev = mysqli_query($conn, $sql2);
						
							if ($rev === false) {
								// Check for a query execution error
								echo "Query execution error: " . mysqli_error($conn);
							} elseif (mysqli_num_rows($rev) > 0) {
								$info = mysqli_fetch_assoc($rev);
							}
						} ?>

									<input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
									<input type="hidden" name="item_id" value="<?php echo $item_data['id']; ?>">
									<input type="hidden" name="item_qnt" value="<?php echo $item_data['quantity']; ?>">
									<input type="hidden" name="shop_id" value="<?php echo $info['id']; ?>">
									<input type="hidden" name="total" value="<?php echo $totalAmount + 20 ?>">
									</form>
								</div>
							<?php } else { ?>
								<div class="checkout__order-section my-lg-5">
									<h4 class="text-uppercase font-weight-bold">your order</h4>
									<div class="checkout__order-item-container mb-5">

										<div class="checkout__order-item py-4 d-flex">
											<div class="checkout__order-item__img-container">
												<a href="shop-detail.html">
													<img src="img/checkout/2-1(1).png" class="p-2 mr-3" alt="">
												</a>
											</div>
											<div class="checkout__order-item__content">
												<a href="shop-detail.html" class="checkout__order-item__text">
													<p class="mb-0 font-weight-bold ">Margria pizza</p>
												</a> <span class="d-block checkout__order-item__price font-weight-bold"> $20.00</span>
												<span class="checkout__order-item__qty">Qty: <span class="checkout__order-item__num">1</span></span>
											</div>
										</div>


									</div>
									<div class="checkout__order-bill mb-4">
										<table class="table border text-capitalize">
											<tr>
												<td>OrderPlace :</td>
												<td></td>
											</tr>
											<tr>
												<td>Total :</td>
												<td class="checkout__order-bill__price">$0.00</td>
											</tr>
											<tr>
												<td>Payment :</td>
												<td>COD</td>
											</tr>
											<tr>
												<td>Order No. :</td>
												<td>#</td>
											</tr>
										</table>
									</div>

									<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2">Place order</button>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>


		<?php require 'templates/footer.php'; ?>
	<?php } ?>