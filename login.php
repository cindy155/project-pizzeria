<?php
# conectamos con la base de datos, el bloque try catch maneja los errores en forma de excepciones
include_once("config_login.php");
try {
$pdo = new PDO("mysql:host=".SERVER_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSWORD);
 // set the PDO error mode to exception
 $pdo->setAttribute
 (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "conexion exitosa"; 
}
catch(PDOException $e) {
  echo "Conexion fallida: " . $e->getMessage();
}

$usr = $_POST['username'];
$pass = $_POST['password'];
$hashed_pass = hash('sha256', $pass);
$sql = "SELECT * FROM users WHERE ((USERNAME=:usr) or (EMAIL=:usr)) AND (PASSWORD=:hashed_pass) and (ACTIVE='si')";
//vale oro,vamos a venderlo  /

$stmt = $pdo->prepare($sql);
// saneo(prepare),vinculo(bindValue) y ejecuto(execute)/

$stmt->bindValue(':usr', $usr);
$stmt->bindValue(':hashed_pass', $hashed_pass);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row == 0) {
  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
  </body>

  </html>

  <div class="alert alert-danger">
    <a href="login.html" class="close" data-dismiss="alert">×</a>
    <div class="text-center">
      <h5><strong>¡Error!</strong> Login Invalido.</h5>
    </div>
  </div>
  <?php

} else {
  //variable de sesion inicializo la variable. se usa para redireccionar.
  session_start();
  $_SESSION['username'] = $usr;
  date_default_timezone_set("America/Argentina/Buenos_Aires");
  $_SESSION["time"]=date('H:i:s');
  $_SESSION['logueado']=true;
  header("location:welcome.php");
}

?>
