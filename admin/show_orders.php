<?php require('./_includes/head.php'); ?>
<?php require('./_includes/header.php'); ?>
<?php require('./_includes/sidebar.php'); ?>


<?php
include_once '../db_connection.php';

$userID = $_SESSION['userID'];

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM customer_order WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM customer_order_details WHERE order_id = $id";
    header('location:show_orders.php?notification=Order Deleted successfully');
  } else {
    header('location:show_orders.php?notification=Failed to Delete Order');
  }
}


// Number of results to display per page
$results_per_page = 5;

// Get current page number from URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate offset based on current page number
$offset = ($page - 1) * $results_per_page;

//  $sql = "SELECT od.*,(SELECT item_name FROM menu_items WHERE id = od.item_id) AS itemname, (SELECT full_name FROM user WHERE id = o.user_id) AS username, ca.*, o.* FROM customer_order_details od JOIN customer_order o ON od.order_id = o.id JOIN user u ON o.user_id = u.id JOIN menu_items mi ON od.item_id = mi.id JOIN customer_address ca ON o.user_id = ca.user_id LIMIT $results_per_page OFFSET $offset";




?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!--  column -->
    <div class="col-md-2"></div>
    <div class="col-md-10">
      <!-- general form elements -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">All Customer Orders</h3>
          <?php

          if (!empty($_GET['notification'])) {
            $msg = $_GET['notification'];
          ?>

            <p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
              <?php echo $msg; ?></p>

          <?php } ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Customer Name</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Zip Code</th>
                <th>Area</th>
                <th>Payable Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

if($_SESSION['userRole'] == 'admin'){

  $sql = "SELECT 
          o.id,
          u.full_name,
          m.item_name,
          o.item_quantity,
          u.user_address,
          u.user_zip,
          u.user_area,
          o.payable_amount,
          o.status
          FROM
          customer_order AS o
          JOIN
          user AS u ON o.user_id = u.id
          JOIN
          menu_items AS m ON o.item_id = m.id

          LIMIT $results_per_page OFFSET $offset";

              $rev = mysqli_query($conn, $sql);
              if (!$rev) {
                die("Query failed: " . mysqli_error($conn));
              }
              $item_number = 1;
}else{
  $sql = "SELECT 
          o.id,
          u.full_name,
          m.item_name,
          o.item_quantity,
          u.user_address,
          u.user_zip,
          u.user_area,
          o.payable_amount,
          o.status
          FROM
          customer_order AS o
          JOIN
          user AS u ON o.user_id = u.id
          JOIN
          menu_items AS m ON o.item_id = m.id

          WHERE
          o.shop_id = '$userID'

          LIMIT $results_per_page OFFSET $offset";

              $rev = mysqli_query($conn, $sql);
              if (!$rev) {
                die("Query failed: " . mysqli_error($conn));
              }
              $item_number = 1;


}

          
              while ($order = mysqli_fetch_assoc($rev)) {
              ?>



                <!-- foreach ($orders as $order) { ?> -->
                <tr>
                  <td><?php echo $item_number ?></td>
                  <td><?php echo $order['full_name']; ?></td>
                  <td><?php echo $order['item_name']; ?></td>
                  <td><?php echo $order['item_quantity']; ?></td>
                  <td><?php echo $order['user_address']; ?></td>
                  <td><?php echo $order['user_zip']; ?></td>
                  <td><?php echo $order['user_area']; ?></td>
                  <td>$ <?php echo $order['payable_amount']; ?></td>


                  <td>
                    <a style="color: #fff;" href="show_orders.php?id=<?= $order['id']; ?>">
                      <button class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete this Order?')">Delete</button>
                    </a>
                    <?php if (isset($order['status']) && $order['status'] == 'pending') { ?>
                      <a style="color: #fff;" href="assign_delivery_man.php?id=<?= $order['id']; ?>">
                        <button class="btn btn-info">Assign Delivery Man</button>
                      </a>
                    <?php $item_number++;
                    } ?>
                  </td>




                </tr>
              <?php
              } ?>
            </tbody>
          </table>
          <div class="row">
            <div class="col-md-10">
              <div class="dataTables_info" id="example2_info">
                Showing 1 to 5 of 57 entries
              </div>
            </div>
            <?php

            $sql_count = "SELECT COUNT(*) AS total FROM menu_items";
            $result_count = $conn->query($sql_count);
            $row_count = $result_count->fetch_assoc();
            $total_pages = ceil($row_count['total'] / $results_per_page);

            ?>
            <div class="col-md-2">
              <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
                  <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li>
                      <?php echo '<a href="?page=' . $i . '">' . $i . '</a> '; ?>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
    <!-- <div class="col-md-3"></div> -->
  </div> <!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php require('./_includes/footer.php'); ?>