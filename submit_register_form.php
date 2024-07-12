<?php 
  //Form Submition 

  include_once 'db_connection.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (!empty($_POST['id'])) {
          $customer_id = $_POST['id'];
  
          // Get form data
          $fullName = $_POST['fname'];
          $email = $_POST['email'];
          $pnumber = $_POST['pnumber'];
          $password = $_POST['password'];
          $userRole = $_POST['user_role'];
          $userAddress = $_POST['uaddress'];
          $userZip = $_POST['uzip'];
          $userArea = $_POST['uarea'];



        $sql = "SELECT email from USER WHERE email = $email AND id != $customer_id";


        $result = $conn->query($sql);



        if($result->num_rows>0){
          header('location:register.php?notification=This Email already has a Account&id=' .$customer_id);exit;
        }
      
        if($fullName == ''){
          header('location:register.php?notification=Please type  Your Full Name&id=' .$customer_id);exit;
        }
      
        if($email == ''){
          header('location:register.php?notification=Please type  Your Email&id=' .$customer_id);exit;
        }

        if($pnumber == ''){
          header('location:register.php?notification=Please type  Your Phone Number&id=' .$customer_id);exit;
        }elseif(!is_numeric($pnumber)){
          header('location:register.php?notification=Phone Number Cannot contain Alphabet&id=' .$customer_id);exit;
        }elseif(strlen($pnumber) != 11){
          header('location:register.php?notification=Phone Number Cannot be less or more than 11 Digit&id=' .$customer_id);exit;
        }

        if($password == ''){
          header('location:register.php?notification=Please type  Secure Password&id=' .$customer_id);exit;
        }elseif(strlen($password) < 8){
          header('location:register.php?notification=Password Should Be at least 8 Digit&id=' .$customer_id);exit;
        }


  
          // Check if a new image has been uploaded
          if (!empty($_FILES['item_image']['name']) && ($_FILES['item_image']["type"] == 'image/jpg' || $_FILES['item_image']["type"] == 'image/png' || $_FILES['item_image']["type"] == 'image/jpeg')  ) {
              $imageName = $_FILES['item_image']['name'];
              $imageTmpName = $_FILES['item_image']['tmp_name'];
  
              // Define the directory where images will be stored
              $imageUploadDir = "uploads/";
  
              // Construct the path to move the image to
              $targetFile = $imageUploadDir . basename($imageName);
  
              // Move the uploaded image to the specified directory
              if (move_uploaded_file($imageTmpName, $targetFile)) {
                  // Image was uploaded successfully
              } else {
                  // Image upload failed
                  header('location:show_my_info.php?notification=Failed to upload image&id=' . $customer_id);
                  exit;
              }
          }
  
          // Continue with your database update
          $sql = "UPDATE user
              SET full_name = '$fullName',
                  email = '$email',
                  phone_number = '$pnumber',
                  password = '$password',
                  user_address = '$userAddress',
                  user_zip = '$userZip',
                  user_area = '$userArea',
                  profile_image = '$targetFile'
              WHERE id = $customer_id";

              
  
          if ($conn->query($sql) === TRUE) {
              header('location:show_my_info.php?notification=User Info Updated successfully');
          } else {
              header('location:show_my_info.php?notification=Failed to Update Info');
          }
      } 
    else {
      // Get form data
        $fullName = $_POST['fname'];
        $email = $_POST['email'];
        $pnumber = $_POST['pnumber'];
        $password = $_POST['password'];
        $userRole = $_POST['user_role'];
        $userAddress = $_POST['user_address'];
        $userZip = $_POST['user_zip'];
        $userArea = $_POST['user_area'];

        $sql = "SELECT email FROM user WHERE email = '$email'";

        
        $result = $conn->query($sql);
       
        if($result->num_rows>0){
          header('location:register.php?notification=This Email already has a Account');exit;
        }
      
        if($fullName == ''){
          header('location:register.php?notification=Please type  Your Full Name');exit;
        }
      
        if($email == ''){
          header('location:register.php?notification=Please type  Your Email');exit;
        }

        if($pnumber == ''){
          header('location:register.php?notification=Please type  Your Phone Number');exit;
        }elseif(!is_numeric($pnumber)){
          header('location:register.php?notification=Phone Number Cannot contain Alphabet');exit;
        }elseif(strlen($pnumber) != 11){
          header('location:register.php?notification=Phone Number Cannot be less or more than 11 Digit');exit;
        }

        if($password == ''){
          header('location:register.php?notification=Please type  Secure Password');exit;
        }elseif(strlen($password) < 8){
          header('location:register.php?notification=Password Should Be at least 8 Digit');exit;
        }


        $sql = "INSERT INTO user (full_name, email, phone_number, password, user_role) VALUES ('$fullName', '$email', '$pnumber', '$password', '$userRole')";

        
        if ($conn->query($sql) === TRUE) {
         header('location:signin.php?notification=You have registered successfully');
        } else {
         header('location:register.php?notification=Register Failed');
        }
    }
}
