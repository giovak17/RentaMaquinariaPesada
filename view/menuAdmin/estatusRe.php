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
        if (isset($_POST['estatusR'])) {
            $estatusSeleccionado = $_POST['estatusR'];

            // Obtener las máquinas en el almacén seleccionado
            $query = "select
            er.descripcion as DescripcionEstatus,
            rv.folio as NumReserva,
            DATE_FORMAT(rv.fechaSolicitud, '%d-%M-%Y') as Fecha,
            concat(cli.nombre, ' ', cli.apPat, ' ', cli.apMat) as Cliente
            from reservas as rv 
            inner join clientes as cli on rv.cliente = cli.codigo
            inner join estatusreserva as er on rv.`estatusR` = er.codigo
            where rv.estatusR  = '$estatusSeleccionado';";

            $result = $conexionDB->execquery($query);

            if (mysqli_num_rows($result) > 0){
                // echo "si tiene";
                echo "<h2>Estatus de reservas $estatusSeleccionado</h2>";
            echo "<div class='flex-container'>";
            echo "<div class='container' style='margin:0;'>";
            echo "<br><br>";
            echo "<div class='row'>";
            echo "<table class='table'>";
            echo "<tr class='table-dark'>";
            echo "<td>DescripcionEstatus</td>";
            echo "<td>NumReserva</td>";
            echo "<td>Fecha</td>";
            echo "<td>Cliente</td>";
            echo "</tr>";

            while ($estatus = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$estatus['DescripcionEstatus']}</td>";
                echo "<td>{$estatus['NumReserva']}</td>";
                echo "<td>{$estatus['Fecha']}</td>";
                echo "<td>{$estatus['Cliente']}</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
            }else{
                // echo "no tiene";
                echo "<h2>Estatus de reservas $estatusSeleccionado</h2>";
            echo "<div class='flex-container'>";
            echo "<div class='container' style='margin:0;'>";
            echo "<br><br>";
            echo "<div class='row'>";
            echo "<table class='table'>";
            echo "<tr class='table-dark'>";
            echo "<td>DescripcionEstatus</td>";
            echo "<td>NumReserva</td>";
            echo "<td>Fecha</td>";
            echo "<td>Cliente</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
            echo "</tr>";

            echo "</table>";
            echo "</div>";
            }

            // Mostrar las máquinas en el almacén
            

            // Botón para volver a la selección del almacén
            echo "<form method='post' action='estatusRe.php'>";
            echo "<button type='submit'>Volver a la sección del estatus</button>";
            echo "</form>";

            echo "</div>";
            echo "</div>";
            echo "<br>";
        } else {
            // Si no se ha enviado el formulario, mostrar el formulario de selección
            $queryEstatus = "SELECT codigo, descripcion FROM estatusReserva";
            $resultEstatus = $conexionDB->execquery($queryEstatus);

            $estatus = array();

            // Obtener los datos de los almacenes
            while ($row = mysqli_fetch_assoc($resultEstatus)) {
                $estatus[] = $row;
            }

            echo "<h1><font face=”Cambria” size=6>Selecciona un estatus</font></h1>";
            echo "<form method='post' action='estatusRe.php'>";
            echo "<select name='estatusR' class='form-select'>";
            foreach ($estatus as $estatus) {
                echo "<option value='{$estatus['codigo']}'>{$estatus['descripcion']}</option>";
            }
            echo "</select>";
            echo "<input type='submit'value='Estatus de reservas'>";
            echo "</form>";
        }
        ?>
    </main>
</body>
</html>
