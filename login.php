<?php
$usr=$_POST["username"];
$pass=$_POST["password"];
//echo $usr;
//echo $pass;

if((strcmp($usr,"maria")==0) && (strcmp($pass,"123456")==0)) {
    echo "Bienvenido";
} else {
    echo "acceso denegado";
}
    
?>
