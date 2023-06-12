<?php
include_once '../Models/users.php';

// Define the loginAction function to confirmation login
function loginAction(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userData = login($email, $password);
if(!empty($userData) && $userData[0]->role_id == 1) {

    return array('name' => $userData[0]->name,'image' =>$userData[0]->picture);
    
} else {

    return "Invalid email or password.";
}
}

function listUsersAction(){
    $users = listUsers();
    require_once('../Views/Utilisateur/list_utilisateur.php');
}

function viewUserAction(){
    $id = $_GET['id'];
    $user = getUser($id);
    require_once('../Views/Utilisateur/view_utilisateur.php');
}

function dashboardAction() {
    $countUsers = countUsers();
    require_once '../Views/dashboard.php';
}

function addUserAction(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $image = $_FILES['picture']['name'];
    $upload_path ='../assets/img/user/'.$image;
    $tmp_name = $_FILES['picture']['tmp_name'];
    move_uploaded_file($tmp_name,"$upload_path");
    $addUser = addUser($name, $email, $password, $role,$image);
    
    if($addUser == true){
        header('Location:../Views/action.php?action=listUsers');
    }else{
        echo "Error";
    }
}

function editUserAction(){
    $id = $_GET['id'];
    $userData = getUser($id);
    require_once('../Views/Utilisateur/edit_user.php');
}

function updateUserAction(){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['new_password'];
    $role = $_POST['role'];
    $image = $_FILES['picture']['name'];
    $upload_path ='../assets/img/user/'.$image;
    $tmp_name = $_FILES['picture']['tmp_name'];
    move_uploaded_file($tmp_name,"$upload_path");
    $updateUser = updateUser($id, $name, $email, $password, $role,$image);
    if($updateUser == true){
        header('Location:../Views/action.php?action=listUsers');
    }else{
        echo "Error";
    }
}
function destroyUserAction(){
    $id = $_GET['id'];
    $deleteUser = deleteUser($id);
    if($deleteUser == true){
    header('Location:../Views/action.php?action=listUsers');
    }else{
        echo "Error";
    }
}


        






