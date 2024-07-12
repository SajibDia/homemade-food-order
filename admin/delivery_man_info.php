<?php require('./_includes/head.php'); ?>
<?php require('./_includes/header.php'); ?>
<?php require('./_includes/sidebar.php'); ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!--  column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <a href="show_delivery_man_info.php"><button class="btn btn-info">Back To Delivery Man List</button></a>
                  <div class="text-center"><h3 class="box-title">Add Pizza to your Menu</h3></div>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php 
                

                include_once '../db_connection.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Get form data
                        $id = $_POST['id'];
                        $address = $_POST['address'];
                        $salary = $_POST['salary'];
                        

                        $sql = "INSERT INTO delivery_man_info (delivery_man_id, address, salary) VALUES ('$id', '$address', '$salary')";

                        if ($conn->query($sql) === TRUE) {
                            header('location:show_delivery_man_info.php?notification= Delivery Man  Information Added');
                           } else {
                            header('location:show_delivery_man_info.php?notification=Failed to Add Delivery Man Information');
                           }
                }

                
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    if(isset($_GET['id'])){
                        $dman_id = $_GET['id'];

                        $sql = "SELECT * FROM user WHERE id = $dman_id";
                        $results = $conn->query($sql);
                        $userInfo = $results->fetch_assoc();


                    }

                }

                
                ?>
                <form role="form" action="delivery_man_info.php" method="POST">
                    <div class="box-body">
                        <?php
                        
                        if(!empty($_GET['notification'])){
                            $msg = $_GET['notification'];
                            ?>
                        
                        <p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
<?php echo $msg; ?></p>
                        
                        <?php } ?>
                        <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $userInfo['full_name'];?>" id="exampleInputEmail1" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" value="" id="exampleInputEmail1" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Salary</label>
                        <input type="text" class="form-control" name="salary" value="" id="exampleInputEmail1" placeholder="Enter Salary Amount">
                        <input type="hidden" name="id" value="<?php echo $userInfo['id'];?>">
                        </div>
                        
                    </div><!-- /.box-body -->

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
<?php require('./_includes/footer.php'); ?>