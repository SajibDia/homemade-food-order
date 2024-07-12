<?php require('./_includes/head.php'); ?>
<?php require('./_includes/header.php'); ?>
<?php require('./_includes/sidebar.php'); ?>


<?php 
  include_once '../db_connection.php';

 if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM delivery_man WHERE id = $id";
  
  if ($conn->query($sql) === TRUE) {
    header('location:show_delivery_man_info.php?notification=Delivery Man Info Deleted successfully');
  } else {
    header('location:show_delivery_man_info.php?notification=Failed to Delete Delivery Man Info');
  }
}


  // Number of results to display per page
  $results_per_page = 5;

  // Get current page number from URL
  $page = isset($_GET['page']) ? $_GET['page'] : 1;

  // Calculate offset based on current page number
  $offset = ($page - 1) * $results_per_page;

  $sql = "SELECT dmi.*, u.full_name FROM delivery_man_info dmi JOIN user u ON u.id = dmi.delivery_man_id";

  $delivery_men = $conn->query($sql);

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
                  <h3 class="box-title">All Menu Items</h3>
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
                        <th>Address</th>
                        <th>Salary</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($delivery_men as $delivery_man) { ?>
                      <tr>
                        <td><?= $item_number ?></td>
                        <td><?= $delivery_man['full_name']; ?></td>
                        <td><?= $delivery_man['address'];?></td>
                        <td><?= $delivery_man['salary']; ?></td>
                        <td>
                          <?php if($delivery_man['is_booked'] == 0){
                            echo 'Not Assigned';
                          }else{
                            echo 'Assigned';
                          }  ?>
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