<?php
include_once '../Models/client.php';

function listClientAction(){
    $clients = listClient();
    require_once('../Views/client/list_client.php');
}
//
function loginClientAction() {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $clientData = loginClient($email, $password);
if(!empty($clientData)) {
    return array('name' => $clientData[0]->name);
    
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

function destroyClientAction(){
    $id = $_GET['id'];
    $deleteClient = deleteClient($id);
    if($deleteClient == true){
    header('Location:../Views/client_action.php?action=listClient');
    }else{
        echo "Error";
    }
}


        






