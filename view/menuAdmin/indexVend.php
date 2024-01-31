<?php 
require "../../data/conexionBD.php";
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
$result = mysqli_query($conn, "select nickname from usuarios where nickname = '$id'");

  $row = mysqli_fetch_assoc($result);
}

else{
  // header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vendedor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/style.css" rel="stylesheet">
  </head>
  <body>
    <h2>Bienvenido 
      <?php
      if(!empty($row["nickname"])){
      echo $row["nickname"];

      }
      ?>
     
      </h2>

    <h1>Vendedores</h1>
    <a href = "logout.php">Logout</a>
  
  </body>
</html>
