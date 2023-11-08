<?php
session_start();
if ($_SESSION ['logueado'])
{
 include_once 'upload_image.php';
 $product=$_POST['producto'];
 $price=$_POST['precio'];
 $category=$_POST['categoria'];
 include_once("config_products.php");

//include_once ("insert_products.php");

try {
    $pdo = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$link = new Db();
$path_img=$directorio.$nombre_img;
$sql="insert into products (product_name,price,id_category,image) values
 (:product,:price,:category,:path_img)";
 $stmt = $link->prepare($sql);
 $stmt->bindValue(':product', $product);

 $stmt->bindValue(':price', $price);
 $stmt->bindValue(':category', $category);
 $stmt->bindValue(':path_img', $path_img);
 if ( $stmt->execute()) {
 ?>
 <script>
 alert("Producto Ingresado!");
 window.location="insert_products.php";
 </script>
 <?php
 }

//$sql = "insert into products(product_name, price, id_category,image) VALUES('pizza de piña',10000,1,'img/pizza-con-piña.jpg');";

//$stmt = $pdo->prepare($sql);
        
//$stmt->execute();
                    
}
?>