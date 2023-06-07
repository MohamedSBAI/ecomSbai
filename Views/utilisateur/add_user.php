<?php 
    $title = " Ajouter l'utilisateur";
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
      <form action="action.php?action=addUser" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label" plaseholser>Nom:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email">
          </div>
        </div>
        <div class="form-group row">
          <label for="role" class="col-sm-2 col-form-label">Role:</label>
          <div class="col-sm-10">
            <select class="form-control" id="role" name="role">
              <option value="1">Admin</option>
              <option value="2">User</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="role" class="col-sm-2 col-form-label">Password:</label>
          <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="role" class="col-sm-2 col-form-label">Confirm Password:</label>
          <div class="col-sm-10">
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
          </div>
        </div>
        <div class="form-group row">
  <label for="picture" class="col-sm-2 col-form-label">Photo:</label>
  <div class="col-sm-10">
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="picture"  name="picture" onchange="preview()">
      <label class="custom-file-label" for="picture">Choose file</label>
    </div>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-2"></div>
  <div class="col-sm-10 mt-2">
    <div class="square">
      <img id="preview" src="/ecom/assets/img/icon/user.png" >
    </div>
  </div>
</div> 
        <button type="submit" class="btn btn-primary mb-5">Ajouter l'utilisateur</button>
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
  // Get the password and confirm password fields
var passwordField = document.getElementById("password");
var confirmPasswordField = document.getElementById("confirm_password");

// Add an event listener to the confirm password field
confirmPasswordField.addEventListener("input", function() {
  var password = passwordField.value;
  var confirm_password = confirmPasswordField.value;

  if (password != confirm_password) {
    confirmPasswordField.setCustomValidity("Passwords do not match");
  } else {
    confirmPasswordField.setCustomValidity("");
  }
});

    </script>
<?php $content = ob_get_clean(); ?>
<?php include('admin-dashboard.php'); ?>