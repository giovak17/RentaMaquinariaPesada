<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquinas Por Almacen</title>
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
        <?php
        include '../../data/conexionDB.php';

        $conexionDB = new conexionDB();

        if (!$conexionDB->connect()) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Verificar si se ha enviado el formulario
        if (isset($_POST['codigoAlmacen'])) {
            $codigoAlmacenSeleccionado = $_POST['codigoAlmacen'];

            // Obtener las máquinas en el almacén seleccionado
            $query = "SELECT cd.nombre AS 'Nombre de la ciudad', 
            al.nombre AS 'Nombre del almacén', 
            concat(al.colonia,' ', al.calle, ' ', al.num, ' ', al.cp) AS 'Dirección del almacén', 
            ma.numSerie AS 'Número de serie de la máquina', 
            mc.nombre AS 'Nombre de la marca',
             modl.nombre AS 'Nombre del modelo', 
             cat.nombre AS 'Categoría del modelo', 
             modl.anoFabricacion AS 'Año' 
            FROM almacenes al 
            inner join ciudades as cd on al.ciudad = cd.codigo
            JOIN maquinas ma ON al.codigo = ma.almacen 
            JOIN modelos modl ON ma.modelo = modl.num 
            JOIN marcas mc ON modl.marca = mc.codigo 
            JOIN categorias cat ON modl.categoria = cat.codigo
            WHERE al.codigo = '$codigoAlmacenSeleccionado';";

            $result = $conexionDB->execquery($query);
            
            // Si tira rows entonces se despliega la informacion, si no, no se muestra nada
            if (mysqli_num_rows($result) > 0){
             // Mostrar las máquinas en el almacén
            echo "<h2>Máquinas en el Almacén $codigoAlmacenSeleccionado</h2>";
            echo "<div class='flex-container'>";
            echo "<div class='container' style='margin:0;'>";
            echo "<br><br>";
            echo "<div class='row'>";
            echo "<table class='table'>";
            echo "<tr class='table-dark'>";
            echo "<td>Nombre de la ciudad</td>";
            echo "<td>Nombre del almacén</td>";
            echo "<td>Dirección del almacén</td>";
            echo "<td>Número de serie de la máquina</td>";
            echo "<td>Nombre de la marca</td>";
            echo "<td>Nombre del modelo</td>";
            echo "<td>Categoría del modelo</td>";
            echo "<td>Año</td>";
            echo "</tr>";
            
            while ($maquina = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$maquina['Nombre de la ciudad']}</td>";
                echo "<td>{$maquina['Nombre del almacén']}</td>";
                echo "<td>{$maquina['Dirección del almacén']}</td>";
                echo "<td>{$maquina['Número de serie de la máquina']}</td>";
                echo "<td>{$maquina['Nombre de la marca']}</td>";
                echo "<td>{$maquina['Nombre del modelo']}</td>";
                echo "<td>{$maquina['Categoría del modelo']}</td>";
                echo "<td>{$maquina['Año']}</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
            //ELSE, SI NO HAY ROWS
            }else{
            echo "<h2>Máquinas en el Almacén $codigoAlmacenSeleccionado</h2>";
            echo "<div class='flex-container'>";
            echo "<div class='container' style='margin:0;'>";
            echo "<br><br>";
            echo "<div class='row'>";
            echo "<table class='table'>";
            echo "<tr class='table-dark'>";
                echo "<td>Nombre de la ciudad</td>";
                echo "<td>Nombre del almacén</td>";
                echo "<td>Dirección del almacén</td>";
                echo "<td>Número de serie de la máquina</td>";
                echo "<td>Nombre de la marca</td>";
                echo "<td>Nombre del modelo</td>";
                echo "<td>Categoría del modelo</td>";
                echo "<td>Año</td>";
            echo "</tr>";
 
            echo "<tr>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
            }//END ELSE
            
            // Botón para volver a la selección del almacén
            // echo "<form method='post' action='maquinasAlmacenadas.php'>";
            // echo "<button type='submit'>Volver a la sección del almacén</button>";
            // echo "</form>";
            $queryAlmacenes = "SELECT codigo, nombre FROM almacenes";
            $resultAlmacenes = $conexionDB->execquery($queryAlmacenes);

            $almacenes = array();

            // Obtener los datos de los almacenes
            while ($row = mysqli_fetch_assoc($resultAlmacenes)) {
                $almacenes[] = $row;
            }

            echo "<br><br><h3><font face=”Cambria” size=6>Seleccionar otro almacen:</font></h3>";
            echo "<form method='post' action='maquinasAlmacenadas.php'>";
            echo "<select name='codigoAlmacen' class='form-select'>";
            foreach ($almacenes as $almacen) {
                echo "<option value='{$almacen['codigo']}'>{$almacen['nombre']}</option>";
            }
            echo "</select>";
            echo "<input type='submit'value='Máquinas en el Almacén'>";
            echo "</form>";

            echo "</div>";
            echo "</div>";
            echo "<br>";
        } else {
            // Si no se ha enviado el formulario, mostrar el formulario de selección
            $queryAlmacenes = "SELECT codigo, nombre FROM almacenes";
            $resultAlmacenes = $conexionDB->execquery($queryAlmacenes);

            $almacenes = array();

            // Obtener los datos de los almacenes
            while ($row = mysqli_fetch_assoc($resultAlmacenes)) {
                $almacenes[] = $row;
            }

            echo "<h1><font face=”Cambria” size=6>Selecciona un almacén:</font></h1>";
            echo "<form method='post' action='maquinasAlmacenadas.php'>";
            echo "<select name='codigoAlmacen' class='form-select'>";
            foreach ($almacenes as $almacen) {
                echo "<option value='{$almacen['codigo']}'>{$almacen['nombre']}</option>";
            }
            echo "</select>";
            echo "<input type='submit'value='Máquinas en el Almacén'>";
            echo "</form>";
        }
        ?>
    </main>
</body>
</html>
