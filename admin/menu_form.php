<?php 

if(isset($results)){
  $row = $results->fetch_assoc();
  

}


?>

<form role="form" action="submit_menu_item.php" method="POST" enctype="multipart/form-data">
  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Item Name</label>
      <input type="text" name="item_name" value="<?php echo (!empty($row)) ? $row['item_name'] : '' ;?>" class="form-control" id="exampleInputEmail1" placeholder="Food Name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Breakfast Price</label>
      <input type="text" name="medium_price" value="<?php echo (!empty($row)) ? $row['medium_price'] : '' ;?>" class="form-control" id="exampleInputEmail1" placeholder="Price of this item for Breakfast">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Lunch Price</label>
      <input type="text" name="family_price" value="<?php echo (!empty($row)) ? $row['family_price'] : '' ;?>" class="form-control" id="exampleInputEmail1" placeholder="Price of this item for Lunch">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Dinner Price</label>
      <input type="text" name="xl_price" value="<?php echo (!empty($row)) ? $row['xl_price'] : '' ;?>" class="form-control" id="exampleInputPassword1" placeholder="Price of this item for Dinner">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea class="form-control" name="description"><?php echo (!empty($row)) ? $row['description'] : '' ;?></textarea>
      
      <input type="hidden" name="id" value="<?php echo (!empty($row)) ? $row['id'] : '' ;?>">
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Item Image</label>
      <input type="file" name="item_image" value="<?php echo (!empty($row)) ? $row['item_image'] : '' ;?>" id="exampleInputFile">
      <p class="help-block">Upload JPG PNG Images.</p>
    </div>
    <div>
    <input type="hidden" class="form-control" name="user_id" value='<?php echo $_SESSION['userID']; ?>'>
    </div>
    
  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>