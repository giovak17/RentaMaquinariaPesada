<?php
require '../data/conexionBD.php';
if(isset($_POST["submit"])){
  $nombre = ucwords($_POST["txtNombre"]);
  $apPat = ucwords($_POST["txtApPat"]);
  $apMat = ucwords($_POST["txtApMat"]);
  $numTel = $_POST["txtNumTel"];
  $colonia = ucwords($_POST["txtColonia"]);
  $calle = ucwords($_POST["txtCalle"]);
  $num = $_POST["numNumero"];
  $cp = $_POST["numCP"];
  $usuario = $_POST["txtUsuario"];
  $correo = $_POST["txtCorreo"];
  $contrasena = $_POST["txtContrasena"];
  $confContrasena = $_POST["txtConfContrasena"];


  $usuarioDuplicado = mysqli_query($conn, "select * from usuarios where nickname = '$usuario';");
  $correoDuplicado = mysqli_query($conn, "select * from usuarios where correo = '$correo';");
  $numTelDuplicado = mysqli_query($conn, "select * from clientes where numTel = '$numTel';");

  if (mysqli_num_rows($usuarioDuplicado) > 0){
    echo
    "<script>alert('Ya hay una cuenta con este usuario.');</script>";
  }
else if (mysqli_num_rows($correoDuplicado) > 0){
  echo
  "<script>alert('Ya hay una cuenta con este correo electrónico.');</script>";

}
else if (mysqli_num_rows($numTelDuplicado) > 0) {
  echo
  "<script>alert('Ya hay una cuenta con este número de teléfono.');</script>";
}
  else {

    if($contrasena == $confContrasena){

      // Insert en multiples tablas
      // $query = "insert into usuarios (name, nickname, correo, contrasena) values ('$name','$nickname','$correo','contrasena')";
      $query = "insert into usuarios (nickname, correo, contrasena, tipo_Usu) values
      ('$usuario', '$correo', '$contrasena', 'CLI');";

      $query1 = "insert into clientes (nombre, apPat, apMat, numTel, colonia, calle, num, cp, usuario) 
      values ('$nombre', '$apPat', '$apMat', '$numTel', '$colonia', '$calle', '$num', '$cp','$usuario');";



      mysqli_query($conn, $query);
      mysqli_query($conn, $query1);
      header("Location: login.php");
      echo 
      "<script>alert('Registro exitoso');</script>";
    }
    else {
      echo 
      "<script>alert('La contraseña y la confirmacion no son iguales.');</script>";
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/registro.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <div class="container">
        <div class="title">Registro</div>
        <div class="content">
            <form action="registration.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nombre(s)</span>
                        <input type="text" id="txtNombre" name="txtNombre" placeholder="Introduzca su nombre" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Apellido Paterno</span>
                        <input type="text" id="txtApPat" name="txtApPat" placeholder="Introduzca su apellido paterno" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Apellido Materno</span>
                        <input type="text" id="txtApMat" name="txtApMat" placeholder="Introduzca su apellido paterno">
                    </div>

                    <div class="input-box">
                        <span class="details">Nombre de Usuario</span>
                        <input type="text" id="txtUsuario" name="txtUsuario" placeholder="Introduzca su nombre de usuario" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Correo</span>
                        <input type="text" id="txtCorreo" name="txtCorreo" placeholder="Introduzca su correo" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Numero de Telefono</span>
                        <input type="text" id="txtNumTel" name="txtNumTel" placeholder="Introduzca su numero de telefono" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Colonia</span>
                        <input type="text" id="txtColonia" name="txtColonia" placeholder="Introduzca su colonia de residencia" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Calle</span>
                        <input type="text" id="txtCalle" name="txtCalle" placeholder="Introduzca su calle" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Numero</span>
                        <input type="number" id="numNumero" name="numNumero" placeholder="Introduzca su numero de casa" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Codigo Postal</span>
                        <input type="text" id="numCP" pattern="^\d{5}$" title="Introduzca un codigo postal de 5 digitos." name="numCP" placeholder="Introduzca su codigo postal" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Contraseña</span>
                        <input type="password" id="txtContrasena" name="txtContrasena" placeholder="Introduzca su contraseña" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Confirmar Contraseña</span>
                        <input type="password" id="txtConfContrasena" name="txtConfContrasena" placeholder="Confirme su contraseña" required>
                    </div>

                </div>
                
                <div class="account">
                <p>¿Ya tienes una cuenta? <a href = "login.php">Iniciar sesión</a></p>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Registrarse ">
                </div>
            </form>
        
        </div>
    </div>

    <script>

        var phoneInput = document.getElementById('txtNumTel');
        var myForm = document.forms.myForm;

        phoneInput.addEventListener('input', function (e) {
          var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
          e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });

        myForm.addEventListener('submit', function(e) {
          phoneInput.value = phoneInput.value.replace(/\D/g, '');
          
          e.preventDefault(); // You wouldn't prevent it
        });
            
    </script>

</body>
</html>
