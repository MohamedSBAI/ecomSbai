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
            case 'destroyCat':
                destroyCatAction();
                break;
            case 'deletecatPage':
                include_once('category/delete_category.php');
                break;
            case 'editCatPage':
                editCatPageAction();
                break;
            case 'editCat':
                updateCatAction();
                break;  
                }
    }else{
        
    }
?>