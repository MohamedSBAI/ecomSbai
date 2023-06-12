<?php 
include_once '../DataBase/db.php';

function loginClient($email,$password){
    $pdo = DbConnection();
    return $pdo -> query("SELECT * FROM client WHERE email = '$email' AND password = '$password' ")->fetchAll(PDO::FETCH_OBJ);
}

function listClient (){
    $pdo = DbConnection();
    return $pdo -> query("SELECT id, name,email FROM client  ORDER BY id" )->fetchAll(PDO::FETCH_OBJ);
}


function addClient($name, $email,$password){
    $pdo = DbConnection();
    $stmt = $pdo->prepare('INSERT INTO client(name, email, password) VALUES (?,?,?)');
    return $stmt->execute([$name,$email,$password]);
}

function deleteClient($id){
    $pdo = DbConnection();
    $stmt = $pdo->prepare('DELETE FROM client WHERE id = ?');
    return $stmt -> execute([$id]);
}   