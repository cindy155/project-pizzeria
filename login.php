<?php
include_once("config_login.php");
try {
$pdo = new PDO("mysql:host=".SERVER_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSWORD);
 // set the PDO error mode to exception
 $pdo->setAttribute
 (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "conexion exitosa"; 
}
catch(PDOException $e) {
  echo "Conexion fallida: " . $e->getMessage();
}

$usr=$_POST['username'];
$pass=$_POST['password'];
$hashed_pass=hash('sha256',$pass);
$sql="SELECT * FROM users WHERE ((USERNAME=:usr) or (EMAIL=:usr)) AND (PASSWORD=:hashed_pass) and (ACTIVE='si')";
//vale oro,vamos a venderlo  /

$stmt = $pdo->prepare($sql);
// saneo(prepare),vinculo(bindValue) y ejecuto(execute)/

$stmt->bindValue(':usr',$usr);
$stmt->bindValue(':hashed_pass', $hashed_pass);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row == 0) {
    echo "Login invalido";
    
    } else {
      echo "Bienvenido";
    }
?>
