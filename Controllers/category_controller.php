<?php
include_once '../Models/category.php';

function listCatAction(){
    $categorys = listCat();
    require_once('../Views/category/list_category.php');
}

function getcategorysAction() {
    $categorys=getcatigorys();
    include_once('../views/category/add_category.php');
}

function addCatAction(){
    $name = $_POST['name'];
    $parent = $_POST['parent'];
    $desc = $_POST['desc'];
    $addCat = addCat($name, $parent,$desc);
    
    if($addCat == true){
        header('Location:../Views/category_action.php?action=listCat');
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


        






