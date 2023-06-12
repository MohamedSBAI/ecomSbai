<?php 
    require_once '../Controllers/product_controller.php';
    //routeur
    session_start();
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'listProduct':
                listProductssAction();
                break;
            case 'viewProduct':
                viewProductAction();
                break;
            case 'addProduct':
                addProductAction();
                break;
            case 'addProductPage':
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