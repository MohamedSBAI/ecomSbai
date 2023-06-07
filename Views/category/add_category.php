<?php 
    
    $title = " Ajouter une categorie";
    ob_start(); 
?>
    <div class="container">
      <form action="category_action.php?action=addCat" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label" plaseholser>Nom:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Entrez produit nom">
          </div>
          <label for="role" class="col-sm-2 col-form-label">Parent:</label>
          <div class="col-sm-10">
             <select class="form-control" id="parent" name="parent">
            <?php  
            foreach($categorys as $category):?>
              <option value="<?=$category->name?>"><?=$category->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <label for="role" class="col-sm-2 col-form-label">Description:</label>
          <div class="col-sm-10">
          <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
          </div>
      </div>
    </div> 
        <button type="submit" class="btn btn-primary mb-5">Ajouter</button>
      </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-ZMkVr8xX6yQn2j+XlVYJv2+qz5PAWb+L+5u/7l2s4fV4JzgjkhmUOx6dRZq1mU0r"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
<?php $content = ob_get_clean(); ?>
<?php include('admin-dashboard.php'); ?>