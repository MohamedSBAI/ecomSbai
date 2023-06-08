<?php 
    require_once '../Controllers/client_controller.php';
    //routeur
    session_start();
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'login':
                if(loginClientAction() == "Invalid email or password.") {
                    $alertMessage = "Invalid email or password.";
                    header("location:signup.php?alertMessage={$alertMessage}");
                } else {
                    $data = loginClientAction();
                    $_SESSION['user_name'] = $data['name'];
                    // $_SESSION['user_img'] = $data['image'];
                    
                    header("Location: ../index.html");
                    exit;
                }
                break;
            case 'listCat':
                listCatAction();
                break;
            case 'addClient':
                addClientAction();
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