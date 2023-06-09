<?php 
    require_once '../Controllers/users_controller.php';
    require_once '../Controllers/client_controller.php';
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
                    //include_once('dashboard.php');
                    header("Location:dashboard.php");
                    
                    exit;
                }
                break;
            case 'loginClient':
                    if(loginClientAction() == "Invalid email or password.") {
                        $alertMessage = "Invalid email or password.";
                        header("location:signup.php?alertMessage={$alertMessage}");
                    } else {
                         $data = loginClientAction();
                         $_SESSION['client_name'] = $data['name'];
                         //$_SESSION['client_img'] = $data['image'];
                        header('location:../index.php');
                    exit;
                        
                    }
                     
                    break;
                
            case 'listUsers':
                listUsersAction();
                break;
            case 'dashboard':
                dashboardAction();
                break;
            case 'addUser':
                addUserAction();
                break;
            case 'addUserPage':
                include_once('Utilisateur/add_user.php');
                break;
            case 'viewUser':
                viewUserAction();
                require_once('../Views/Utilisateur/view_utilisateur.php');
                break;
            case 'destroyUser':
                destroyUserAction();
                break;
            case 'deleteUserPage':
                include_once('Utilisateur/delete_user.php');
                break;
            case 'editUserPage':
                editUserAction();
                break;
            case 'editUser':
                updateUserAction();
                break;  
            case 'logout':
                session_destroy();
                header('location:../index.php');
                break;
            }
    }else{
        
    }
?>