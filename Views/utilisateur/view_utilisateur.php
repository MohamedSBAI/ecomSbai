<?php 
    $title =  '<a href="action.php?action=listUsers" ><i class="fa fa-arrow-left" aria-hidden="true"></i>
    Previous</a>';
    ob_start(); 
?>


     <div class="container">
        <div class="d-flex flex-column mb-3">
        <div class="row">
        <div class="col-md-6 mx-auto">
       <div class="p-2"><div class="form-group row">
              <div class="col-sm-10 mt-2 mb-2">
              <div class=" bg-primary text-center"  style="height: 250px;  width: 250px; border-radius: 50%;overflow: hidden;">
                  <img style="width: 100%;height: 100%;object-fit: cover;" id="preview" class="rounded mx-auto d-block" src="../assets/img/user/<?=$user[0]->picture?>" >
              </div>
              </div></div>
         </div>
        </div>
        </div>
            
           
            <div class="p-2"><div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label" plaseholser>Nom:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="<?=$user[0]->name?>" readonly>
          </div>
        </div></div>
            <div class="p-2"> <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="<?=$user[0]->email?>" readonly>
          </div>
        </div></div>
            <div class="p-2"><div class="form-group row">
          <label for="role" class="col-sm-2 col-form-label">Role:</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="role" name="role" value="<?=$user[0]->role_name?>" readonly>
          </div>
        </div></div>
        </div>
      </div> 
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-ZMkVr8xX6yQn2j+XlVYJv2+qz5PAWb+L+5u/7l2s4fV4JzgjkhmUOx6dRZq1mU0r"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<?php $content = ob_get_clean(); ?>
<?php include('admin-dashboard.php'); ?>