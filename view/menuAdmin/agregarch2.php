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
                    <li><a href="../../app/logout.php"><font face=”Cambria” size=4>Cerrar Sesion</font></a>
            </ul>
        </nav>
    </header>
    <main>
    <h1><font face=”Cambria” size=6>Agregar chofer</font></h1> 


    
    <form method = "post" action="../../app/addChoferes.php" enctype="multipart/form-data">
                 
                    <br>
                    <table border = 2>
                    <label>Nombre: </label> <input type="text" name="nombre" required >
                    <br>
                    <label>Apellido paterno: </label> <input type="text" name="apPat" required >
                    <br>
                    <label>Apellido materno: </label> <input type="text" name="apMat" required >
                    <br>
                    <label>Numero de telefono: </label> <input type="text" name="numTel" required >
                    <br>
                    <label>Almacen:</label> 
                    <select name="almacen" class="listDeploy" required>
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

                    </select>
                    <br>
                    <button type="submit" >Enviar </button>
                    <button type = "reset">Cancelar </button>
          <br>

          <div class="flex-container">
    <div class="container">
        <br>
        <br>
        <div class="row">
            <table class="table">
                <tr class="table-dark">
                    <td>Codigo</td>
                    <td>Nombre</td>
                    <td>Apellido Paterno</td>
                    <td>Apellido Materno</td>
                    <td>Numero de telefono</td>
                    <td>Almacen</td>
                 
                    
                </tr>

                <?php
                include('../../data/choferes.php');
                $miCh = new choferes();
                $dataset = $miCh->getAllchoferes();
                if ($dataset != 'wrong') {
                    while ($registro = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $registro['codigo'] . "</td>";
                        echo "<td>" . $registro['nombre'] . "</td>";
                        echo "<td>" . $registro['apPat'] . "</td>";
                        echo "<td>" . $registro['apMat'] . "</td>";
                        echo "<td>" . $registro['numTel'] . "</td>";
                        echo "<td>" . $registro['almacen'] . "</td>";
                    
                    }
                        echo "</tr>";
                    
                } else {
                    echo "No hay datos que consultar";
                }
                ?>
            </table>
        </div>
    </div>
</div>

    </main>
</body>
</html>