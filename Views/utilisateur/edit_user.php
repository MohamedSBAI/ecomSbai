<?php 
    $title = " Modifier l'utilisateur";
    ob_start(); 
?>

<style>
  .square {
    width: 150px;
    height: 150px;
    overflow: hidden;
    border-radius: 50%;
  }

  .square img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>
<div class="container">
  <form action="action.php?action=editUser" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$userData[0]->id;?>">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Nom:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="<?=$userData[0]->name;?>" placeholder="Entrez votre nom">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" value="<?=$userData[0]->email;?>" placeholder="Entrez votre adresse email">
      </div>
    </div>
    <div class="form-group row">
      <label for="role" class="col-sm-2 col-form-label">Role:</label>
      <div class="col-sm-10" style="">
        <select class="form-control" id="role" name="role">
          <option value="1" <?=($userData[0]->role_name == 'admin') ? 'selected' : ''?>>Admin</option>
          <option value="2" <?=($userData[0]->role_name == 'user') ? 'selected' : ''?>>User</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="new_password" class="col-sm-2 col-form-label">Nouveau mot de passe:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="new_password" value="<?=$userData[0]->password;?>" name="new_password">
      </div>
    </div>
    <div class="form-group row">
      <label for="confirm_new_password" class="col-sm-2 col-form-label">Confirmer le nouveau mot de passe:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
      </div>
    </div>
    <div class="form-group row">
      <label for="picture" class="col-sm-2 col-form-label">Photo:</label>
      <div class="col-sm-10">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="picture" name="picture" onchange="preview()">
          <label class="custom-file-label" for="picture">Choose file</label>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2"></div>
      <div class="col-sm-10 mt-2">
        <div class="square">
          <img id="preview" src="../assets/img/user/<?=$userData[0]->picture?>" >
        </div>
      </div>
    </div> 
    <button type="submit" class="btn btn-primary mb-5">Mettre à jour l'utilisateur</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-ZMkVr8xX6yQn2j+XlVYJv2+qz5PAWb+L+5u/7l2s4fV4JzgjkhmUOx6dRZq1mU0r"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {

// Preview uploaded image
$("#picture").change(function (e) {
  if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
  }
});


});
      function preview() {
    var preview = document.getElementById('preview');
    var file = document.getElementById('picture').files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }
  </script>
<?php $content = ob_get_clean(); ?>
<?php include('admin-dashboard.php'); ?>