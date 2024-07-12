<?php 
session_start();

include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	$addressStored = $_POST['stored_address'];
	$address = $_POST['address'];
	$zip = $_POST['addresszip'];
	$area = $_POST['area'];
	$date = $_POST['date'];
	$item_id = $_POST['item_id'];
	$pAmount = $_POST['total'];
	$userId = $_SESSION['userID'];
	$shop_id = $_POST['shop_id'];
	$item_qnt = $_POST['item_qnt'];

	if($addressStored == true){
		$sql = "UPDATE user
		SET user_address = '$address',
		user_zip = '$zip',
		user_area = '$area' 
		WHERE id = $userId";

		

		$conn->query($sql);

		$sql = "INSERT INTO customer_order (user_id, order_date, shop_id, item_id, item_quantity, payable_amount, status) VALUES ('$userId', '$date', '$shop_id', '$item_id', '$item_qnt', '$pAmount', 'pending')";

		$conn->query($sql);
		$orderId = $conn->insert_id;

	if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"]))
	{
		
		foreach($_SESSION["cart"] as $data)
		{
			$sql = "INSERT INTO customer_order (user_id, order_date, shop_id, item_id, item_quantity, payable_amount, status) VALUES ('$userId', '$date', '$shop_id', '$item_id', '$item_qnt', '$pAmount', 'pending')";
			
			$conn->query($sql);
		}	
		
		unset($_SESSION["cart"]);
	}
	$_SESSION['notify'] = "Your Order Has Placed Successfully";
	// echo $_SESSION['notify']; exit;
	header("location:show_my_orders.php?notification='Your Order Placed Succesfully'");

	}else{

		$sql = "INSERT INTO INSERT INTO customer_order (user_id, order_date, shop_id, item_id, item_quantity, payable_amount, status) VALUES ('$userId', '$date', '$shop_id', '$item_id', '$item_qnt', '$pAmount', 'pending')";

		$conn->query($sql);
		$orderId = $conn->insert_id;

	if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"]))
	{
		
		foreach($_SESSION["cart"] as $data)
		{
			$sql = "INSERT INTO customer_order (user_id, order_date, shop_id, item_id, item_quantity, payable_amount, status) VALUES ('$userId', '$date', '$shop_id', '$item_id', '$item_qnt', '$pAmount', 'pending')";
			
			$conn->query($sql);
		}	
		
		unset($_SESSION["cart"]);
	}
	
	header("location:show_my_orders.php?notification='Your Order Placed Succesfully'");
	}


	
	
}

?>