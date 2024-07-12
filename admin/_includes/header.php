<?php 
$userID = $_SESSION['userID'];
if (!isset($_SESSION['isLoggedIn'])) {

  header('Location: ../signin.php');
  exit;
} elseif($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'seller' ) {
  ?><header class="main-header">

    
  <!-- Logo -->
  <a href="index.php" class="logo">HOME FOOD</a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
<?php
include_once '../db_connection.php';
$sql = "SELECT * FROM user WHERE id = $userID";
$user = $conn->query($sql);
$info = mysqli_fetch_assoc($user); 
?>


        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../<?php echo $info['profile_image']; ?>" class="user-image" alt="User Image" />
            <span class="hidden-xs"><?php echo $_SESSION['userName'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../<?php echo $info['profile_image']; ?>" class="img-circle" alt="User Image" />
              <p>
                <?php echo $_SESSION['userName']; ?>

              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="../show_my_info.php" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="../signout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<?php
  
}else{
  header('Location: ../index.php');
};

?>


