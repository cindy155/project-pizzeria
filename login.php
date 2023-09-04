<?php
include_once("config_login.php");
$pdo = new PDO("mysql:host=".SERVER_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSWORD);
echo "conexion exitosa";
?>
