<?php 
    require_once '../Controllers/product_controller.php';
    //routeur
    session_start();
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'admin_dashboard':
                header('location:admin-dashboard.php');
                break;
            case 'loginPage':
                header('location:login.php');
                break;
            case 'login':
                if(loginAction() == "Invalid email or password.") {
                    $alertMessage = "Invalid email or password.";
                    header("location:login.php?alertMessage={$alertMessage}");
                } else {
                    $data = loginAction();
                    $_SESSION['user_name'] = $data['name'];
                    $_SESSION['user_img'] = $data['image'];
                    include_once('dashboard.php');
                    exit;
                }
                break;
            case 'listProduct':
                listProductssAction();
                break;
            case 'dashboard':
                dashboardAction();
                break;
            case 'addProduct':
                addProductAction();
                break;
            case 'addProductPage':
                getcategorysAction();
                
                break;
            case 'viewUser':
                viewUserAction();
                require_once('../Views/Utilisateur/view_utilisateur.php');
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