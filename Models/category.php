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
function getCat($id){
    $pdo = DbConnection();
    return $pdo -> query("SELECT id, name,description,parent  FROM category WHERE id= $id " )->fetch(PDO::FETCH_OBJ);
}



function addCat($name, $parent,$desc){
    $pdo = DbConnection();
    $stmt = $pdo->prepare('INSERT INTO category(name, description, parent, created_at) VALUES (?,?,?,?)');
    return $stmt->execute([$name,$desc,$parent,null]);
}


function editCat($id,$name,$parent,$desc){
    $pdo = DbConnection();
    $stmt = $pdo->prepare('UPDATE category SET name = ?, description = ?, parent = ? WHERE id = ?');
    return $stmt->execute([$name,$desc,$parent,$id]);
}

function deleteCat($id){
    $pdo = DbConnection();
    $stmt = $pdo->prepare('DELETE FROM category WHERE id = ?');
    return $stmt -> execute([$id]);
}   