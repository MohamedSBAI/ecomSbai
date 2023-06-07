<?php 
    require_once '../Controllers/category_controller.php';
    //routeur
    session_start();
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'listCat':
                listCatAction();
                break;
            case 'addCat':
                addCatAction();
                break;
            case 'addCatPage':
                getcategorysAction();
                break;
            case 'destroyProduct':
                destroyProductAction();
                break;
            case 'deleteProductPage':
                include_once('product/delete_product.php');
                break;
            case 'editProductPage':
                editProductPageAction();
                break;
            case 'editProduct':
                updateProductAction();
                break;  
                }
    }else{
        
    }
?>