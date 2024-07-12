<?php require 'templates/header.php'; ?>
<?php if(!isset($_SESSION['isLoggedIn'])) {

header('Location: signin.php');
exit;

}else{ ?>
<body>
	<div class="loader-container">
		<label class="label">Loading...</label>
	</div>

	<?php require 'templates/nav.php'; ?>

	<?php 

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$item_id = $_POST['id'];
		$item_name = $_POST['itemName'];
		$item_image = $_POST['image'];
		$item_price = $_POST['itemPrice'];
		$quantity = $_POST['quantity'];


		// create an array for the item data
		$item_data = array(
			"id" => $item_id,
			"name" => $item_name,
			"image" => $item_image,
			"price" => $item_price,
			"quantity" => $quantity
		);

		// check if the cart array already exists in the session
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}

		// check if the item already exists in the cart
		if(isset($_SESSION['cart'][$item_id])) {
			// if the item exists, add the new quantity to the existing quantity
			$_SESSION['cart'][$item_id]['quantity'] += $quantity;
		} else {
			// if the item doesn't exist, add it to the cart with the specified quantity and data
			$_SESSION['cart'][$item_id] = $item_data;
		}

		
		header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $item_id);

		



	}


	?>

	<section id="banner" class="banner-bg shop-detail-banner">
		<div class="container">
			<?php 

			if(isset($_GET['id'])){
				$id = $_GET['id'];

				include_once 'db_connection.php';

				$sql = "SELECT *
				FROM menu_items
				WHERE id = $id";

				$results = $conn->query($sql);
				$item = $results->fetch_assoc();
			}


			?>
			<div class="row">
				<div class="col-12">
					<div class="banner-title text-center">
						<p class="banner-heading"><?php echo $item['item_name']; ?></p>
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a href="index.php">Home</a>
							</li>
							<li class="breadcrumb-item"><a href="shop-categories.html">order online</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $item['item_name']; ?></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="item-detail container-fluid">
		<div class="row">
			<div class="container">
				<div class="row my-lg-5 py-5">
					<div class="col-12 col-md-5">
						<div class="item-detail__pizza-item mb-1 mb-md-0">
							<div class="item-detail__img-container text-center">
								<img src="./admin/uploads/<?php echo $item['item_image']; ?>" class="item-detail__main-img" alt="">
								<input type="hidden" name="image" value="<?php echo $item['item_image']; ?>">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-7">
					<?php
			                  
							  if(!empty($_GET['notification'])){
								$msg = $_GET['notification'];
								?>
							  
							<p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><?php echo $msg; ?></p>
							
							<?php } ?>
						<div class="item-detail__para text-center text-md-left mb-5">
                            <p class="item-detail__para__title mb-1 mb-md-3"><?php echo $item['item_name']; ?></p>
							<p class="item-detail__para__price mb-1 mb-md-3" id="itemPrice">$<?php echo $item['medium_price']; ?></p>
							<p class="item-detail__para__text mb-3"><?php echo $item['description']; ?></p>
							
							<p class="item-detail__para__heading mb-3">Choose your Plate</p>

							<div class="radio-box">
							  <input type="radio" id="classic" name="type" value="classic">
							  <label for="classic">Half Plate</label>
							</div>

							<div class="radio-box">
							  <input type="radio" id="thin" name="type" value="thin">
							  <label for="thin">Full Plate</label>
							</div>
							
							<p class="item-detail__para__heading mb-3">Choose Your Meal</p>
							<div class="radio-box">
							  <input type="radio" id="Medium" name="size" value="<?php echo $item['medium_price'] ?>">
							  <label for="Medium">Breakfast - $<?php echo $item['medium_price']; ?></label>
							</div>

							<div class="radio-box">
							  <input type="radio" id="Large" name="size" value="<?php echo $item['family_price'] ?>">
							  <label for="Large">Lunch - $<?php echo $item['family_price']; ?></label>
							</div>

							<div class="radio-box">
							  <input type="radio" id="xl" name="size" value="<?php echo $item['xl_price'] ?>">
							  <label for="xl">Dinner - $<?php echo $item['xl_price'] ?></label>
							</div>
                            <form action="item-detail.php?id=<?php echo $item['id'] ?>" method="POST">
							<div class="item-detail__para__addcart my-4">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="itemName" value="<?php echo $item['item_name'] ?>">
                                    <input type="hidden" name="image" value="<?php echo $item['item_image'] ?>">
                                    <input type="hidden" id="hiddenPrice" name="itemPrice" value="">
									<p class="d-inline mr-2">Qty:</p>
									<input type="number" name="quantity" class="item-detail__para__qty-box" value="1">
									<input type="submit" class="item-detail__para__addcart-submit px-3" value="Add to cart">

							</div>
                            </form>
							<div class="item-detail__para__control d-flex align-items-center justify-content-between flex-column flex-lg-row py-4">
								
								
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="item-detail__des-container">
							<div class="item-detail__des__control-btn">
								<button class="item-detail__des__btn review-btn p-3" onclick="opendes(event, 'des-review')">review</button>
							</div>
							
							<div id="des-review" class="item-detail__des__review item-detail__des__content">
								<div class="col-12">
									<?php 
									$sql ="SELECT COUNT(reviews) as total_review FROM reviews WHERE item_id = $id;"; 
									$results = $conn->query($sql);
									$info = $results->fetch_assoc();
									
									?>
									<h5 class="font-weight-bold text-uppercase pt-4"><span><?php echo $info['total_review'] ?></span> Reviews</h5>
								</div>
								<div class="item-detail__des__comment-section">
									<?php $sql= "SELECT r.*, u.full_name FROM reviews r JOIN user u ON r.user_id = u.id WHERE item_id = $id";

										$results = $conn->query($sql);

										foreach($results as $result){
									
									?>
									<div class="col-12">
										<div class="row item-detail__des__comment-container py-4">
											<div class="d-flex">
												<div class="">
													
												</div>
												<div class="d-md-flex align-items-center ml-2">
													<div class="item-detail__des__comment-para pr-3">
														<p class="item-detail__des__comment-name font-weight-bold text-capitalize mb-1"><?php echo $result['full_name']; ?>
														</p>
														<p class="item-detail__des__comment-text mb-0
                                    "><?php echo $result['reviews']; ?></p>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
									
								</div>
								<div class="item-detail__des__comment-post-section mt-5">
									<div class="col-12">
										<div class="item-detail__des__comment-post-box mt-4">
											<a style="color:#fff;" href="add_reviews.php?id=<?php echo $id; ?>">
												<div class="form-group d-flex justify-content-center justify-content-md-end">
													<button class="text-uppercase item-detail__des__comment-post__btn p-2 p-md-3"> 	Post Review</button>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>

		</div>
	</section>
	<section class="related-products container-fluid">
		<div class="row">
			<div class="container">
				<div class="row mb-lg-5 pb-5">
					<div class="col-12">
						<div class="text-center mb-md-4">
							<h3 class="text-capitalize text-lightwarning mb-0 heading-sub">More Fresh Food</h3>
							<h1 class="font-weight-bold big-text mb-0 title-sub">related products</h1>
						</div>
					</div>
					<div class="col-12">
						<div class="pizza-caro mt-5">
							<div class="row">
								<?php 

								if(isset($_GET['id'])){
									$id = $_GET['id'];

									include_once 'db_connection.php';

									$sql = "SELECT * FROM menu_items WHERE id != $id";

									$results = $conn->query($sql);
									
								}

								foreach($results as $item){

								?>
								<div class="col-12 col-md-4 col-lg-3">
									<div class="related-products__card text-center">
										<a href="item-detail.php?id=<?php echo $item['id']; ?>">
											<img src="./admin/uploads/<?php echo $item['item_image']; ?>" class="related-products__pizza-img mb-3 mb-md-4" alt="">
										</a>
										<div class="related-products__para">
											<a href="item-detail.php?id=<?php echo $item['id']; ?>" class="related-products__para__title">
												<p class=" h5 text-uppercase mb-md-3"><?php echo $item['item_name']; ?></p>
											</a>
											<p class="related-products__para__text mb-2 mx-auto">
												<?php
				                                  $words = explode(" ", $item['description']);
				                                  $limitedWords = implode(" ", array_slice($words, 0, 10)); 
				                                  echo $limitedWords; 
				                                  ?>
                                    
                                </p>

											</p>
											<p class="related-products__para__price">$ <?php echo $item['medium_price']; ?></p>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	

<?php require 'templates/footer.php'; }?>