<?php 
     $title =  '<a href="client_action.php?action=listClient" ><i class="fa fa-arrow-left" aria-hidden="true"></i>
     Previous</a>';
    ob_start(); 
?>
<div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5 class="card-title">Supprimer</h5>
    <p class="card-text">Voulez vous vraimant supprimer  ?</p>
    <a href="client_action.php?action=destroyClinet&id=<?php echo $_GET['id']?>" class="btn btn-outline-danger">Confirme</a>
    <a href="client_action.php?action=listClient" class="btn btn-outline-primary">Annuler</a>
  </div>
  <div class="card-footer text-muted">
    
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('admin-dashboard.php'); ?>