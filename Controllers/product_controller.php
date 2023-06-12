<?php
include_once '../Models/product.php';

// Define the loginAction function to confirmation login
function getcategorysAction() {
    $categorys=getcatigorys();
    include_once('../Views/product/add_product.php');
}

function listProductssAction(){
    $products = listProducts();
    require_once('../Views/product/list_products.php');
}

function viewProductAction(){
    $id = $_GET['id'];
    $products = getProduct($id);
    require_once('../Views/product/show_product.php');
}

function dashboardAction() {
    $countUsers = countUsers();
    require_once '../Views/dashboard.php';
}

function addProductAction(){
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $cat = $_POST['cat'];
    $price = $_POST['price'];
    $slug = $_POST['slug'];
    $desc = $_POST['desc'];
    $image = $_FILES['picture']['name'];
    $upload_path ='../assets/img/user/'.$image;
    $tmp_name = $_FILES['picture']['tmp_name'];
    move_uploaded_file($tmp_name,"$upload_path");
    $addProduct = addProduct($name, $stock, $cat,$price, $slug,$desc,$image);
    
    if($addProduct == true){
        header('Location:../Views/product_action.php?action=listProduct');
    }else{
        echo "Error";
    }
}


function editProductPageAction(){
    $id = $_GET['id'];
    $proData = getProduct($id);
    $categorys=getcatigorys();
    require_once('../Views/product/edit_product.php');
}
function updateProductAction(){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $cat = $_POST['cat'];
    $price = $_POST['price'];
    $slug = $_POST['slug'];
    $desc = $_POST['desc'];
    $image = $_FILES['picture']['name'];
    $upload_path ='../assets/img/user/'.$image;
    $tmp_name = $_FILES['picture']['tmp_name'];
    move_uploaded_file($tmp_name,"$upload_path");
    $editProduct = updateProduct($id, $name, $stock, $cat,$price
    , $slug,$desc,$image);
    
    if($editProduct == true){
        header('Location:../Views/product_action.php?action=listProduct');
    }else{
        echo "Error";
    }
}

function deleteProductAction(){
    }






function destroyProductAction(){
    $id = $_GET['id'];
    $deleteProduct = deleteProduct($id);
    if($deleteProduct == true){
    header('Location:../Views/product_action.php?action=listProduct');
    }else{
        echo "Error";
    }
}


        






