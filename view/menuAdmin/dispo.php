<?php require '../../data/conexionDB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/admin.css">
    <script defer src="popModal.js"></script>
</head>
<body>
    
<header>
<h1 class="letraHeader"><font face=”Cambria” size=5>Administrador</font></h1>
        <nav id="aveces">
            <ul>
            <li><a href="#">Dashboard</a>
                    <ul style="--cantidad-items: 2">
                        <li><a href="estadisticas.php"><font face=”Cambria” size=4>Estadisticas</font></a></li>
                        <li><a href="maquinasAlmacenadas.php"><font face=”Cambria” size=4>MaquinasPorAlmacen</font></a></li>
                    </ul>
                </li>
                <li><a href="#"><font face=”Cambria” size=4>Maquinaria</font></a>
                    <ul style="--cantidad-items: 6.5">
                       
                        <li><a href="categoria.php"><font face=”Cambria” size=4>Categorias</font></a></li>
                        <li><a href="dispo.php"><font face=”Cambria” size=4 >Disponibilidad</font></a></li>
                        <li><a href="mantenimiento.php"><font face=”Cambria” size=4>Mantenimiento</font></a></li>
                        <li><a href="agregarm.php"><font face=”Cambria” size=4>Agregar maquina</font></a></li>
                        <li><a href="agregarmarca.php"><font face=”Cambria” size=4>Agregar marca</font></a></li>
                        <li><a href="agregarmodelo.php"><font face=”Cambria” size=4>Agregar modelo</font></a></li>
                    </ul>
                </li>
                <li id="reservas"><a href="#">Reservas</a>
                    <ul style="--cantidad-items: 8">
                        <li><a href="confirmacion.php">Confirmacion de reservas</a></li>
                        <li><a href="maquinasReservadas.php">Maquinas reservadas</a></li>
                        <li><a href="reservasRep.php">Reservas de representantes</a></li>
                        <li><a href="informacionRe.php">Informacion de reservas por cliente</a></li>
                        <li><a href="pagosRe.php">Pagos por reservas</a></li>
                        <li><a href="estatusRe.php">Estatus de reservas</a></li>
                    </ul>
                </li>
                <li><a href="#"><font face=”Cambria” size=4>Choferes</font></a>
                    <ul style="--cantidad-items: 2.5">
                        <li><a href="agregarch.php"><font face=”Cambria” size=4>Agregar Choferes</font></a></li>
                        <li><a href="entrega.php"><font face=”Cambria” size=4>Entregas de maquinaria</font></a></li>
                    </ul>
                    <li><a href="verRepresentantes.php"><font face=”Cambria” size=4>Representantes</font></a>
                    <li><a href="../../app/login.php"><font face=”Cambria” size=4>Cerrar Sesion</font></a>
            </ul>
        </nav>
    </header>
    <main>
    <h1><font face=”Cambria” size=6>  Disponibilidad de maquinas </font></h1>
        <div class = "flex-container">
            <div class = "container" style = "margin:0;">
            <br>
            <br>
            <div class = "row">
            <table class = "table">
              <tr class = "table-dark">
                  <td>Código</td>
                  <td>Precio por día</td>
                  <td>Número de serie</td>
                  <td>Almacen</td>
                  <td>Modelo</td>
                  <td> Estatus de la máquina </td>
                 
              </tr>
    
              <?php
              $i = 1;
              
    
              $query = "select 
              mq.codigo as Codigo,
              mq.`precioDia` as PrecioDia,
              mq.`numSerie` as 'Numero de serie',
              mq.almacen as Almacen,
              md.nombre as Modelo,
              mq.`estatusM` as Estatus
              from maquinas as mq
              inner join modelos as md on mq.modelo = md.num
              where `estatusM` = 'DISP'";
              $rows = mysqli_query($conn, $query);
    
              ?>
              <?php foreach($rows as $row) : ?>
              <tr>
                <td><?php echo $row["Codigo"]; ?></td>
                <td><?php echo $row["PrecioDia"]; ?></td>
                <td><?php echo $row["Numero de serie"]; ?></td>
                <td><?php echo $row["Almacen"]; ?></td>
                <td><?php echo $row["Modelo"]; ?></td>
                <td><?php echo $row["Estatus"]; ?></td>
    
              </tr>
              
              <?php endforeach; ?>
    
              </table>
              </div>
              </div>
              </div>
              <br>
              
    </main>
</body>
</html>

