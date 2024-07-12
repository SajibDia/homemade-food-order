<?php 

if (isset($_GET['id'])) {
        $dman_id = $_GET['id'];

        include_once '../db_connection.php';

        $sql = "SELECT * FROM user WHERE id = $dman_id";

        $results = $conn->query($sql);
      }

      if(isset($results)){
  $row = $results->fetch_assoc();
  

}


?>


<form role="form" action="submit_delivery_man_info.php" method="POST">
  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo (!empty($row)) ? $row['full_name'] : '' ;?>" id="exampleInputEmail1" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="email" value="<?php echo (!empty($row)) ? $row['email'] : '' ;?>" id="exampleInputEmail1" placeholder="Enter Phone Number">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Phone</label>
      <input type="text" class="form-control" name="phone" value="<?php echo (!empty($row)) ? $row['phone_number'] : '' ;?>" id="exampleInputEmail1" placeholder="Enter Phone Number">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="password" class="form-control" name="password" value="<?php echo (!empty($row)) ? $row['password'] : '' ;?>" id="exampleInputEmail1">
      <input type="hidden" name="user_role" value="delivery_man">
      <input type="hidden" name="id" value="<?php echo (!empty($row)) ? $row['id'] : '' ;?>">
    </div>
    
  </div><!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>