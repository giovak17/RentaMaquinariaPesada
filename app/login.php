<?php

require '../data/conexionBD.php';
if (isset($_POST["submit"])){
  $usuariocorreo = $_POST["usuariocorreo"];
  $contrasena = $_POST["txtContrasena"];

  // $result = mysqli_query($conn, "select * from usuarios where nickname = '$nicknamecorreo' or correo = '$nicknamecorreo'");
  $result = mysqli_query($conn, 
"select 
    u.nickname as nickname,
    u.contrasena as contrasena,
    u.tipo_Usu as tipoUsuario
from usuarios as u
where u.nickname = '$usuariocorreo'
or u.correo = '$usuariocorreo';");

//   $result = mysqli_query($conn, 
// "select 
//   c.codigo as id,
//   c.usuario as nickname,
//     u.contrasena as contrasena,
//     u.tipo_Usu as tipoUsuario
// from usuarios as u
// inner join clientes as c
// on c.usuario = u.nickname
// where c.usuario = '$usuariocorreo'
// or u.correo = '$usuariocorreo';");
//
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0){
    if($contrasena == $row["contrasena"]){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["nickname"];
      if($row["tipoUsuario"] == "CLI"){
        header("Location: ../view/usuario/index.php");

      }
      elseif ($row["tipoUsuario"] == "VEND") {
        header("Location: ../view/menuAdmin/MenuAdmin.php");

      }
      elseif ($row["tipoUsuario"] == "ADMIN") {
        header("Location: ../view/menuAdmin/MenuAdmin.php");
      }
      

    }
    else {
      echo
      "<script> alert('Contraseña incorrecta.');</script>";

    }

  }
  else {
    echo
    "<script>alert('El usuario no esta registrado.');</script>";
  }

}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="stylesheet" href="../css/login.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <div class = "backButton">
      <a class= href= "../view/usuario/index.php" > Back </a>      
    </div>
    
    <div class="container">
        <div class="title">Iniciar sesión</div>
        <div class="content">
            <form action="#" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Usuario o Correo</span>
                        <input type="text" id="usuariocorreo" name="usuariocorreo" placeholder="Introduzca su usuario o correo" required>
                    </div>



                    <div class="input-box">
                        <span class="details">Contraseña</span>
                        <input type="password" id="txtContrasena" name="txtContrasena" placeholder="Introduzca su contraseña" required>
                    </div>

                </div>

                <div class="account">
                <p>¿Nuevo aqui? <a href = "registration.php">Crear una cuenta</a></p>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Continuar">

                </div>
            </form>
        
        </div>
    </div>


</body>
</html>
