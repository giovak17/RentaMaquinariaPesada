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
    <h1 class="letraHeader">Admin</h1>
        <nav id="aveces">
            <ul>
                <li><a href="#">Dashboard</a>
                    <ul style="--cantidad-items: 1">
                        <li><a href="estadisticas.php">Estadisticas</a></li>
                    </ul>
                </li>
                <li><a href="#">Maquinaria</a>
                    <ul style="--cantidad-items: 6">
                        <li><a href="dispo.html">Disponibilidad</a></li>
                        <li><a href="categoria..php">Categorias</a></li>
                        <li><a href="mantenimiento.php">Mantenimiento</a></li>
                        <li><a href="agregarm.php">Agregar maquina</a></li>
                        <li><a href="agregarmarca.php">Agregar marca</a></li>
                        <li><a href="agregarmodelo.php">Agregar modelo</a></li>
                    </ul>
                </li>
                <li><a href="#">Reservas</a>
                    <ul style="--cantidad-items: 3">
                        <li><a href="confirmacion.php">Confirmacion</a></li>
                        <li><a href="Report.html">Reportes de reserva</a></li>
                        <li><a href="pagos.html">Pagos pendientes</a></li>
                    </ul>
                </li>
                <li><a href="#">Choferes</a>
                    <ul style="--cantidad-items: 2">
                        <li><a href="agregarch.php">Agregar Choferes</a></li>
                        <li><a href="asignar.php">Asignar a rutas</a></li>
                    </ul>
            </ul>
        </nav>
    </header>
    <main>
    <strong> Maquinas</strong>


      
    <?php
        include_once('../../data/maquinas.php');
        $miMaquina = new maquinas();
        //$id = 1;//editar despues
        $dataSet = $miMaquina->getAutoSetform($_GET['id']);

        if ($dataSet != 'wrong') {
            $rs = mysqli_fetch_array($dataSet);
            echo'<form method = "post" action="../../app/updateMaquinas.php?id=';echo $rs['mqCodigo']; echo'" enctype="multipart/form-data">';
            echo '<!--<label>Codigo Maquina</label> <input type="text" value="'.$rs['mqCodigo'].'" name="txtmqCodigo">--><br>';
            echo '<label>NumSerie</label> <input type="text" value="'.$rs['mqNumSerie'].'" name="txtmqNumSerie" placeholder="17 Caracteres" max=17><br>';
            echo '<label>Almacen</label>';
        echo '<select name="txtalmCodigo" class="listDeploy" required>';
        echo '<option value="'.$rs['almCodigo'].'" selected>'.$rs['almNombre'].'</option>';
        }

    ?>
    <?php
         include_once('../../data/almacenes.php');
         $miAlmacen = new almacenes();
         $dataSet = $miAlmacen->getAllAlmacenes();

         if ($dataSet != 'wrong') {
             while ($rs = mysqli_fetch_assoc($dataSet)) {
                 //$numModelo = $rs['almacen'];
             echo $rs['codigo'];
         ?>
            <option value="<?php echo $rs['codigo']; ?>"><?php echo $rs['nombre']; ?></option>
         <?php
              echo 'fuck';
             }
         } else {
             echo "error datos";
         }
    ?>
    <?php  
        include_once('../../data/maquinas.php');
        $miMaquina = new maquinas();
        //$id = 1;//editar despues
        $dataSet = $miMaquina->getAutoSetform($_GET['id']);

        if ($dataSet != 'wrong') {
            $rs = mysqli_fetch_array($dataSet); 
    
        }
    ?>
   
        </select>
                   <br><br>
                    <button class="btnOpen" type="submit" >Enviar </button>
                    <button class="btnOpen" type = "reset">Cancelar </button>
                    <!-- class="btnClose" se usaba para cerrar el modal dialog-->
                        </table>
                </form>
            <!--<button class="btnOpen">Open</button>--> 


    <!--Aqui empieza el select -->

        <div class = "flex-container">
        <div class = "container">
        <br>
        <br>
        <div class = "row">
        <table class = "table">
          <tr class = "table-dark">
              <td>Codigo</td>
              <td>Numero de serie</td>
              <td>Almacen</td>
              <td>Marca</td>
              <td>Numero de modelo</td>
              <td>Modelo</td>
              <td>Año de fabricacion</td>
              <td>Capacidad de carga</td>
              <td>Descripcion</td>
              <td>Precio por dia</td>
              <td>Foto</td>
              <td></td>
              <td></td>
          </tr>

          <?php
          $i = 1;
          // $rows = mysqli_query($conn,"select * from maquinas order by codigo desc");

          $rows = mysqli_query($conn,"select 
            maq.codigo as codigo,
            maq.numSerie as numSerie,
            maq.almacen as almacen,
            md.marca as marca,
            md.nombre as numModelo,
            md.nombre as nombreModelo,
            md.anoFabricacion as anoFabricacion,
            md.capacidadCarga as capacidadCarga, 
            md.descripcion as descripcion,
            maq.precioDia as precioDia,
            md.imagen as foto

            from maquinas as maq
            inner join modelos as md on maq.modelo = md.num
            order by codigo desc");

          ?>

          <?php foreach($rows as $row) : ?>
          <tr>
            <!-- <td> <?php echo $i++; ?></td> -->
            <td><?php echo $row["codigo"]; ?></td>
            <td><?php echo $row["numSerie"]; ?></td>
            <td><?php echo $row["almacen"]; ?></td>
            <td><?php echo $row["marca"]; ?></td>
            <td><?php echo $row["numModelo"]; ?></td>
            <td><?php echo $row["nombreModelo"]; ?></td>
            <td><?php echo $row["anoFabricacion"]; ?></td>
            <td><?php echo $row["capacidadCarga"]; ?></td>
            <td><?php echo $row["descripcion"]; ?></td>
            <td><?php echo $row["precioDia"]; ?></td>
            <td><?php echo $row["foto"]; ?></td>
            <td><a href = "#"><img src = "../../images/trash3-fill.svg" style="padding-bottom:3px" class = "trashcan filter-red"></a></td>
            <td><a href = "#"><img src = "../../images/pencil-fill.svg" style="padding-bottom:3px" class = "pencil filter-yellow"></a></td>
            <!--<td><img src = "img/<?php echo $row['imagen'];?>" width = 200 alt = ""></td> -->

          </tr>
          
          <?php endforeach; ?>




          </table>
          </div>
          </div>
          </div>
          <br>
 
<!-- Aqui termina el select -->

      
    </main>
    <div>
        
    </div>
    
</body>
</html>
