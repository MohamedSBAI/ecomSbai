<?php 
    require_once '../Controllers/client_controller.php';
    //routeur
    session_start();
    $listcontrolle ="";
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'login':
                if(loginClientAction() == "Invalid email or password.") {
                    $alertMessage = "Invalid email or password.";
                    header("location:signup.php?alertMessage={$alertMessage}");
                } else {
                    $data = loginClientAction();
                    $_SESSION['client_name'] = $data['name'];
                    $_SESSION['client_img'] = $data['image'];
                    
                    header("Location: list_controll.php");
                    exit;
                }
                break;
            case 'listClient':
                listClientAction();
                break;
            case 'addClient':
                addClientAction();
                break;
            case 'destroyClinet':
                destroyClientAction();
                break;
            case 'deleteClientPage':
                include_once('client/delete_client.php');
                break;
                }
    }else{
        
    }
?>