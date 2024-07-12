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
                  <div class="text-center"><h3 class="box-title">Assign a Delivery Man</h3></div>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php 
                include_once '../db_connection.php';
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    if(isset($_GET['id'])){
                        $orderID = $_GET['id'];

                        $sql = "SELECT co.*, u.full_name FROM customer_order co JOIN user u ON co.user_id = u.id  WHERE co.id = $orderID";
                        $results = $conn->query($sql);
                        $order = $results->fetch_assoc();


                    }

                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  


                  $order_id = $_POST['orderID'];
                  $delivery_manID = $_POST['delivery_man'];

                  $sql = "INSERT INTO delivery_order (order_id, delivery_man_id) VALUES('$order_id', '$delivery_manID')";

                  if ($conn->query($sql) === TRUE) {
                    header('location:assigned_delivery_info.php?notification=Updated  Delivery Man  Information');
                   } else {
                    header('location:assigned_delivery_man.php?notification=Failed to Update Delivery Man Information');
                   }

              }
                
                ?>
                <form role="form" action="assign_delivery_man.php" method="POST">
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
                        <input type="text" class="form-control" name="name" value="<?php echo $order['full_name'];?>" id="exampleInputEmail1" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Delivery ID</label>
                        <input type="text" class="form-control" name="orderID" value="<?php echo $order['id'];?>" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            
                        <label for="exampleInputEmail1">Delivery Man</label>
                        <select name="delivery_man" id="delivery_man">
                        <?php
                            $sql = "SELECT dmi.*, u.full_name FROM delivery_man_info dmi JOIN user u ON u.id = dmi.delivery_man_id WHERE is_booked = 0";
                            $results = $conn->query($sql);
                            foreach($results as $result){
                            
                            ?>
                        <option value="<?php echo $result['delivery_man_id'];  ?>"><?php echo $result['full_name'];  ?></option>
                        <?php } ?>
                        </select>
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