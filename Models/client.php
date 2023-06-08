<?php 
include_once '../DataBase/db.php';

function loginClient($email,$password){
    $pdo = DbConnection();
    return $pdo -> query("SELECT * FROM client WHERE email = '$email' AND password = '$password' ")->fetchAll(PDO::FETCH_OBJ);
}

function listCat (){
    $pdo = DbConnection();
    return $pdo -> query("SELECT id, name,description,parent, DATE_FORMAT(created_at, '%d-%m-%Y') as created_at FROM category  ORDER BY id" )->fetchAll(PDO::FETCH_OBJ);
}
function getCat($id){
    $pdo = DbConnection();
    return $pdo -> query("SELECT id, name,description,parent  FROM category WHERE id= $id " )->fetch(PDO::FETCH_OBJ);
}



function addClient($name, $email,$password){
    $pdo = DbConnection();
    $stmt = $pdo->prepare('INSERT INTO client(name, email, password) VALUES (?,?,?)');
    return $stmt->execute([$name,$email,$password]);
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