<?php require 'templates/header.php'; ?>
<body>
	<div class="loader-container">
		<label class="label">Loading...</label>
	</div>

	<?php require 'templates/nav.php'; 

	include_once 'db_connection.php';

  	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  		$email = $_POST['email'];
  		$password = $_POST['password'];

		if($email == ''){
			header('location:signin.php?notification=Please type  Valid Email');exit;
		}
	
		if($password == ''){
			header('location:signin.php?notification=Please type  Password');exit;
		}



  		$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

  		

  		$results = $conn->query($sql);

  		

  		if ($results->num_rows>0) {
  			
  			$data = $results->fetch_assoc();
  			$_SESSION['userID'] = $data['id'];
  			$_SESSION['userName'] = $data['full_name'];
  			$_SESSION['userRole'] = $data['user_role'];
  			$_SESSION['isLoggedIn'] = true;
			
  			header("location: menu.php?notification='Login Successful'");
  			}else{
  				header("location: signin.php?notification='Email or password is incorrect!'");
  			}
  	}


	?>

	<section id="banner" class="banner-bg cart-banner">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner-title text-center">
						<p class="banner-heading">Log In</p>
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a href="index.php">Home</a>
							</li>
							<li class="breadcrumb-item active text-uppercase" aria-current="page">Log In</li>
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
					<div class="col-lg-2">
					</div>
					<div class="col-12 col-lg-8">
						<div class="checkout__form my-5">
							<h4 class="text-uppercase font-weight-bold mb-4">Log In Form</h4>
							<?php
			                  
			                    if(!empty($_GET['notification'])){
			                      $msg = $_GET['notification'];
			                      ?>
			                    
			                  <p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><?php echo $msg; ?></p>
			                  
			                  <?php } ?>
							<form action="signin.php" method="POST">
								<div class="form">
									
									<div class="form-group mb-4">
										<label for="email" class="text-capitalize">Email</label>
										<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="name@example.com"> 
									</div>
									<div class="form-group mb-4">
										<label for="password" class="text-capitalize">Password</label>
										<input type="password" class="form-control" name="password" id="password">
									</div>
									
									<div class="form-check mb-4" style="padding-left: 0;">
										<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2" style="width: 50%;">Log In</button>
										<small id="emailHelp" class="form-text text-muted">Not Registered Yet? <a href="register.php">Register Now</a></small>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-2">
					</div>
					
				</div>
			</div>
		</div>
	</section>

<?php require 'templates/footer.php'; ?>