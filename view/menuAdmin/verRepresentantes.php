<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require "../../data/conexionDB.php";

if (!isset($_POST['txtOpcion']) && !isset($_POST['txtBuscar'])) {
  $input = "";
}
else{
  $input = $_POST['txtBuscar'];

}
$qry = "
select 
  ciu.nombre as Ciudad,
  al.nombre as Almacen,
  concat(al.colonia, ' ', al.calle, ' ', al.num, ' ', al.cp) as Direccion,
  concat(rr.nombre, ' ', ifnull(concat(rr.apPat,' '),' '), ifnull(concat(rr.apMat,' '),' ')) as RepresentanteDeVentas

from 
  rep_rentas as rr
  inner join almacenes as al on rr.almacen = al.codigo
  inner join ciudades as ciu on al.ciudad = ciu.codigo
where
al.nombre = 'Almacen Everest'
";

if (isset($_POST['btnSubmit'])) {
  $qry = "
select 
  ciu.nombre as Ciudad,
  al.nombre as Almacen,
  concat(al.colonia, ' ', al.calle, ' ', al.num, ' ', al.cp) as Direccion,
  concat(rr.nombre, ' ', ifnull(concat(rr.apPat,' '),' '), ifnull(concat(rr.apMat,' '),' ')) as RepresentanteDeVentas

from 
  rep_rentas as rr
  inner join almacenes as al on rr.almacen = al.codigo
  inner join ciudades as ciu on al.ciudad = ciu.codigo

where
  al.nombre like '%$input%' or al.codigo like '%$input%'";

}


$rr = mysqli_query($conn, $qry);
if (mysqli_num_rows($rr)>0) {
  $rows = $rr;
  # code...
}
else{
  $rows = mysqli_query($conn,"
select 
  ciu.nombre as Ciudad,
  al.nombre as Almacen,
  concat(al.colonia, ' ', al.calle, ' ', al.num, ' ', al.cp) as Direccion,
  concat(rr.nombre, ' ', ifnull(concat(rr.apPat,' '),' '), ifnull(concat(rr.apMat,' '),' ')) as RepresentanteDeVentas

from 
  rep_rentas as rr
  inner join almacenes as al on rr.almacen = al.codigo
  inner join ciudades as ciu on al.ciudad = ciu.codigo
"
);

echo "<script>alert('No se encontraron registros para ese almacen.');</script>";
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style = "background-color: #ebeac2">
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
                    <li><a href="../../app/logout.php"><font face=”Cambria” size=4>Cerrar Sesion</font></a>
                               
                            </ul>
                    </ul>
                </nav>
    </header>
    <main>

    <div class = "flex-container">
    <div class = "container">
    <form action = "#" method = "post" class = "d-flex">
    <div class = "container">
    <input  type="search" placeholder="Buscar Almacen" aria-label="Search" name = "txtBuscar"style = "display: inline;width: 80%;">
    <button type="submit" name = "btnSubmit" style = "display: inline;width: 15%;">Buscar</button>&ensp;&ensp;
    </div>
    </form>

    <strong>Representantes de Renta de <?php $row = mysqli_fetch_assoc($rows); echo $row["Almacen"]?></strong>
<table class = "table">

      <tr class = "table-dark">

        <td>Ciudad</td>
        <td>Almacen</td>
        <td>Direccion</td>
        <td>Vendedor</td>
      </tr>

  <?php 
  foreach ($rows as $row) {
  echo "<tr>";
  echo "<td>".$row['Ciudad']."</td>";
  echo "<td>".$row['Almacen']."</td>";
  echo "<td>".$row['Direccion']."</td>";
  echo "<td>".$row['RepresentanteDeVentas']."</td>";
  echo "</tr>";
    # code...
  }
  
  ?>

</table>
</div>
</div>



    </main>
</body>
</html>

