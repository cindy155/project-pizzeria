<?php
include_once ("insert_products.php");

try {
    $pdo = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$sql = "insert into products(product_name, price, id_category,image) VALUES('paisaje',2700,1,'img/mmm.jpg');";

$stmt = $pdo->prepare($sql);
        
$stmt->execute();
                    
$data= $stmt->fetchAll(); 
foreach($data as $row) {
?>