<?php 
    $title = '<a href="product_action.php?action=listProduct" ><i class="fa fa-arrow-left" aria-hidden="true"></i>
    Previous</a>';
    ob_start();
?>
<div class="container">
  <form action="category_action.php?action=editCat" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?=$catData->id;?>">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label" plaseholser>Nom:</label>
          <div class="col-sm-10">
            <input type="textarea" class="form-control" value="<?=$catData->name;?>" id="name" name="name" placeholder="Entrez produit nom">
          </div>
        </div>
        <div class="form-group row">
          <label for="parent" class="col-sm-2 col-form-label">Parent:</label>
          <div class="col-sm-10">
          <select class="form-control" id="parent" name="parent">
  <?php foreach($categorys as $category):?>
    <option value="<?=$category->name?>" <?php if($category->name == $catData->parent) echo "selected"; ?>>
      <?=$category->name?>
    </option>
  <?php endforeach;?>
</select>
          </div></div>
<div class="form-group row">
          <label for="role" class="col-sm-2 col-form-label">Description:</label>
          <div class="col-sm-10">
          <textarea class="form-control" id="desc" name="desc" rows="3"><?php echo($catData->description);?></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Modifier produit</button>
  </form>
</div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-ZMkVr8xX6yQn2j+XlVYJv2+qz5PAWb+L+5u/7l2s4fV4JzgjkhmUOx6dRZq1mU0r"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<?php $content = ob_get_clean(); ?>
<?php include('admin-dashboard.php'); ?>