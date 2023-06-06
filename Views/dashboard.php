<?php 
    require_once '../Models/users.php';

    $title = 'Dashboard';
    ob_start(); 
?>
<!-- Small boxes (Stat box) -->
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-th" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
<!-- ./col -->
<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php $countUsers=countUsers();
                ?>
                <?php echo $countUsers; ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus right"></i>
              </div>
              <a href="action.php?action=listUsers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('admin-dashboard.php'); ?>