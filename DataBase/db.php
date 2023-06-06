<?php 
function DbConnection(){
    try{
        $pdo = new PDO('mysql:dbname=uthr;host=localhost','root','');
        return $pdo ;
    }catch(PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }
}
?>