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
                  <div class="text-center"><h3 class="box-title">Add Delivery Man</h3></div>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php require 'delivery_man_form.php' ?>
              </div><!-- /.box -->
            </div><!--/.col -->
            <div class="col-md-3"></div>
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php require('./_includes/footer.php'); ?>