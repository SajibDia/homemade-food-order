<?php 
  //Form Submition 

   include_once '../db_connection.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if(!empty($_POST['id'])){

      $item_id = $_POST['id'];

      // $user_role = $_SESSION['userRole'];
      // $user_id = $_SESSION['userID'];


      // Get form data
        $itemName = $_POST['item_name'];
        $mediumPrice = $_POST['medium_price'];
        $familyPrice = $_POST['family_price'];
        $xlPrice = $_POST['xl_price'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $user_ID = $_POST['user_id'];
        


        if(!empty($_FILES['item_image']['name'])){
          $imageName = $_FILES['item_image']['name'];
          $imageTmpName = $_FILES['item_image']['tmp_name'];

          // Upload image to server
          $targetDir = "uploads/";
          $targetFile = $targetDir . basename($imageName);
          move_uploaded_file($imageTmpName, $targetFile);


        $sql = "UPDATE menu_items
        SET item_name = '$itemName',
            medium_price = '$mediumPrice',
            family_price = '$familyPrice',
            xl_price = '$xlPrice',
            description = '$description',
            item_image = '$imageName'
            WHERE id = $item_id";


        if ($conn->query($sql) === TRUE) {
         header('location:show_added_menu.php?notification=New Menu Item Added successfully');
        } else {
         header('location:show_added_menu.php?notification=Failed to Add Menu Item');
        }


        }else{

        $sql = "UPDATE menu_items
        SET item_name = '$itemName',
            medium_price = '$mediumPrice',
            family_price = '$familyPrice',
            xl_price = '$xlPrice',
            description = '$description'
            WHERE id = $item_id";

            



        
        if ($conn->query($sql) === TRUE) {
         header('location:show_added_menu.php?notification=New Menu Item Added successfully');
        } else {
         header('location:show_added_menu.php?notification=Failed to Add Menu Item');
        }


        }

        


        // Insert form data into database
       


        $sql = "UPDATE menu_items
        SET item_name = '$itemName',
            medium_price = '$mediumPrice',
            family_price = '$familyPrice',
            xl_price = '$xlPrice',
            description = '$description'
            WHERE id = $item_id";



        
        if ($conn->query($sql) === TRUE) {
         header('location:show_added_menu.php?notification=New Menu Item Added successfully');
        } else {
         header('location:show_added_menu.php?notification=Failed to Add Menu Item');
        }

        
    } else {
      // Get form data
        $itemName = $_POST['item_name'];
        $mediumPrice = $_POST['medium_price'];
        $familyPrice = $_POST['family_price'];
        $xlPrice = $_POST['xl_price'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $imageName = $_FILES['item_image']['name'];
        $imageTmpName = $_FILES['item_image']['tmp_name'];
        $user_ID = $_POST['user_id'];
        

        // Upload image to server
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($imageName);
        move_uploaded_file($imageTmpName, $targetFile);


        $sql = "INSERT INTO menu_items (item_name, medium_price, family_price, xl_price, description, item_image, user_id) VALUES ('$itemName', '$mediumPrice', '$familyPrice', '$xlPrice', '$description', '$imageName', '$user_ID')";

        
        if ($conn->query($sql) === TRUE) {
         header('location:show_added_menu.php?notification=New Menu Item Added successfully');
        } else {
         header('location:add_menu_item.php?notification=Failed to Add Menu Item');
        }
    }

 
}


?>