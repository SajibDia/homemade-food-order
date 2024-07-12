<header class="container-fluid food-nav header">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-12 px-0">
						<nav class="navbar navbar-expand-lg navbar-dark">
							<a class="navbar-brand" href="index.php">
								<img src="img/logo.png" class="nav-logo pizza-logo" alt="">
							</a>
							<div class="extend-nav d-flex justify-content-end my-1">
								<ul class="list-unstyled d-flex justify-content-end align-items-center mb-0">
					
									<!-- nav shop icon -->
									<li id="cartDropdownSm" class="nav-item d-block d-sm-flex d-lg-none mr-md-3 mt-sm-0 align-items-center">
										<a class="nav-link">
											<div class="d-flex align-items-center"> <i class="fas header__shopping-icon-sm fa-shopping-bag fa-lg mr-2"></i>
												<p class="mb-0 d-none d-sm-block"><span>0</span> items - $ <span>0.00</span>
												</p>
											</div>
										</a>
									</li>
									<li class="nav-item d-block d-lg-none mr-md-3"> <a href="menu.php" class="btn btn-success p-2 text-uppercase order-btn nav-link">Order online</a>
									</li>
								</ul>
								<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa fa-bars nav-menu-icon" aria-hidden="true"></i>
								</button>
							</div>
							<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
								<ul class="navbar-nav justify-content-end">
									<li class="nav-item active"> <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
									</li>
									<?php if(isset($_SESSION['isLoggedIn'])) { ?>
									<li class="nav-item"> <a class="nav-link" href="menu.php">Menu</a>
									</li>
									
									<li class="nav-item"> <a class="nav-link" href="store.php">Store</a>
									</li>

									
									
									<li class="nav-item list_dropdown"> <a class="nav-link" href="#"><?php echo $_SESSION['userName']; ?></a>
										<ul class="navbar-dropdown">
											<li class="nav-item"> <a class="nav-link" href="show_my_info.php">Account</a>
											</li>
											<li class="nav-item"> <a class="nav-link" href="signout.php">Sign Out</a>
											</li>
										</ul>
									</li>

									<?php }else{ ?>
									<li class="nav-item"> <a class="nav-link" href="register.php">Sign Up</a>
									</li>
									<li class="nav-item"> <a class="nav-link" href="signin.php">Sign In</a>
									</li>
								<?php } ?>
									<?php if(isset($_SESSION['isLoggedIn']) && (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'customer' || $_SESSION['userRole'] == 'seller')) { ?>
									<li class="nav-item"> <a class="nav-link" href="show_my_orders.php">My Orders</a>
									</li>
									<?php } ?>
									<?php if(isset($_SESSION['isLoggedIn']) && (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'delivery_man')) { ?>
									<li class="nav-item"> <a class="nav-link" href="show_my_deliveries.php">My Deliveries</a>
									</li>
									<?php } ?>
									<?php if(isset($_SESSION['isLoggedIn']) && (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'seller')) { ?>
									<li class="nav-item"> <a class="nav-link" href="admin/index.php">Dashboard</a>
									</li>
									<?php } ?>
									
									<!-- this part is work with app.js -->
									<li id="header__cart-dropdown" class="header__cart-dropdown d-none d-lg-block nav-item">
										<a class="nav-link" id="cartButton">
											<div class="d-flex align-items-center"> <i class="fas fa-shopping-bag fa-lg text-lightwarning mr-2 color-switch"></i>
												<?php if (isset($_SESSION['cart']) && isset($_SESSION['isLoggedIn'])) {

														$cart_items = $_SESSION['cart'];

														$num_items = count($cart_items);

														$totalAmount = 0;


														foreach($_SESSION['cart'] as $cartItem){
															$cartItemPrice = $cartItem['price'] * $cartItem['quantity'];
															$totalAmount = $totalAmount + $cartItemPrice;

														}
													

												 ?>
                                                <p class="mb-0"><span> <?php echo $num_items; ?></span> items - $ <span><?php echo $totalAmount;
													 ?></span>
												</p>
                                                <?php } else { ?>
                                                	<p class="mb-0 d-none d-sm-block"><span>0</span> items - $ <span>0.00</span>
												</p>
											<?php } ?>
											</div>
										</a>
										<?php if ((isset($_SESSION['cart'])) && !empty($_SESSION['cart'])) { 	?>
										<div class="cart_div" id="cartBox">
											<div class="col-12">
												<div class="header__cart-item-container">
													
													<?php foreach ($_SESSION['cart'] as $item_id => $item_data) {
													?>
													<div class="header__cart-item">
														<img src="./admin/uploads/<?php echo $item_data['image']; ?>" class="header__cart-item__img" alt="">
														<div class="header__cart-item__para">
															<p class="header__cart-item__title"><?php echo $item_data['name']; ?></p>
															<p class="header__cart-item__price"><?php echo $item_data['price']; ?></p>
															<div class="header__cart-item__qty">
																<label for="qtysm" class="header__cart-item__qty-label">Qty:</label>
																<input id="qtysm" type="number" class="header__cart-item__qty-box" value="<?php echo $item_data['quantity']; ?>">
															</div>
														</div>
														<form action="item-cart.php?id=<?php echo $item_data['id']; ?>&return_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" method="POST">
															<button type="submit" class="header__cart-item__cross-btn d-flex align-items-center" onclick="return confirm('Are you sure you want to Delete it?')"><i class="fa fa-times fa-sm" aria-hidden="true"></i>
															</button>
														</form>
														<!-- <a class="header__cart-item__cross-btn d-flex align-items-center" href="#"> <i class="fa fa-times fa-sm" aria-hidden="true"></i>
														</a> -->
													</div>

												<?php } ?>
												</div>
											</div>
											<div class="col-12">
												<div class="header__cart-total d-flex justify-content-between align-items-center">
													<p class="header__cart-total__title mb-0">cart subtotal</p>
													<p class="header__cart-total__price mb-0">$<?php echo $totalAmount; ?></p>
												</div>
											</div>
											<div class="col-12">
												<div class="header__cart-total-btn d-flex justify-content-between align-items-center"> <a href="item-cart.php" class="header__cart-total-btn__btn">cart</a>
													<a href="checkout.php" class="header__cart-total-btn__btn">checkout</a>
												</div>
											</div>
										</div>

										<?php  } else { ?>
										        
										<div class="cart_div" id="cartBox">
											<div class="col-12">
												<p style="margin: 10px;">No Item Added Yet!</p>
											</div>
										</div>

										<?php } ?>
									</li>
									<li class="nav-item d-none d-lg-block"> <a href="menu.php" class="btn btn-success text-uppercase order-btn nav-link">Order online</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="header__cart-dropdown-content-sm animate__animated animate__fadeIn">
		<div class="row">
			<div class="col-12">
				<div class="header__cart-item-container">
					<?php foreach ($_SESSION['cart'] as $item_id => $item_data) {
													?>
						<div class="header__cart-item">
							<img src="./admin/uploads/<?php echo $item_data['image']; ?>" class="header__cart-item__img" alt="">
							<div class="header__cart-item__para">
								<p class="header__cart-item__title"><?php echo $item_data['name']; ?></p>
								<p class="header__cart-item__price"><?php echo $item_data['price']; ?></p>
								<div class="header__cart-item__qty">
									<label for="qtysm" class="header__cart-item__qty-label">Qty:</label>
									<input id="qtysm" type="number" class="header__cart-item__qty-box" value="<?php echo $item_data['quantity']; ?>">
								</div>
							</div>
							<form action="item-cart.php?id=<?php echo $item_data['id']; ?>&return_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" method="POST">
								<button type="submit" class="header__cart-item__cross-btn d-flex align-items-center" onclick="return confirm('Are you sure you want to Delete it?')"><i class="fa fa-times fa-sm" aria-hidden="true"></i>
								</button>
							</form>
							<!-- <a class="header__cart-item__cross-btn d-flex align-items-center" href="#"> <i class="fa fa-times fa-sm" aria-hidden="true"></i>
							</a> -->
						</div>

					<?php } ?>
					
				</div>
			</div>
			<div class="col-12">
				<div class="header__cart-total d-flex justify-content-between align-items-center">
					<p class="header__cart-total__title mb-0">cart subtotal</p>
					<p class="header__cart-total__price mb-0">$<?php echo $totalAmount; ?></p>
				</div>
			</div>
			<div class="col-12">
				<div class="header__cart-total-btn d-flex justify-content-between align-items-center"> <a href="item-cart.php" class="header__cart-total-btn__btn">cart</a>
					<a href="checkout.php" class="header__cart-total-btn__btn">checkout</a>
				</div>
			</div>
		</div>
	</div>

