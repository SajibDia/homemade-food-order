<?php 
  //Form Submition 

   include_once '../db_connection.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if(!empty($_POST['id'])){

      $dman_id = $_POST['id'];

      // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['password'];
        $userRole = $_POST['user_role'];

        

        $sql = "UPDATE user
        SET full_name = '$name',
            email = '$email',
            phone_number = '$phone',
            password = '$pass'
            WHERE id = $dman_id";

            



        
        if ($conn->query($sql) === TRUE) {
         header('location:show_delivery_man.php?notification=Updated  Delivery Man  Information');
        } else {
         header('location:show_delivery_man.php?notification=Failed to Update Delivery Man Information');
        }


        


        
    } else {
    // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['password'];
        $userRole = $_POST['user_role'];


        $sql = "INSERT INTO user (full_name, email, phone_number, password, user_role) VALUES ('$name', '$email', '$phone', '$pass', '$userRole')";

        
        if ($conn->query($sql) === TRUE) {
         header('location:show_delivery_man.php?notification=New  Delivery Man  Added to the list');
        } else {
         header('location:show_delivery_man.php?notification=Failed to Add Delivery Man to the list');
        }
    }

 
}


?>