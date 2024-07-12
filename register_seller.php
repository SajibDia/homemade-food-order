<?php require 'templates/header.php'; ?>

<body>
    <div class="loader-container">
        <label class="label">Loading...</label>
    </div>
    <?php require 'templates/nav.php'; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {

            $userID = $_GET['id'];
            include_once 'db_connection.php';
            $sql = "SELECT * FROM user WHERE id = $userID";
            $results = $conn->query($sql);
            $user = $results->fetch_assoc();
        }
    }
    ?>


 <!-- Form Action -->
<?php 
  //Form Submition 

   include_once 'db_connection.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if(!empty($_POST['id'])){

      $customer_id = $_POST['id'];

      // Get form data
        $Name = $_POST['fname'];
        $email = $_POST['email'];
        $pnumber = $_POST['pnumber'];
        $password = $_POST['password'];
        $userRole = $_POST['user_role'];
        $userAddress = $_POST['uaddress'];
        $userZip = $_POST['uzip'];
        $userArea = $_POST['uarea'];
        $shopName = $_POST['shop_name'];
        $nidNumber = $_POST['nid_num'];


        

        $sql = "SELECT email from USER WHERE email = $email AND id != $customer_id";


        $result = $conn->query($sql);



        if($result->num_rows>0){
          header('location:register_seller.php?notification=This Email already has a Account&id=' .$customer_id);exit;
        }
      
        if($fullName == ''){
          header('location:register_seller.php?notification=Please type  Your Full Name&id=' .$customer_id);exit;
        }
        
        if($email == ''){
          header('location:register_seller.php?notification=Please type  Your Email&id=' .$customer_id);exit;
        }

        if($pnumber == ''){
          header('location:register_seller.php?notification=Please type  Your Phone Number&id=' .$customer_id);exit;
        }elseif(!is_numeric($pnumber)){
          header('location:register_seller.php?notification=Phone Number Cannot contain Alphabet&id=' .$customer_id);exit;
        }elseif(strlen($pnumber) != 11){
          header('location:register_seller.php?notification=Phone Number Cannot be less or more than 11 Digit&id=' .$customer_id);exit;
        }

        if($password == ''){
          header('location:register_seller.php?notification=Please type  Secure Password&id=' .$customer_id);exit;
        }elseif(strlen($password) < 8){
          header('location:register_seller.php?notification=Password Should Be at least 8 Digit&id=' .$customer_id);exit;
        }


        
        $sql = "UPDATE user
        SET full_name = '$fullName',
            email = '$email',
            phone_number = '$pnumber',
            password = '$password',
            user_role = '$userRole',
            user_address = '$userAddress',
            user_zip = '$userZip',
            user_area = '$userArea',
            shop_name = '$shopName',
            nid_number = '$nidNumber'
            WHERE id = $customer_id";

            

        
        if($conn->query($sql) === TRUE) {
         header('location:show_my_info.php?notification=User Info Updated successfully');
        } else {
         header('location:show_my_info.php?notification=Failed to Update Info');
        }


        
    } else {
      // Get form data
        $fullName = $_POST['fname'];
        $email = $_POST['email'];
        $pnumber = $_POST['pnumber'];
        $password = $_POST['password'];
        $userRole = $_POST['user_role'];
        $userAddress = $_POST['uaddress'];
        $userZip = $_POST['uzip'];
        $userArea = $_POST['uarea'];
        $shopName = $_POST['shop_name'];
        $nidNumber = $_POST['nid_num'];

        $sql = "SELECT email FROM user WHERE email = '$email'";

        
        $result = $conn->query($sql);
       
        if($result->num_rows>0){
          header('location:register_seller.php?notification=This Email already has a Account');exit;
        }
      
        if($fullName == ''){
          header('location:register_seller.php?notification=Please type  Your Full Name');exit;
        }
      
        if($email == ''){
          header('location:register_seller.php?notification=Please type  Your Email');exit;
        }

        if($pnumber == ''){
          header('location:register_seller.php?notification=Please type  Your Phone Number');exit;
        }elseif(!is_numeric($pnumber)){
          header('location:register_seller.php?notification=Phone Number Cannot contain Alphabet');exit;
        }elseif(strlen($pnumber) != 11){
          header('location:register_seller.php?notification=Phone Number Cannot be less or more than 11 Digit');exit;
        }

        if($password == ''){
          header('location:register_seller.php?notification=Please type  Secure Password');exit;
        }elseif(strlen($password) < 8){
          header('location:register_seller.php?notification=Password Should Be at least 8 Digit');exit;
        }


        $sql = "INSERT INTO user (full_name, email, phone_number, password, user_role, user_address, user_zip, user_area, shop_name, nid_number) VALUES ('$fullName', '$email', '$pnumber', '$password', '$userRole', '$userAddress', '$userZip', '$userArea', '$shopName', '$nidNumber')";

        
        if ($conn->query($sql) === TRUE) {
         header('location:signin.php?notification=You have registered successfully');
        } else {
         header('location:register_seller.php?notification=Register Failed');
        }
    }

 
}


