<?php 
include_once '../DataBase/db.php';

function login($email,$password){
    $pdo = DbConnection();
    return $pdo -> query("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND role_id = 1")->fetchAll(PDO::FETCH_OBJ);
}

function ListUsers (){
    $pdo = DbConnection();
    return $pdo -> query("SELECT users.id, users.name, users.email, users.picture, DATE_FORMAT(users.created_at, '%d-%m-%Y') as created_at, role.name AS role_name FROM users JOIN role ON users.role_id = role.id ORDER BY users.id" )->fetchAll(PDO::FETCH_OBJ);
}

function countUsers(){
    $pdo = DbConnection();
    $count = $pdo->query("SELECT count(*) FROM users")->fetchColumn();
    return $count;
}

function getUser($id){
    $pdo = DbConnection();
    return $pdo -> query("SELECT users.id, users.name, users.email, users.picture, DATE_FORMAT(users.created_at, '%d-%m-%Y') as created_at, role.name AS role_name FROM users JOIN role ON users.role_id =
    role.id WHERE users.id = '$id'")->fetchAll(PDO::FETCH_OBJ);
}

function addUser($name, $email, $password, $role , $image){
    $pdo = DbConnection();
    // Prepare the SQL statement to insert the user into the database
    $stmt = $pdo->prepare('INSERT INTO users (name, email, password, role_id, picture, created_at) VALUES (?, ?, ?, ?, ?, ?)');
    return $stmt->execute([$name,$email,$password,$role,$image,null]);
}


function updateUser($id, $name, $email, $password, $role_id){
    $pdo = DbConnection();
    $pdo -> exec("UPDATE users SET name = '$name', email = '$email', password = <PASSWORD>', role_id = '$role_id' WHERE id = '$id'");
}

function deleteUser($id){
    $pdo = DbConnection();
    return  $pdo -> exec("DELETE FROM users WHERE id = '$id'");
}
     