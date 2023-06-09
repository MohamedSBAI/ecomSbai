<?php 
    
    $title = " Ajouter produit";
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
      <form action="product_action.php?action=addProduct" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label" plaseholser>Nom:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Entrez produit nom">
          </div>
          <label for="email" class="col-sm-2 col-form-label">Stock:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="stock" name="stock" placeholder="">
          </div>
          <label for="email" class="col-sm-2 col-form-label">Prix:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" placeholder="">
          </div>
          <label for="role" class="col-sm-2 col-form-label">Catégorie:</label>
          <div class="col-sm-10">
             <select class="form-control" id="cat" name="cat">
             <option value="" disabled selected>Choose an option:</option>
            <?php  
            foreach($categorys as $category):?>
              <option value="<?=$category->id?>"><?=$category->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <label for="role" class="col-sm-2 col-form-label">Slug:</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="slug" name="slug" >
          </div>
          <label for="role" class="col-sm-2 col-form-label">Description:</label>
          <div class="col-sm-10">
          <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
          </div>
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
      <img id="preview" src="/ecom/assets/img/icon/product.png" >
    </div>
  </div>
</div> 
        <button type="submit" class="btn btn-primary mb-5">Ajouter produit</button>
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