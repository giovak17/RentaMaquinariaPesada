<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-o5k5qI6MgdyM+9DXiJSJ47D0K9ntmXo1E/hFg/lLJzzxg4IF5y3yPR5gW7iTLJoW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  </head>
  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg" style="background-color: #F5DE22;">
        <div class="container">
          <a href="index.php">
            <img class="navbar-brand" src="../../img/icons/logo.svg" width="40px" height="40px">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
              </li>
            </ul>
          </div>
          <ul class="navbar-nav">
            <?php if (!empty($_SESSION["id"])): ?>
              <!-- Si el usuario está autenticado, muestra su nombre y opción de logout -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  Bienvenido(a), <?php echo $_SESSION["id"]; ?>
                  <?php
                    include_once '../../data/conexionDB.php';
                    $dataset = mysqli_query($conn,"select codigo FROM clientes WHERE usuario = '".$_SESSION["id"]."';");
                    while ($registro = mysqli_fetch_assoc($dataset)) {
                      $clCod = $registro['codigo'];
                    } 
                  ?>
                
                </a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="historial.php">Historial</a>
                  <a class="dropdown-item" href="seguimiento.php">Seguimiento</a>
                  <a class="dropdown-item" href="idxAdeudos.php">Adeudos</a>
                  <a class="dropdown-item" href="idxReservaCurso.php">Reservas en curso</a>
                  <a class="dropdown-item" href="../../app/logout.php">Cerrar sesión</a>
                </div>
              </li>
            <?php else: ?>
              <!-- Si el usuario no está autenticado, muestra el botón de login -->
              <li class="nav-item">
                <a class="nav-link" href="../../app/login.php">Login</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="mostrarCarrito.php">
                <img src="../../img/icons/cart.svg" width="30px" height="30px">(<?php echo (empty($_SESSION['carrito'])) ? 0 : count($_SESSION['carrito']) ?>)
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
    <!-- Navbar -->