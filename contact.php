
<?php require 'templates/header.php'; ?>
<body>
	<div class="loader-container">
		<label class="label">Loading...</label>
	</div>
	<?php require 'templates/nav.php'; 
	include_once 'db_connection.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$email = $_POST['emailAddress'];
		$subject = $_POST['email_subject'];
		$phone = $_POST['phone_num'];
		$message = $_POST['message'];

	  if($email == ''){
		  header('location:contact.php?notification=Please type  Valid Email');exit;
	  }

	  if($subject == ''){
		header('location:contact.php?notification=Please type  Your Subject');exit;
	}

	if($phone == ''){
		header('location:contact.php?notification=Please type  Phone');exit;
	}elseif(!is_numeric($phone)){
		header('location:contact.php?notification=Phone Number Cannot contain Alphabet&id');exit;
	}elseif(strlen($phone) != 11){
		header('location:contact.php?notification=Phone Number Cannot be less or more than 11 Digit&id');exit;
	}

	if($message == ''){
		header('location:contact.php?notification=Please type  Your Message');exit;
	}
  
	$sql = "INSERT INTO contact (email, subject, phone, message) VALUES ('$email', '$subject', '$phone', '$message')";

	
	if ($conn->query($sql) === TRUE) {
	 header('location:contact.php?notification=We Will Back To You Soon!');
	} else {
	 header('location:contact.php?notification=Try Again');
	}
	
	}
	
	?>
	
	<section id="banner" class="banner-bg contact-banner">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner-title text-center">
						<p class="banner-heading">contact us</p>
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a href="index.html">Home</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">contact us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
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
								<li class="d-flex align-items-center justify-content-center justify-content-md-start"><i class="fas fa-home mr-3"></i><a href="#">55 Drumburgh Ave, Carlisle CA3 0PD, UK</a>
								</li>
								<li class="d-flex align-items-center justify-content-center justify-content-md-start"><i class="fas fa-phone mr-3"></i><a href="#">+91 23 456 7890,+91 0123 456 789</a>
								</li>
								<li class="d-flex align-items-center justify-content-center justify-content-md-start"><i class="far fa-envelope mr-3"></i><a href="#">support@pizzon.com</a>
								</li>
								<li class="d-flex align-items-center justify-content-center justify-content-md-start mt-1"><i class="far fa-clock mr-3"></i><a href="#">Monday - friday:10am - 10pm
                                <br> Sunday:11am - 9pm
                                </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-7">
						<div class="contact__form mb-lg-5 mt-1 mt-lg-0">
							<form action="contact.php" method="POST">
							<?php
                  
							if(!empty($_GET['notification'])){
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
									<textarea name="message" class="form-control p-2 p-md-4 mb-2" cols="10" rows="8" placeholder="Message"></textarea>
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