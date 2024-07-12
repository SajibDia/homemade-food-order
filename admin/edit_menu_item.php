<?php ob_start(); ?>
<?php require('./_includes/head.php'); ?>
<?php require('./_includes/header.php'); ?>
<?php require('./_includes/sidebar.php'); ?>


<?php 

  include_once '../db_connection.php';
  //Form Submition 

  $id = $_GET['id'];

  $sql = "SELECT * from menu_items WHERE id = $id";

  $menu_item = $conn->query($sql);




  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
    $itemName = $_POST['item_name'];
    $mediumPrice = $_POST['medium_price'];
    $familyPrice = $_POST['family_price'];
    $xlPrice = $_POST['xl_price'];
    $ingridientsName = $_POST['ingridients_name'];
    $imageName = $_FILES['item_image']['name'];
    $imageTmpName = $_FILES['item_image']['tmp_name'];

    // Upload image to server
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($imageName);
    move_uploaded_file($imageTmpName, $targetFile);


    // Insert form data into database
    include_once '../db_connection.php';


    $sql = "INSERT INTO menu_items (item_name, medium_price, family_price, xl_price, ingridients_name, item_image) VALUES ('$itemName', '$mediumPrice', '$familyPrice', '$xlPrice', '$ingridientsName', '$imageName')";

    
    if ($conn->query($sql) === TRUE) {
     header('location:show_added_menu.php?notification=New Menu Item Added successfully');
    } else {
     header('location:add_menu_item.php?notification=Failed to Add Menu Item');
    }



} else { ?>
  <!-- Main content -->
        <section class="content">
          <div class="row">
            <!--  column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Pizza to your Menu</h3>
                   <?php
                  
                    if(!empty($_GET['notification'])){
                      $msg = $_GET['notification'];
                      ?>
                    
                  <p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
<?php echo $msg; ?></p>
                  
                  <?php } ?>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="edit_menu_item.php" method="POST" enctype="multipart/form-data">
                  <?php while($row = $menu_item->fetch_assoc()) { ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Item Name</label>
                      <input type="text" name="item_name" class="form-control" id="exampleInputEmail1" value="<?= $row['item_name']; ?>" placeholder="Pizza Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Medium Price</label>
                      <input type="text" name="medium_price" class="form-control" id="exampleInputEmail1" value="<?= $row['medium_price']; ?>" placeholder="Medium Price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Family Price</label>
                      <input type="text" name="family_price" class="form-control" id="exampleInputEmail1" value="<?= $row['family_price']; ?>" placeholder="Family Price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">XL Price</label>
                      <input type="text" name="xl_price" class="form-control" id="exampleInputPassword1" value="<?= $row['xl_price']; ?>" placeholder="XL Price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Ingridients Name</label>
                      <input type="text" name="ingridients_name" class="form-control" id="exampleInputPassword1" value="<?= $row['ingridients_name']; ?>" placeholder="Ingridients Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Item Image</label>
                      <input type="file" name="item_image" value="<?= $row['item_image']; ?>" id="exampleInputFile">
                      <p class="help-block">Upload JPG PNG Images.</p>
                    </div>
                    
                  </div><!-- /.box-body -->
                <?php } ?>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col -->
            <div class="col-md-3"></div>
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php }


 ?>
        
<?php require('./_includes/footer.php'); ?>