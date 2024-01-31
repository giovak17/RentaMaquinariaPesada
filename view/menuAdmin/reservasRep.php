<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas por Representante</title>
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
        <?php
            include '../../data/conexionDB.php';

            $conexionDB = new conexionDB();

            if (!$conexionDB->connect()) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Obtener la lista de representantes
            $queryRepRtas = "SELECT codigo, CONCAT(nombre, ' ', apPat, ' ', COALESCE(apMat, '')) AS nombreCompleto FROM rep_rentas";
            $resultRepRtas = $conexionDB->execquery($queryRepRtas);

            $repRtas = array();

            // Obtener los datos de los representantes
            while ($row = mysqli_fetch_assoc($resultRepRtas)) {
                $repRtas[] = $row;
            }

            // Verificar si se ha enviado el formulario
            if (isset($_POST['rep_rtas'])) {
                $repRtasSeleccionado = $_POST['rep_rtas'];
                $mesSeleccionado = $_POST['mes'];
                $anoSeleccionado = $_POST['ano'];

                // Consulta para obtener las reservas del representante en el mes y año seleccionados
                $query = "SELECT  
                CONCAT(rr.nombre, ' ', rr.apPat, ' ', rr.apMat) AS RepRentas,
                rv.folio AS FolioReserva,
                DATE_FORMAT(rv.fechaSolicitud, '%d-%M-%Y') AS Fecha,
                CONCAT(cli.nombre, ' ', cli.apPat, ' ', cli.apMat) AS Cliente,
                rv.total AS MontoTotal
            FROM 
                reservas AS rv 
                INNER JOIN rep_rentas AS rr ON rv.rep_rtas = rr.codigo
                INNER JOIN clientes AS cli ON rv.cliente = cli.codigo
            WHERE 
                MONTH(rv.fechaSolicitud) = $mesSeleccionado
                AND YEAR(rv.fechaSolicitud) = $anoSeleccionado 
                AND rv.rep_rtas = $repRtasSeleccionado";

                $result = $conexionDB->execquery($query);

                // Mostrar las reservas
                echo "<h2>Reservas del Representante $repRtasSeleccionado en $mesSeleccionado/$anoSeleccionado</h2>";
                echo "<div class='flex-container'>";
                echo "<div class='container' style='margin:0;'>";
                echo "<br><br>";
                echo "<div class='row'>";
                echo "<table class='table'>";
                echo "<tr class='table-dark'>";
                echo "<td>Representante de Ventas</td>";
                echo "<td>Número de Reserva</td>";
                echo "<td>Fecha</td>";

                echo "<td>Cliente</td>";
                echo "<td>Monto Total</td>";
                echo "</tr>";

                while ($reserva = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$reserva['RepRentas']}</td>";
                    echo "<td>{$reserva['FolioReserva']}</td>";
                    echo "<td>{$reserva['Fecha']}</td>";
           
                    echo "<td>{$reserva['Cliente']}</td>";
                    echo "<td>{$reserva['MontoTotal']}</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
                echo "<form method='post' action='reservasRep.php'>";
                echo "<input type='submit' value='Regresar a la Selección del Representante'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
            } else {
                // Si no se ha enviado el formulario, mostrar el formulario de selección
                echo "<h1><font face=”Cambria” size=6>Seleccione un representante de rentas por mes y año:</font></h1>";
                echo "<form method='post' action='reservasRep.php'>";
                echo "<label for='rep_rtas'>Selecciona un representante:</label>";
                echo "<select name='rep_rtas'>";
                // Mostrar opciones de representantes
                foreach ($repRtas as $representante) {
                    echo "<option value='{$representante['codigo']}'>{$representante['nombreCompleto']}</option>";
                }
                echo "</select>";

                echo "<br>";

                echo "<label for='mes'>Selecciona un mes:</label>";
                echo "<select name='mes'>";
                // Mostrar opciones de meses
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                echo "</select>";

                echo "<br>";

                echo "<label for='ano'>Selecciona un rango de años:</label>";
                echo "<select name='ano'>";
                // Mostrar opciones de años 
                for ($i = 2023; $i <= 2024; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                echo "</select>";

                echo "<br>";

                echo "<input type='submit' value='Mostrar Reservas'>";
                echo "</form>";
            }
        ?>
    </main>
</body>
</html>