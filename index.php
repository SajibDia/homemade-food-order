<?php require 'templates/header.php'; ?>

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

	<section id="home" class="home container-fluid">
		<div class="owl-carousel" id="home-showcase">
			<div class="row home__showcase-3 align-items-center w-100">
				<div class="col-12">
					<div class="text-center home__showcase-3__text">
						<h2 class="text-uppercase home-big-text text-white bigger-text d-block mb-0">Healty Food</h2>
						<p class="text-uppercase home-caption-quote mb-0">Eat Healty. Stay Wealthy</p>
					</div>
				</div>
				<div class="col-12">
					<div class="home__showcase-3__animate">
						<div class="home__center-container">
							<div class="home__showcase-3__img-container">
								<img src="img/banner-3/banner-bg-1.png" class="pizza-banner-3" alt="">
								<img src="img/banner-3/banner-bg-4.png" class="pizza-bg-4 pizza-first-position" alt="">
								<img src="img/banner-3/banner-bg-3.png" class="pizza-bg-3 pizza-first-position" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- SignUp Now -->
	<section class="services container-fluid">
		<div class="row">
			
			<div class="container py-5">
				<div class="row align-items-center text-center">
					
					<div class="col-12 col-md-8">
						<div class="services__card">
							<img src="img/food-making.png" class="our-chef__chef-img" alt="" height="350px" width="500px">
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="services__card">
							<p class="text-uppercase services__caption mb-2">Sign Up To SEE PRODUCTS</p>
							<p class="services__para"> Get home made foods to your door. Sign Up Now </p>
                            <a class="text-uppercase booking__book-btn py-1 py-md-2 text-center rounded" href="register.php">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>


	<!-- Our Speciality -->
	<section class="today-special container-fluid bg-white">
		<div class="row">
			<div class="container">
				<div class="my-5">
					<div class="row">
						<div class="col-12">
							<div class="text-center mb-4">
								<h3 class="text-capitalize text-lightwarning mb-0 heading-sub">Food You Love</h3>
								<h1 class="font-weight-bold big-text mb-0 title-sub">Our speciality</h1>
							</div>
						</div>
					</div>
					<div class="row">
						<?php
						include_once 'db_connection.php';
						$sql = "SELECT * FROM menu_items LIMIT 6";
						$items = $conn->query($sql);
						foreach ($items as $item) {
						?>
						<?php if( isset($_SESSION['isLoggedIn']) ) { ?>
							<div class="col-12 col-md-4 d-flex flex-column align-items-center mb-4 mb-md-1">	
							<a href="item-detail.php?id=<?php echo $item['id']; ?>" class="today-special__pizza-img">
									<img src="./admin/uploads/<?php echo $item['item_image']; ?>" alt="">
								</a> <a href="item-detail.php?id=<?php echo $item['id']; ?>" class="h4 text-uppercase font-weight-bold mt-lg-4 mt-md-3 mt-2  today-special__caption">
									<?php echo $item['item_name']; ?>
								</a>
							</div>
						<?php } else{ ?>
							<div class="col-12 col-md-4 d-flex flex-column align-items-center mb-4 mb-md-1">	
							<a href="signin.php" class="today-special__pizza-img">
									<img src="./admin/uploads/<?php echo $item['item_image']; ?>" alt="">
								</a> <a href="signin.php" class="h4 text-uppercase font-weight-bold mt-lg-4 mt-md-3 mt-2  today-special__caption">
									<?php echo $item['item_name']; ?>
								</a>
							</div>
						<?php }} ?>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="d-flex justify-content-center text-uppercase mt-lg-4 mt-md-3 my-3 my-md-0"> <a href="menu.php" class="btn viewmore-btn">View More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="our-chef container-fluid">
		<div class="row">
			<div class="chef-top">
				<img src="img/chef-top-bg.png" class="w-100" alt="">
			</div>
			<div class="container">
				<div class="my-5">
					<div class="row">
						<div class="col-12">
							<div class="text-center mb-4">
								<h3 class="text-capitalize text-lightwarning mb-0 heading-sub">Our best Sellers</h3>
								<h1 class="font-weight-bold big-text text-white mb-0 title-sub">Top Sellers</h1>
							</div>
						</div>
					</div>
					<div class="row mx-3 mx-md-0">
						<div class="col-12"> <span class="chef__left d-none d-md-inline-block"><i class="fas fa-chevron-left "></i></span>
							<span class="chef__right d-none d-md-inline-block"><i class="fas fa-chevron-right"></i></span>
							<div id="chef" class="owl-carousel">

							<?php
						include_once 'db_connection.php';
						$sql = "SELECT * FROM user WHERE user_role = 'seller' LIMIT 4";
						$items = $conn->query($sql);
						foreach ($items as $item) {
						?>
								<div>
									<div class="card">
										<img src="<?php echo $item['profile_image']; ?>" class="our-chef__chef-img" alt="..." height="250px" width="550px">
										<div class="card-body our-chef__chef-info text-center">
											<p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name"><?php echo $item['full_name']; ?></p>
											<p class="card-text our-chef__chef-position"><?php echo $item['shop_name']; ?></p>
										</div>
									</div>
								</div>

							<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="chef-bottom">
				<img src="img/chef-bottom-bg.png" class="w-100" alt="">
			</div>
		</div>
	</section>


	<!-- About Us -->
	<section id="about-home-food" class="about-us container-fluid">
		<div class="row">
			<div class="container">
				<div class="row align-items-center my-5">
					<div class="col-12 col-md-6">
						<div class="about-us__content mb-5 my-md-0">
							<h3 class="mb-0 text-capitalize heading-sub">Delicioust Food Around You</h3>
							<h1 class="font-weight-bold big-text mb-0 title-sub">ABOUT HOMEFOOD</h1>
							<p class="about-us__description mb-0 mt-3">A meal prepared at home is way more hygienic than a restaurant meal. 
								Homemade food is prepared in clean surroundings with utmost care. We cannot be sure about the hygiene levels 
								in the restaurant kitchens. Eating more homemade food can reduce your risk of contracting foodborne illnesses.</p>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="about-us__img-container">
							<img src="img/about-us-image.png" class="about-us__img ml-lg-4" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Join as Seller -->
	<section class="services container-fluid">
		<div class="row">

			<div class="container py-5">
				<div class="row align-items-center text-center">
					<div class="col-12 col-md-4">
						<div class="services__card">
							<img src="img/seller/image-seller2.jpg" class="our-chef__chef-img" alt="">
						</div>
					</div>
					<div class="col-12 col-md-8">
						<div class="services__card">
							<p class="text-uppercase services__caption mb-2">Join as a Seller</p>
							<p class="services__para"> It's Your Turn. Make money selling your hand made food. We always encourage you to start
								make your first move. One Platform, One Opportunity. </p>
							<a class="text-uppercase booking__book-btn py-1 py-md-2 text-center rounded" href="register_seller.php">Register Now</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>



	<!-- contact us  -->
	<?php
	include_once 'db_connection.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$email = $_POST['emailAddress'];
		$subject = $_POST['email_subject'];
		$phone = $_POST['phone_num'];
		$message = $_POST['message'];

		if ($email == '') {
			header('location:contact.php?notification=Please type  Valid Email');
			exit;
		}

		if ($subject == '') {
			header('location:contact.php?notification=Please type  Your Subject');
			exit;
		}

		if ($phone == '') {
			header('location:contact.php?notification=Please type  Phone');
			exit;
		} elseif (!is_numeric($phone)) {
			header('location:contact.php?notification=Phone Number Cannot contain Alphabet&id');
			exit;
		} elseif (strlen($phone) != 11) {
			header('location:contact.php?notification=Phone Number Cannot be less or more than 11 Digit&id');
			exit;
		}

		if ($message == '') {
			header('location:contact.php?notification=Please type  Your Message');
			exit;
		}

		$sql = "INSERT INTO contact (email, subject, phone, message) VALUES ('$email', '$subject', '$phone', '$message')";


		if ($conn->query($sql) === TRUE) {
			header('location:contact.php?notification=We Will Back To You Soon!');
		} else {
			header('location:contact.php?notification=Try Again');
		}
	}

	?>


	<section class="contact container-fluid">
		<div class="row">
			<div class="container">
				<div class="row mt-md-5 p-lg-5 pt-4">
					<div class="col-12">
						<div class="text-center mb-4">
							<h3 class="text-capitalize text-lightwarning mb-0 heading-sub">Get in touch</h3>
							<h1 class="font-weight-bold big-text mb-0 title-sub">contact us</h1>
						</div>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-12 col-md-5">
						<div class="contact__detail w-100 text-center text-md-left">
							<p class="font-weight-bold text-capitalize mb-3 contact__detail__title">contact details</p>
							<p class="contact__detail__para mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dignissimos voluptates sed officia, praesentium provident quia perferendis laudantium deleniti tempore. Perspiciatis repellat quidem aut deleniti quasi possimus, aliquam impedit natus.</p>
							<ul class="contact__detail__list">
								<li class="d-flex align-items-center justify-content-center justify-content-md-start"><i class="fas fa-home mr-3"></i><a href="#">20 Carrochan Rd, Balloch, Alexandria G83 8EG, 69QJ+2F Alexandria, UK</a>
								</li>
								<li class="d-flex align-items-center justify-content-center justify-content-md-start"><i class="fas fa-phone mr-3"></i><a href="#">+91 23 456 7890,+91 0123 456 789</a>
								</li>
								<li class="d-flex align-items-center justify-content-center justify-content-md-start"><i class="far fa-envelope mr-3"></i><a href="#">support@homefood.com</a>
								</li>
								<li class="d-flex align-items-center justify-content-center justify-content-md-start mt-1"><i class="far fa-clock mr-3"></i><a href="#">Always Open</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-7">
						<div class="contact__form mb-lg-5 mt-1 mt-lg-0">
							<form action="contact.php" method="POST">
								<?php

								if (!empty($_GET['notification'])) {
									$msg = $_GET['notification'];
								?>

									<p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><?php echo $msg; ?></p>

								<?php } ?>
								<div class="form-group">
									<input type="email" name="emailAddress" class="form-control p-2 p-md-4 mb-2" placeholder="Email">
								</div>
								<div class="form-group">
									<input type="text" name="email_subject" class="form-control p-2 p-md-4 mb-2" placeholder="Subject">
								</div>
								<div class="form-group">
									<input type="text" name="phone_num" class="form-control p-2 p-md-4 mb-2" placeholder="Phone">
								</div>
								<div class="form-group">
									<textarea name="message" class="form-control p-2 p-md-4 mb-2" cols="10" rows="6" placeholder="Message"></textarea>
								</div>
								<button type="submit" class="contact__form__btn py-3 py-lg-3 text-uppercase font-weight-bold">Send message</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="contact-map container-fluid d-none d-md-block">
		<div class="row">
			<div style="width: 100vw">
				<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="http://www.gps.ie/">sport gps</a>
				</iframe>
			</div>
		</div>
	</section>
	<section class="contact-map container-fluid d-md-none">
		<div class="row">
			<div style="width: 100vw">
				<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(Pizzon)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="http://www.gps.ie/">vehicle gps</a>
				</iframe>
			</div>
		</div>
	</section>

	<?php require 'templates/footer.php'; ?>