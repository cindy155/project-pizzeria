<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navtop">
        <div>
            <a href="logout.php">logout</a>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php

session_start();
if($_SESSION['logueado']) {
echo 'bienvenido/a ' .$_SESSION['username'];
echo "<br>";
echo "hora de conexion " .$_SESSION["time"];
echo "<br>";
echo "<br>";
//echo $table = "<table>"."<thead>"."<tr>"."<th>Id</th>"."<th>Producto</th>"."<th>Categoria</th>"."<th>Precio</th>"."<th>Fecha de Alta</th>"."</tr>"."</thead>";

$table = "<table><thead><tr><th>Id</th><th>Producto</th><th>Categoria</th><th>Precio</th><th>Fecha de Alta</th></tr></thead>";
}

include_once("config_products.php");
          try {
            $pdo = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
            // set the PDO error mode to exception
            $pdo->setAttribute
            (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "conexion exitosa"; 
          } catch (PDOException $e) {
            // echo "Conexion fallida: " . $e->getMessage();
          }
          $sql= "SELECT p.id_product,c.category_name, p.product_name,p.price,date_format(p.start_date,'%d/%m/%Y') AS date from categories c INNER JOIN products p on p.id_category=c.id_category;";
          $stmt= $pdo->prepare($sql);
          //le pasamos el metodo prepare al objeto $pdo, sanea la instruccion sql
          $stmt->execute();
          $data=$stmt->fetchAll();
          //es la variable que atrapa la info de $sql. 
          echo $table;
          echo "<tbody>";

          foreach($data as $row)
        {
         echo "<tr>";
         echo "<td>";
         echo $row ['id_product'];
         echo "</td>";
        
         echo "<td>";
         echo $row ['category_name'];
         echo "</td>";

         echo "<td>";
         echo $row ['product_name'];
         echo "</td>";

         echo "<td>";
         echo $row ['price'];
         echo "</td>";

         echo "<td>";
         echo $row ['date'];
         echo "</td>";

         echo "</td>";
         echo "</tr>";

        }
        echo "</tbody>";
        echo "</table>";

?>
