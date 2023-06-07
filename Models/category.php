<?php 
include_once '../DataBase/db.php';

function getcatigorys(){
    $pdo = DbConnection();
    return $pdo -> query("SELECT category.name,category.id FROM category")->fetchAll(PDO::FETCH_OBJ);
}

function listCat (){
    $pdo = DbConnection();
    return $pdo -> query("SELECT id, name,description,parent, DATE_FORMAT(created_at, '%d-%m-%Y') as created_at FROM category  ORDER BY id" )->fetchAll(PDO::FETCH_OBJ);
}

function getProduct($id){
    $pdo = DbConnection();
    return $pdo -> query("SELECT p.id, p.name,p.slug,p.stock, p.description, p.price, p.cat_id as cat_id,DATE_FORMAT(p.created_at, '%d-%m-%Y') as created_at, p.picture FROM product p  WHERE p.id=$id")->fetch(PDO::FETCH_OBJ);
}

function addCat($name, $parent,$desc){
    $pdo = DbConnection();
    $stmt = $pdo->prepare('INSERT INTO category(name, description, parent, created_at) VALUES (?,?,?,?)');
    return $stmt->execute([$name,$desc,$parent,null]);
}


function updateProduct($id, $name, $stock, $cat,$price, $slug,$desc,$image){
    $pdo = DbConnection();
    // Prepare the SQL statement to insert the user into the database
    $stmt = $pdo->prepare('UPDATE product SET name=?, description=?, slug=? ,price=?,stock=?,cat_id=?,created_at=?,picture=? WHERE id=?');
    return $stmt ->execute([$name,$desc,$slug,$price,$stock, $cat,null ,$image,$id]);

}

function deleteProduct($id){
    $pdo = DbConnection();
    return  $pdo -> exec("DELETE FROM product WHERE id = '$id'");
}
     