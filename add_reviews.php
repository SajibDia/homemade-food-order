<?php require 'templates/header.php'; ?>
<?php if(!isset($_SESSION['isLoggedIn']) && (!isset($_SESSION['userRole']) && $_SESSION['userRole'] != 'customer')) {

header('Location: signin.php');
exit;

}else{ ?>
<body>
	<div class="loader-container">
		<label class="label">Loading...</label>
	</div>

	<?php require 'templates/nav.php'; 

	include_once 'db_connection.php';

  	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  		$itemID = $_POST['item_id'];
  		$review = $_POST['review'];
		$userID = $_SESSION['userID'];

	
		if($review == ''){
			header('location:add_review.php?notification=Review Cannot Be Empty');exit;
		}



  		$sql = "INSERT INTO reviews(item_id, user_id, reviews) VALUES ('$itemID', '$userID', '$review')";
 
  		

  		

        if ($conn->query($sql) === TRUE) {
        header('Location: item-detail.php?id=' . $itemID . '&notification=Thank You for Your Reviews!');

        } else {
            header('Location: item-detail.php?id=' . $itemID . '&notification=Try Again!');

        }

  		

  		
    }

    if(isset($_GET['id'])){
        $itemID = $_GET['id'];

        $sql = "SELECT * FROM menu_items WHERE id = $itemID";

        $results = $conn->query($sql);

        $itemInfo = $results->fetch_assoc();
    }

	?>

<section id="banner" class="banner-bg cart-banner">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner-title text-center">
						<p class="banner-heading">Add Reviews</p>
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a href="index.php">Home</a>
							</li>
							<li class="breadcrumb-item active text-uppercase" aria-current="page">Review</li>
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
							<h4 class="text-uppercase font-weight-bold mb-4">Add Your Reviews</h4>
							<?php
			                  
			                    if(!empty($_GET['notification'])){
			                      $msg = $_GET['notification'];
			                      ?>
			                    
			                  <p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><?php echo $msg; ?></p>
			                  
			                  <?php } ?>
							<form action="add_reviews.php" method="POST">
								<div class="form">
									
									<div class="form-group mb-4">
										<label for="email" class="text-capitalize">Item Name</label>
										<input type="text" class="form-control" name="item_name" value="<?php echo $itemInfo['item_name']; ?>"> 
										<input type="hidden" class="form-control" name="item_id" value="<?php echo $itemInfo['id']; ?>"> 
									</div>
									<div class="form-group mb-4">
										<label for="review" class="text-capitalize">Write Reviews</label>
										<textarea name="review" class="form-control p-2 p-md-4 mb-2" cols="10" rows="8" placeholder="Leave your valuable review"></textarea>
									</div>
									
									<div class="form-check mb-4" style="padding-left: 0;">
										<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2" style="width: 50%;">Post Now</button>
										
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


<?php require 'templates/footer.php'; }?>