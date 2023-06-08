<?php
include_once '../Models/client.php';

function listCatAction(){
    $categorys = listCat();
    require_once('../Views/category/list_category.php');
}
//
function loginClientAction() {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userData = loginClient($email, $password);
if(!empty($userData)) {
    return array('name' => $userData[0]->name);
    
} else {

    return "Invalid email or password.";
}
}
//
function addClientAction(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $addClint = addClient($name, $email,$password);
    
    if($addClint == true){
        header('Location:signup.php');
    }else{
        echo "Error";
    }
}

function editCatPageAction(){
    $id = $_GET['id'];
    $catData = getCat($id);
    $categorys=getcatigorys();
    require_once('../Views/category/edit_category.php');
}
function updateCatAction(){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $parent = $_POST['parent'];
    $desc = $_POST['desc'];
    $editCat = editCat($id,$name,$parent,$desc);
    if($editCat == true){
        header('Location:../Views/category_action.php?action=listCat');
    }else{
        echo "Error";
    }
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
function destroyCatAction(){
    $id = $_GET['id'];
    $deleteCat = deleteCat($id);
    if($deleteCat == true){
    header('Location:../Views/category_action.php?action=listCat');
    }else{
        echo "Error";
    }
}


        






