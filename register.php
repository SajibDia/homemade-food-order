<?php require 'templates/header.php'; ?>
<?php if (isset($_SESSION['isLoggedIn'])) {

header('Location: show_my_info.php');
exit;
} else { ?>
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

	<section id="banner" class="banner-bg cart-banner">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner-title text-center">
						<p class="banner-heading">Register</p>
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a href="index.php">Home</a>
							</li>
							<li class="breadcrumb-item active text-uppercase" aria-current="page">Register</li>
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
							<h4 class="text-uppercase font-weight-bold mb-4">Registration Form</h4>
							<?php
			                  
                  if(!empty($_GET['notification'])){
                    $msg = $_GET['notification'];
                    ?>
                  
                <p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $msg; ?></p>
                
                <?php } ?>

              	<?php require 'register_form.php'; ?>
						</div>
					</div>
					<div class="col-lg-2">
					</div>
					
				</div>
			</div>
		</div>
	</section>

<?php require 'templates/footer.php'; }?>