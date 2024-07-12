<?php require 'templates/header.php'; ?>
<?php if (!isset($_SESSION['isLoggedIn']) && (!isset($_SESSION['userRole']) && ($_SESSION['userRole'] != 'customer' || $_SESSION['userRole'] != 'seller'))) {

	header('Location: signin.php');
	exit;
} else { ?>

	<body>
		<div class="loader-container">
			<label class="label">Loading...</label>
		</div>

		<?php require 'templates/nav.php'; ?>
		
	
		<?php

if (!empty($_GET['notification'])) {
	$msg = $_GET['notification'];
?>

	<p class="alert alert-warning" style="position:absolute; top: 70px;z-index: 2000;width: 80%;margin: 0 10%;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><?php echo $msg; ?></p>

<?php } ?>


		<?php

		include_once 'db_connection.php';
		$userID = $_SESSION['userID'];

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$orderID = $_GET['id'];

			$sql = "SELECT * FROM customer_order WHERE order_id = $orderID";



			$orginal_orders = $conn->query($sql);

			$orginal_order = $orginal_orders->fetch_assoc();

			// var_dump($orginal_orders); exit;


			$orderid = $orginal_order['order_id'];
			$itemid = $orginal_order['item_id'];
			$unitprice = $orginal_order['unit_price'];
			$quantity = $orginal_order['quantity'];



			$sql = "INSERT INTO customer_order_details (order_id, item_id, unit_price, quantity) VALUES ('$orderid', '$itemid', '$unitprice', '$quantity')";
			$conn->query($sql);
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
												<th>No</th>
												<th>Name</th>
												<th>Product</th>
												<th>Product Name</th>
												<th>Quantity</th>
												<th>Sub Total</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<?php

										include_once 'db_connection.php';

										$sql = "SELECT 
          										o.id,
          										u.full_name,
          										m.item_name,
												m.item_image,
          										o.item_quantity,
          										u.user_address,
          										u.user_zip,
          										u.user_area,
          										o.payable_amount,
          										o.status
          										FROM
          										customer_order AS o
          										JOIN
          										user AS u ON o.user_id = u.id
          										JOIN
          										menu_items AS m ON o.item_id = m.id

          										WHERE
          										u.id = '$userID'

          										";

										$rev = mysqli_query($conn, $sql);
										if (!$rev) {
											die("Query failed: " . mysqli_error($conn));
										}
										$item_number = 1;

										while ($order = mysqli_fetch_assoc($rev)) {
											?>
							  
											<tr>
												<td>
													<div class=""><span><?php echo $item_number; ?></span>
													</div>
												</td>
												<td>
													<div class=""><span><?php echo $order['full_name']; ?></span>
													</div>
												</td>
												<td>
													<img src="./admin/uploads/<?php echo $order['item_image']; ?>" alt="">
												</td>
												<td>
													<div class=""><span><?php echo $order['item_name']; ?></span>
													</div>
												</td>
												<td>
													<div class="cart__qty text-center"><?php echo $order['item_quantity']; ?></div>
												</td>
												<td>
													<div class="cart__price text-center"><span>$<?php echo $order['payable_amount']; ?></span>
													</div>
												</td>
												<td>
													<div class=""><span><?php echo $order['status']; ?></span>
													</div>
												</td>
												<td class="text-center cart__action" style='display:flex; justify-content:space-between;'>
													<form action="show_my_orders.php?id=<?php echo $order['id']; ?>" method="POST">
														<button type="submit" onclick="return confirm('Are you sure you want to Re-Order it?')"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ReOrder!
														</button>
													</form>
												</td>
											</tr>
										<?php $item_number++;
										} ?>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row my-4">
						<div class="col-12 col-md-6">

						</div>

					</div>


				</div>
			</div>
		</section>


	<?php require 'templates/footer.php';
} ?>