<?php
include_once '../db_connection.php';
$sql = "SELECT * FROM user WHERE id = $userID";
$user = $conn->query($sql);
$info = mysqli_fetch_assoc($user); 
?>
    <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../<?php echo $info['profile_image']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['userName']; ?></p>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li>
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cutlery"></i>
                <span>Menu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../admin/add_menu_item.php"><i class="fa fa-plus-circle"></i> Add Menu Item</a></li>
                <li><a href="../admin/show_added_menu.php"><i class="fa fa-eye"></i> Show Menu Item</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Orders</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="show_orders.php"><i class="fa fa-eye"></i> Show Orders</a></li>
              </ul>
            </li>

            <?php if( $_SESSION['userRole'] == 'admin') { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="show_customer_info.php"><i class="fa fa-eye"></i> Show User Information</a></li>
              </ul>
            </li>
            <?php } ?>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-car"></i>
                <span>Delivery</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_delivery_man.php"><i class="fa fa-plus-circle"></i> Add Delivery Man</a></li>
                <li><a href="assigned_delivery_info.php"><i class="fa fa-plus-circle"></i> Show Assigned Delivery Man Info</a></li>
                <li><a href="show_delivery_man.php"><i class="fa fa-eye"></i> Show Delivery Man Information</a></li>
              </ul>
            </li>

           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>