?>








    <section id="banner" class="banner-bg cart-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-title text-center">
                        <p class="banner-heading">Join as a Seller</p>
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-uppercase" aria-current="page">Seller Registration</li>
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
                            <h4 class="text-uppercase font-weight-bold mb-4">Create Your Shop</h4>
                            <?php

                            if (!empty($_GET['notification'])) {
                                $msg = $_GET['notification'];
                            ?>

                                <p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $msg; ?></p>

                            <?php } ?>



                            <!-- Register Form -->
                            <form action="register_seller.php" method="POST">
							<div class="form">
								<div class="form-group mb-4">
									<label for="fname" class="text-capitalize">Full name</label>
									<input type="text" class="form-control" id="fname" name="fname" value="<?php echo (!empty($user)) ? $user['full_name'] : ''; ?>">
								</div>
                                <div class="form-group mb-4">
									<label for="shop_name" class="text-capitalize">Shop Name</label>
									<input type="text" class="form-control" id="shop_name" name="shop_name" value="<?php echo (!empty($user)) ? $user['shop_name'] : ''; ?>">
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
									<label for="nid_num" class="text-capitalize">NID Number</label>
									<input type="text" value="<?php echo (!empty($user)) ? $user['nid_number'] : ''; ?>" class="form-control" id="nid_num" name="nid_num">
								</div>

									<div class="form-group mb-4">
										<label for="address" class="text-capitalize">Address</label>
										<input type="text" class="form-control" id="uaddress" name="uaddress" value="<?php echo (!empty($user)) ? $user['user_address'] : ''; ?>" >
									</div>
									<div class="row">
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="addresszip" class="text-capitalize">Pastcode/Zip</label>
												<input type="text" class="form-control" id="uzip" name="uzip" value="<?php echo (!empty($user)) ? $user['user_zip'] : ''; ?>" >
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="addressname" class="text-capitalize">Area</label>
												<input type="text" class="form-control" id="uarea" name="uarea" value="<?php echo (!empty($user)) ? $user['user_area'] : ''; ?>" >
											</div>
										</div>
									</div>

								<div class="form-group mb-4">
									<label for="password" class="text-capitalize">Password</label>
									<input type="password" value="<?php echo (!empty($user)) ? $user['password'] : ''; ?>" class="form-control" id="password" name="password">
									<input type="hidden" class="form-control" id="password" name="user_role" value='seller'>
									<input type="hidden" class="form-control" name="id" value="<?php echo (!empty($user)) ? $user['id'] : ''; ?>">
								</div>

								<div class="form-check mb-4" style="padding-left: 0;">
									<?php if (empty($user)) { ?>
										<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2" style="width: 100%;">Register</button>
										<small id="emailHelp" class="form-text text-muted">Already Registered? <a href="seller_signin.php">Log In</a></small>
									<?php } else { ?>
										<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2" style="width: 100%;">Update</button>
									<?php } ?>
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