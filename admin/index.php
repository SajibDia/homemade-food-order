<?php require('./_includes/head.php'); ?>
<?php require('./_includes/header.php'); ?>
<?php require('./_includes/sidebar.php'); ?>      
      
  

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DASHBOARD
            <small>Admin panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php include_once '../db_connection.php';
                  $sql = "SELECT COUNT(id) FROM customer_order WHERE shop_id = $userID";
                  $result = $conn->query($sql);

                  $total_order = $result->fetch_assoc();

                  ?>
                  <h3><?php echo $total_order['COUNT(id)']; ?></h3>
                  <p>All Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="show_orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <?php include_once '../db_connection.php';
                  $sql = "SELECT SUM(payable_amount) AS total_amount FROM customer_order WHERE shop_id = $userID";
                  $result = $conn->query($sql);

                  $total_income = $result->fetch_assoc();

                  ?>
                  <h3>$<?php echo $total_income['total_amount']; ?><sup style="font-size: 20px"></sup></h3>
                  <p>Total Income</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="show_orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                <?php include_once '../db_connection.php';
                  $sql = "SELECT COUNT(id) FROM user WHERE user_role = 'customer'";
                  $result = $conn->query($sql);

                  $total_customer = $result->fetch_assoc();

                  ?>
                  <h3><?php echo $total_customer['COUNT(id)']; ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="show_customer_info.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <?php include_once '../db_connection.php';
                  $sql = "SELECT COUNT(id) FROM user WHERE user_role = 'delivery_man'";
                  $result = $conn->query($sql);

                  $total_delivery_man = $result->fetch_assoc();

                ?>
                  <h3><?php echo $total_delivery_man['COUNT(id)']; ?></h3>
                  <p>Total Delivery Man</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="show_delivery_man.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php require('./_includes/footer.php'); ?>