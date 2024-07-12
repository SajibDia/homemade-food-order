
<?php require 'templates/header.php'; ?>
<body>
	<div class="loader-container">
		<label class="label">Loading...</label>
	</div>
	<?php require 'templates/nav.php'; ?>


	<?php
			                  
	if(!empty($_GET['notification'])){
		$msg = $_GET['notification'];
		?>
	
	<p class="alert alert-warning" style="position:absolute; top: 70px;z-index: 2000;width: 80%;margin: 0 10%;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><?php echo $msg; ?></p>
	
	<?php } ?>
	
	<section id="home" class="home container-fluid"> <span class="home__left d-none d-md-block"><i class="fas fa-chevron-left"></i></span>
		<span class="home__right d-none d-md-block"><i class="fas fa-chevron-right"></i></span>
		<div class="owl-carousel" id="home-showcase">
			<div class="row home__showcase-1 align-items-center align-items-start">
				<div class="col-12 col-md-6">
					<div class="justify-content-start home__showcase-1__text">
						<h2 class="text-uppercase home-big-text text-white bigger-text mb-0">Quality Pizza</h2>
						<p class="text-uppercase home-caption-quote mb-0">Healthy food for healthy body</p>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="justify-content-end home__showcase-1__animate ">
						<div class="home__center-container">
							<div class="home__showcase-1__img-container">
								<img src="img/home/pizza-banner-1.png" class="pizza-banner-1" alt="">
								<img src="img/home/pizza-1.png" class="pizza-1 pizza-first-position" alt="">
								<img src="img/home/pizza-2.png" class="pizza-2 pizza-first-position" alt="">
								<img src="img/home/pizza-3.png" class="pizza-3 pizza-first-position" alt="">
								<img src="img/home/pizza-4.png" class="pizza-4 pizza-first-position" alt="">
								<img src="img/home/pizza-5.png" class="pizza-5 pizza-first-position" alt="">
								<img src="img/home/pizza-6.png" class="pizza-6 pizza-first-position" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row home__showcase-2 flex-row-reverse align-items-center w-100">
				<div class="col-12 col-md-6">
					<div class="justify-content-start home__showcase-2__text">
						<h2 class="text-uppercase home-big-text text-white bigger-text mb-0">Aruchini Pizza</h2>
						<p class="text-uppercase home-caption-quote mb-0">Pizza is not a 'trend' it's a way of life</p>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="justify-content-end home__showcase-2__animate">
						<div class="home__center-container">
							<div class="home__showcase-2__img-container">
								<img src="img/banner-2/pizza-banner-2.png" class="pizza-banner-2" alt="">
								<img src="img/banner-2/pizza-7.png" class="pizza-7 pizza-first-position" alt="">
								<img src="img/banner-2/pizza-8.png" class="pizza-8 pizza-first-position" alt="">
								<img src="img/banner-2/pizza-9.png" class="pizza-9 pizza-first-position" alt="">
								<img src="img/banner-2/pizza-10.png" class="pizza-10 pizza-first-position" alt="">
								<img src="img/banner-2/pizza-11.png" class="pizza-11 pizza-first-position" alt="">
								<img src="img/banner-2/pizza-12.png" class="pizza-12 pizza-first-position" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row home__showcase-3 align-items-center w-100">
				<div class="col-12">
					<div class="text-center home__showcase-3__text">
						<h2 class="text-uppercase home-big-text text-white bigger-text d-block mb-0">Search Pizza</h2>
						<p class="text-uppercase home-caption-quote mb-0">Life is not about finding yourself. It's about finding pizza</p>
					</div>
				</div>
				<div class="col-12">
					<div class="home__showcase-3__animate">
						<div class="home__center-container">
							<div class="home__showcase-3__img-container">
								<img src="img/banner-3/banner-bg-1.png" class="pizza-banner-3" alt="">
								<img src="img/banner-3/banner-bg-2.png" class="pizza-bg-2 pizza-first-position" alt="">
								<img src="img/banner-3/banner-bg-3.png" class="pizza-bg-3 pizza-first-position" alt="">
								<img src="img/banner-3/banner-bg-4.png" class="pizza-bg-4 pizza-first-position" alt="">
								<img src="img/banner-3/banner-bg-5.png" class="pizza-bg-5 pizza-first-position" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="services container-fluid">
		<div class="row">
			<div class="services__top-img">
				<img src="img/order-top.png" class="w-100" alt="">
			</div>
			<div class="container py-5">
				<div class="row align-items-center text-center">
					<div class="col-12 col-md-4">
						<div class="services__card">
							<img src="img/order-1.svg" class="services__order-icon mb-2" alt="">
							<p class="text-uppercase services__caption mb-2">Order Your Pizza</p>
							<p class="services__para">Consult an online or paper menu for the pizza place you wish to order from to make your selections.
								 Or choose an item that is common or that you have ordered before, like a plain cheese pizza. </p>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="services__card">
							<img src="img/order-2.svg" class="services__order-icon mb-2" alt="">
							<p class="text-uppercase services__caption mb-2">Deliver at Your Door</p>
							<p class="services__para"> It offers contactless delivery for customers who 
								prefer it, meaning drivers will leave the food orders at the front door,
								 reception desk or other collection point. Pizza delivery drivers also process 
								 cash payments and return change when necessary. </p>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="services__card">
							<img src="img/order-3.svg" class="services__order-icon mb-2" alt="">
							<p class="text-uppercase services__caption mb-2">Delicious Receipe</p>
							<p class="services__para">Pizza toppings are also packed with a compound called glutamate,
								 which can be found in the tomatoes, cheese, pepperoni and sausage. When glutamate hits our tongues,
								  it tells our brains to get excited
								 and to crave more of it. This compound actually causes our mouths to water in anticipation of the next bite.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="services__bottom-img">
				<img src="img/order-bottom.png" class="w-100" alt="">
			</div>
		</div>
	</section>
	<section class="today-special container-fluid bg-white">
		<div class="row">
			<div class="container">
				<div class="my-5">
					<div class="row">
						<div class="col-12">
							<div class="text-center mb-4">
								<h3 class="text-capitalize text-lightwarning mb-0 heading-sub">Fresh from pizza</h3>
								<h1 class="font-weight-bold big-text mb-0 title-sub">Our speciality</h1>
							</div>
						</div>
					</div>
					<div class="row">
						<?php 
							include_once 'db_connection.php';

							$sql = "SELECT * FROM menu_items LIMIT 6";

							$items = $conn->query($sql);

							foreach($items as $item){ 
                        ?>
						<div class="col-12 col-md-4 d-flex flex-column align-items-center mb-4 mb-md-1">
							<a href="item-detail.php?id=<?php echo $item['id']; ?>" class="today-special__pizza-img">
								<img src="./admin/uploads/<?php echo $item['item_image']; ?>" alt="">
							</a> <a href="item-detail.php?id=<?php echo $item['id']; ?>" class="h4 text-uppercase font-weight-bold mt-lg-4 mt-md-3 mt-2  today-special__caption">
							<?php echo $item['item_name']; ?>
                            </a>
						</div>
						<?php } ?>
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
								<h3 class="text-capitalize text-lightwarning mb-0 heading-sub">Meet our experts</h3>
								<h1 class="font-weight-bold big-text text-white mb-0 title-sub">Our best chef</h1>
							</div>
						</div>
					</div>
					<div class="row mx-3 mx-md-0">
						<div class="col-12"> <span class="chef__left d-none d-md-inline-block"><i class="fas fa-chevron-left "></i></span>
							<span class="chef__right d-none d-md-inline-block"><i class="fas fa-chevron-right"></i></span>
							<div id="chef" class="owl-carousel">
								<div>
									<div class="card">
										<img src="img/about/cuisine_female.png" class="our-chef__chef-img" alt="...">
										<div class="card-body our-chef__chef-info text-center">
											<p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name">Kaniz Alam</p>
											<p class="card-text our-chef__chef-position">Master chef</p>
										</div>
									</div>
								</div>
								<div>
									<div class="card">
										<img src="img/about/male-chef.png" class="our-chef__chef-img" alt="...">
										<div class="card-body our-chef__chef-info text-center">
											<p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name">Ali Akber</p>
											<p class="card-text our-chef__chef-position">Speacial Peparoni Pizza chef</p>
										</div>
									</div>
								</div>
								<div>
									<div class="card">
										<img src="img/about/male_chef-cookpng.png" class="our-chef__chef-img" alt="...">
										<div class="card-body our-chef__chef-info text-center">
											<p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name">Tony Khan</p>
											<p class="card-text our-chef__chef-position">Multigrain Pizza chef</p>
										</div>
									</div>
								</div>
								<div>
									<div class="card">
										<img src="img/chef-2.jpg" class="our-chef__chef-img" alt="...">
										<div class="card-body our-chef__chef-info text-center">
											<p class="card-title h5 font-weight-bold text-uppercase mb-0 our-chef__chef-name">Azim Roy</p>
											<p class="card-text our-chef__chef-position">Hawaiian Pizza chef</p>
										</div>
									</div>
								</div>
							
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


	<section class="about-us container-fluid">
		<div class="row">
			<div class="container">
				<div class="row align-items-center my-5">
					<div class="col-12 col-md-6">
						<div class="about-us__content mb-5 my-md-0">
							<h3 class="mb-0 text-capitalize heading-sub">delicious restaurant</h3>
							<h1 class="font-weight-bold big-text mb-0 title-sub">About pizza</h1>
							<p class="about-us__description mb-0 mt-3">At Aruchini Pizza, we believe that delicious, 
								high-quality pizza should be accessible to everyone. 
								That's why we've dedicated ourselves to creating a menu that features only the freshest, 
								highest-quality ingredients available. From our hand-tossed crusts to our homemade tomato 
								sauce and fresh toppings, we take pride in every pizza we make.
Our team is made up of passionate pizza makers 
who bring years of experience to the kitchen. 
We're constantly experimenting with new recipes
and techniques to ensure that our customers always get the 
best pizza possible.</p>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="about-us__img-container">
							<img src="img/about-pizzon.png" class="about-us__img ml-lg-4" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php require 'templates/footer.php'; ?>