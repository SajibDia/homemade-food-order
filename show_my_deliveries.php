<?php require 'templates/header.php'; ?>
<?php if(!isset($_SESSION['isLoggedIn']) && (!isset($_SESSION['userRole']) && $_SESSION['userRole'] != 'delivery_man')) {

header('Location: signin.php');
exit;

}else{ ?>
<body>
	<div class="loader-container">
		<label class="label">Loading...</label>
	</div>

	<?php require 'templates/nav.php'; ?>

	<?php 

	include_once 'db_connection.php';

	$deliveryManId = $_SESSION['userID']; 

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$orderID = $_GET['id'];

        if(isset($_POST['btnPickUp'])){

		$sql = "UPDATE customer_order SET status = 'picked' WHERE id = $orderID";


        $conn->query($sql);
        
        }else{
            $sql = "UPDATE customer_order SET status = 'delivered' WHERE id = $orderID";


            $conn->query($sql);
        }
		


	}

	?>

	<section id="banner" class="banner-bg cart-banner">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner-title text-center">
						<p class="banner-heading">My Deliveries</p>
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a href="index.php">Home</a>
							</li>
							<li class="breadcrumb-item active text-uppercase" aria-current="page">Deliveries</li>
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
                                            <th>Customer Name</th>
											<th>Address</th>
											<th>Zip Code</th>
											<th>Area</th>
											<th>Sub Total</th>
											<th>Action</th>
										</tr>
									</thead>
									<?php 

                                        include_once 'db_connection.php';

                                        $sql = "SELECT don.*, co.payable_amount, co.status, ca.*, u.full_name FROM delivery_order don JOIN customer_order co ON co.id = don.order_id JOIN user u ON u.id = co.user_id JOIN customer_address ca ON ca.user_id = co.user_id WHERE delivery_man_id = $deliveryManId";

                                        $orders = $conn->query($sql);

                                        $item_number = 1;

                                        foreach($orders as $order){



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
                                        <div class=""><span><?php echo $order['address']; ?></span>
											</div>
										</td>
										<td>
											<div class=""><span><?php echo $order['zip_code']; ?></span>
											</div>
										</td>
                                        <td>
                                            <div class="cart__qty text-center"><?php echo $order['area']; ?></div>
										</td>
										<td>
											<div class="cart__price text-center"><span>$<?php echo $order['payable_amount']; ?></span>
											</div>
										</td>
										<td class="text-center cart__action">
                                            <form action="show_my_deliveries.php?id=<?php echo $order['order_id']; ?>" method="POST">
                                                <?php if($order['status'] == 'pending'){ ?>
                                                <button type="submit" name="btnPickUp"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Pick Up!
                                                </button>
                                                <?php }elseif($order['status'] == 'picked'){ ?>
                                                    <button type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Deliver!
                                                </button>
                                               <?php }else{ ?>
                                                <div class="cart__price text-center"><span style="text-transform: capitalize;"><?php echo $order['status']; ?></span>
											    </div>
                                                <?php } ?>
                                            </form>
										</td>
									</tr>
									<?php $item_number++; } ?>
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


<?php require 'templates/footer.php'; }?>