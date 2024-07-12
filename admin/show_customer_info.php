<?php require('./_includes/head.php'); ?>
<?php require('./_includes/header.php'); ?>
<?php require('./_includes/sidebar.php'); ?>


<?php 
  include_once '../db_connection.php';

 if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM user WHERE id = $id";
  
  if ($conn->query($sql) === TRUE) {
    header('location:show_customer_info.php?notification=User Deleted successfully');
  } else {
    header('location:show_customer_info.php?notification=Failed to Delete User');
  }
}


  // Number of results to display per page
  $results_per_page = 10;

  // Get current page number from URL
  $page = isset($_GET['page']) ? $_GET['page'] : 1;

  // Calculate offset based on current page number
  $offset = ($page - 1) * $results_per_page;

  $sql = "SELECT * FROM user LIMIT $results_per_page OFFSET $offset";

  $users = $conn->query($sql);

  $item_number = 1
 

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
                  <h3 class="box-title">All Customer Information</h3>
                  <?php
                  
                    if(!empty($_GET['notification'])){
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
                        <th>Name</th>
                        <th>User Role</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $user) { ?>
                      <tr>
                        <td><?= $item_number ?></td>
                        <td><?= $user['full_name']; ?></td>
                        <td><?= $user['user_role']; ?></td>
                        <td><?= $user['email'];?></td>
                        <td><?= $user['phone_number']; ?></td>
                        <td>
                          
                          <a style="color: #fff;" href="show_customer_info.php?id=<?= $user['id']; ?>"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete this User?')">Delete</button></a>
                        </td>
                      </tr>
                      <?php $item_number++; } ?>
                    </tbody>
                  </table>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="dataTables_info" id="example2_info">
                        Showing 1 to 10 of 57 entries
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
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php require('./_includes/footer.php'); ?>