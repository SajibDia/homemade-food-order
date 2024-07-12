<?php require('./_includes/head.php'); ?>
<?php require('./_includes/header.php'); ?>
<?php require('./_includes/sidebar.php'); ?>


<?php 
  include_once '../db_connection.php';

  $userID = $_SESSION['userID'];

 if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM menu_items WHERE id = $id";
  
  if ($conn->query($sql) === TRUE) {
    header('location:show_added_menu.php?notification=Menu Item Deleted successfully');
  } else {
    header('location:show_added_menu.php?notification=Failed to Delete Menu Item');
  }
}


  // Number of results to display per page
  $results_per_page = 5;

  // Get current page number from URL
  $page = isset($_GET['page']) ? $_GET['page'] : 1;

  // Calculate offset based on current page number
  $offset = ($page - 1) * $results_per_page;

  // $sql = "SELECT * FROM menu_items LIMIT $results_per_page OFFSET $offset";


  if($_SESSION['userRole'] == 'admin'){
    $sql = "SELECT 
    m.id,
    m.item_name,
    u.shop_name,
    m.medium_price,
    m.family_price,
    m.xl_price,
    m.description,
    m.item_image
    FROM menu_items AS m
    JOIN user AS u ON m.user_id = u.id LIMIT $results_per_page OFFSET $offset";
    
      $menu_items = $conn->query($sql);
    
      $item_number = 1;
  }else{
    $sql = "SELECT 
    m.id,
    m.item_name,
    u.shop_name,
    m.medium_price,
    m.family_price,
    m.xl_price,
    m.description,
    m.item_image
    FROM menu_items AS m
    JOIN user AS u ON m.user_id = u.id
    WHERE user_id = '$userID' LIMIT $results_per_page OFFSET $offset";

    $menu_items = $conn->query($sql);

    $item_number = 1;
  }

  
 

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
                        <th>Item Name</th>
                        <th>Seller Name</th>
                        <th>Breakfast Price</th>
                        <th>Lunch Price</th>
                        <th>Dinner Price</th>
                        <th>Description</th>
                        <th>Item Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($menu_items as $menu_item) { ?>
                      <tr>
                        <td><?= $item_number ?></td>
                        <td><?= $menu_item['item_name']; ?></td>
                        <td><?= $menu_item['shop_name']; ?></td>
                        <td><?= $menu_item['medium_price'];?></td>
                        <td><?= $menu_item['family_price']; ?></td>
                        <td><?= $menu_item['xl_price']; ?></td>
                        <td><?= $menu_item['description']; ?></td>
                        <td><img src="uploads/<?= $menu_item['item_image']; ?>" height="50px" width="50px"></td>
                        <td>
                          <a style="color: #fff;" href="add_menu_item.php?id=<?php echo $menu_item['id']; ?>"><button class="btn btn-info">Edit</button></a>
                          <a style="color: #fff;" href="show_added_menu.php?id=<?php echo $menu_item['id']; ?>"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete this Menu?')">Delete</button></a>
                        </td>
                      </tr>
                      <?php $item_number++; } ?>
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
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php require('./_includes/footer.php'); ?>