<?php ob_start(); ?>
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
                  <h3 class="box-title">Add Food to your Menu</h3>
                   <?php

                  
                    if(!empty($_GET['notification'])){
                      $msg = $_GET['notification'];
                      ?>
                    
                  <p class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
<?php echo $msg; ?></p>
                  
                  <?php } ?>
                </div><!-- /.box-header -->
                <!-- form start -->

                <?php 
                  if (isset($_GET['id'])) {
                    $item_id = $_GET['id'];

                    include_once '../db_connection.php';

                    $sql = "SELECT * FROM menu_items WHERE id = $item_id";

                    $results = $conn->query($sql);
                  }
                require 'menu_form.php'; ?>
              </div><!-- /.box -->
            </div><!--/.col -->
            <div class="col-md-3"></div>
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

        
<?php require('./_includes/footer.php'); ?>