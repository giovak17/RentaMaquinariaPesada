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
        
    <h1><font face=”Cambria” size=6>Agregar maquinas</font></h1>

                
                <form method = "post" action="../../app/addMaquinas.php" enctype="multipart/form-data">
                    <!--<label>Codigo</label> <input type="text" name="txtCodigo"> Por si se ocupa-->
                    <br>
                    <table border = 2>
                    <label>NumSerie: </label> <input type="text" name="txtNumSerie" required >
                    <br>
                    <label>Precio por dia: </label> <input type="text" name="txtPrecioDia" required >
                    <br>
                    <label>Almacenes:</label> 
                    <select name="txtAlmacen" class="listDeploy" required>
                        <option value="" selected disabled>-- Seleccione un almacen</option>
                        <?php
                            
                            include('../../data/almacenes.php');
                            $miAlmacen = new almacenes();
                            $dataSet = $miAlmacen->getAllAlmacenes();

                            if ($dataSet != 'wrong') {
                                while ($rs = mysqli_fetch_assoc($dataSet)) {
                                    //$numModelo = $rs['almacen'];
                                echo $rs['codigo'];
                            ?>
                               <option value="<?php echo $rs['codigo']; ?>"><?php echo $rs['nombre']; ?></option>
                            <?php
                                
                                }
                            } else {
                                echo "error datos";
                            }
                        ?>
                    </select>
                    <br>
                    <label>Modelo: </label> 
                    <select name="txtModelo" class="listDeploy" required>
                        <option value="" selected disabled>-- Seleccione un Modelo</option>
                        <?php
                            include('../../data/modelos.php');  
                            $miModelo = new modelos();
                            $dataSet = $miModelo->getAllModelos();

                            if ($dataSet != 'wrong') {
                                while ($rs = mysqli_fetch_assoc($dataSet)) {
                                    //$numModelo = $rs['numModelo'];
                            ?>
                                <option value="<?php echo $rs['num']; ?>"><?php echo $rs['nombre']; ?></option>
                                
                            <?php
                                }
                            } else {
                                echo "Error al recuperar datos";
                            }
                        ?>
                    </select>
          <br>
    
          <label>Estatus:</label>
          <select name = "txtEstatusM">
            <option selected disabled>-- Seleccione un estatus</option>
            <option value = "RES">En reserva</option>
            <option value = "MANT">En mantenimiento</option>
            <option value = "DISP">Disponible</option>
          </select>

                    <br>
            <label>Imagen principal:</label>
            <input type="file" name="imagenP" id = "imagenP" accept=".jpg, .jpeg, .png" value="">
            <br>
             <label>Imagenes extras:</label> 
                      <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple> <br>
                      <button type="submit" >Enviar </button>
                    <button type = "reset">Cancelar </button>
                    <!-- class="btnClose" se usaba para cerrar el modal dialog-->
                        </table> 
                </form>
                        
            <!--<button class="btnOpen">Open</button>--> 


    <!--Aqui empieza el select -->

        <div class = "flex-container">
        <div class = "container" style = "margin:0;">
        <br>
        <br>
        <div class = "row">
        <table class = "table">
          <tr class = "table-dark">
              <td>Codigo</td>
              <td>Numero de serie</td>
              <td>Precio por dia</td>
              <td>Modelo</td>
              <td>Marca</td>
              <td>Descripcion</td>
              <td>Año de fabricacion</td>
              <td>Capacidad de carga</td>
              <td>Categoria</td>
              <td>Limite de carga</td>
              <td>Imagen principal </td>
              <td>Imagenes extra </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          </tr>

          <?php
          $i = 1;
          // $rows = mysqli_query($conn,"select * from maquinas order by codigo desc");

          $query = "select * from v_infoMaquinas group by codigo desc";
          $rows = mysqli_query($conn, $query);

          ?>
          <?php foreach($rows as $row) : ?>
          <tr>
            <td><?php echo $row["codigo"]; ?></td>
            <td><?php echo $row["numSerie"]; ?></td>
            <td><?php echo $row["precioDia"]; ?></td>
            <td><?php echo $row["modelo"]; ?></td>
            <td><?php echo $row["marca"]; ?></td>
            <td><?php echo $row["descripcion"]; ?></td>
            <td><?php echo $row["anio"]; ?></td>
            <td><?php echo $row["capacidad"]; ?></td>
            <td><?php echo $row["categoria"]; ?></td>
            <td><?php echo $row["limite"]; ?></td>

            <!-- Mostrar una sola imagen -->
            <td><img src="imagenP/<?php echo $row["imagen"]; ?>" width = 200></td>

            <!-- Mostrar multiples imagenees -->
          <?php
          foreach (json_decode($row["extraImagenes"]) as $image) : ?>
          <td><img src="imagenesExtra/<?php echo $image; ?>" width = 200></td>
          <?php endforeach; ?>


            <td><a href = "../../app/deletemaquina.php?id=<?php echo $row["codigo"]; ?> "><img src = "../../images/trash3-fill.svg" style="padding-bottom:3px" class = "trashcan filter-red" ></a></td>
            <td><a href = "updateMaquina.php?id=<?php echo $row["codigo"]; ?>"><img src = "../../images/pencil-fill.svg" style="padding-bottom:3px" class = "pencil filter-yellow"></a></td>
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
