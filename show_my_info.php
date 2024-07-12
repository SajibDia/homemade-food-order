<?php require 'templates/header.php'; ?>
<?php if (!isset($_SESSION['isLoggedIn']) && (!isset($_SESSION['userRole']) && $_SESSION['userRole'] != '0')) {

	header('Location: signin.php');
	exit;
} else { ?>

	<body>
		<div class="loader-container">
			<label class="label">Loading...</label>
		</div>

		<?php require 'templates/nav.php'; ?>

		<?php
		include_once 'db_connection.php';
		$userID = $_SESSION['userID'];
		?>

		<section id="banner" class="banner-bg cart-banner">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="banner-title text-center">
							<p class="banner-heading">My Info</p>
							<ol class="breadcrumb justify-content-center">
								<li class="breadcrumb-item"><a href="index.php">Home</a>
								</li>
								<li class="breadcrumb-item active text-uppercase" aria-current="page">My Information</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php

		include_once 'db_connection.php';

		$sql = "SELECT * FROM user WHERE id = $userID";

		$users = $conn->query($sql);

		if($users->num_rows>0){
			$info = $users->fetch_assoc();
			
		}

		$item_number = 1;

		foreach ($users as $user) {
			



		?>

			<section class="bg-light section-profile-info">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 mb-4 mb-sm-5">
							<div class="card card-style1 border-0">
								<div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
									<div class="row align-items-center">
										<div class="col-lg-6 mb-4 mb-lg-0">
											<img src="<?php echo $user['profile_image']; ?>" alt="..." height="350px" width="350px">
										</div>
										<div class="col-lg-6 px-xl-10">
											<div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 w-100 rounded">
												<h3 class="h2 text-white mb-0"><?php echo $user['full_name']; ?></h3>
												<span class="text-primary"><?php echo $user['user_role']; ?></span>
											</div>
											<ul class="list-unstyled mb-1-9">
												<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Full Name:</span> <span><?php echo $user['full_name']; ?></li>
												<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> <span><?php echo $user['email']; ?> </li>
												<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Address:</span> <span><?php echo $user['user_address'] . ", " . $user['user_area'] . ", " . $user['user_zip']; ?></li>
												<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> <span><?php echo $user['phone_number']; ?> </li>
												<li><a class="text-uppercase checkout__order-bill__btn py-1 py-md-2 text-center rounded" data-toggle="modal" data-target="#myModal" href="register.php?id=<?php echo $user['id']; ?>">Edit</a></li>

											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php $item_number++;
		} ?>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Update Your Profile</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

					</div>
					<div class="modal-body">
						<form action="submit_register_form.php" method="POST" enctype="multipart/form-data">
							<div class="form">
								<div class="form-group mb-4">
									<label for="fname" class="text-capitalize">Full name</label>
									<input type="text" class="form-control" id="fname" name="fname" value="<?php echo (!empty($user)) ? $user['full_name'] : ''; ?>">
								</div>
								<div class="form-group mb-4">
									<label for="email" class="text-capitalize">email</label>
									<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo (!empty($user)) ? $user['email'] : ''; ?>" placeholder="name@example.com"> <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group mb-4">
									<label for="pnumber" class="text-capitalize">Phone number</label>
									<input type="text" value="<?php echo (!empty($user)) ? $user['phone_number'] : ''; ?>" class="form-control" id="pnumber" name="pnumber">
								</div>

								<div class="form-group mb-4">
									<label for="address" class="text-capitalize">Address</label>
									<input type="text" class="form-control" id="uaddress" name="uaddress" value="<?php echo (!empty($user)) ? $user['user_address'] : ''; ?>">
								</div>
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="addresszip" class="text-capitalize">Pastcode/Zip</label>
											<input type="text" class="form-control" id="uzip" name="uzip" value="<?php echo (!empty($user)) ? $user['user_zip'] : ''; ?>">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="addressname" class="text-capitalize">Area</label>
											<input type="text" class="form-control" id="uarea" name="uarea" value="<?php echo (!empty($user)) ? $user['user_area'] : ''; ?>">
										</div>
									</div>
								</div>

								<div class="form-group mb-4">
									<label for="password" class="text-capitalize">Password</label>
									<input type="password" value="<?php echo (!empty($user)) ? $user['password'] : ''; ?>" class="form-control" id="password" name="password">
									<input type="hidden" class="form-control" id="password" name="user_role" value='customer'>
									<input type="hidden" class="form-control" name="id" value="<?php echo (!empty($user)) ? $user['id'] : ''; ?>">
								</div>

								<div class="form-group mb-4">
									<label for="exampleInputFile" class="text-capitalize">Item Image</label>
									<input type="file" name="item_image" value="<?php echo (!empty($user)) ? $user['profile_image'] : ''; ?>" id="exampleInputFile">
									<p class="help-block">Upload JPG PNG Images.</p>
								</div>

								<div class="form-check mb-4" style="padding-left: 0;">
									<?php if (empty($user)) { ?>
										<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2" style="width: 50%;">Register</button>
										<small id="emailHelp" class="form-text text-muted">Already Registered? <a href="signin.php">Log In</a></small>
									<?php } else { ?>
										<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2" style="width: 50%;">Update</button>
									<?php } ?>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	<?php require 'templates/footer.php';
} ?>