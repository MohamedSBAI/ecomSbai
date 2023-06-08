<?php 
     $title =  '<a href="category_action.php?action=listCat" ><i class="fa fa-arrow-left" aria-hidden="true"></i>
     Previous</a>';
    ob_start(); 
?>
<div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5 class="card-title">Supprimer</h5>
    <p class="card-text">Voulez vous vraimant supprimer  ?</p>
    <a href="category_action.php?action=destroyCat&id=<?php echo $_GET['id']?>" class="btn btn-outline-danger">Confirme</a>
    <a href="category_action.php?action=listCat" class="btn btn-outline-primary">Annuler</a>
  </div>
  <div class="card-footer text-muted">
    
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('admin-dashboard.php'); ?>