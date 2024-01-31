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
            $queryClientes = "SELECT codigo, CONCAT(nombre, ' ', apPat, ' ', COALESCE(apMat, '')) AS nombreCompleto FROM clientes";
            $resultClientes = $conexionDB->execquery($queryClientes);

            $clientes = array();

            // Obtener los datos de los representantes
            while ($row = mysqli_fetch_assoc($resultClientes)) {
                $clientes[] = $row;
            }

            // Verificar si se ha enviado el formulario
            if (isset($_POST['cliente'])) {
                $clienteSeleccionado = $_POST['cliente'];

                // Consulta para obtener las reservas del representante en el mes y año seleccionados
                $query = "select 
                concat(cli.nombre, ' ', cli.apPat,  ' ', cli.apMat) as Cliente,
                concat(cli.colonia,  ' ', cli.calle,  ' ', cli.num,  ' ', cli.cp) as DirCliente,
                cli.numTel as NumTelefono,
                DATE_FORMAT(rv.fechaSolicitud, '%d-%M-%Y')as FechaInicial,
                DATE_FORMAT(rv.fechaFinal, '%d-%M-%Y')as FechaFinal,
                rv.total as MontoPago,
                DATE_FORMAT(rv.fechaEntrega , '%d-%M-%Y')as FechaEntrega,
                concat(eg.colonia,  ' ', eg.calle, ' ', eg.num,  ' ', eg.cp) as Direccion,
                concat (cho.nombre,  ' ', cho.apPat,  ' ', cho.apMat) as Chofer
                from  entregas as eg
                inner join choferes as cho on eg.chofer = cho.codigo
                inner join reservas as rv on eg.reserva = rv.folio
                inner join clientes as cli on rv.cliente = cli.codigo
                where cliente = '$clienteSeleccionado'";

                $result = $conexionDB->execquery($query);

                // Mostrar las reservas
                echo "<h2>Reservas del cliente $clienteSeleccionado</h2>";
                echo "<div class='flex-container'>";
                echo "<div class='container' style='margin:0;'>";
                echo "<br><br>";
                echo "<div class='row'>";
                echo "<table class='table'>";
                echo "<tr class='table-dark'>";
                echo "<td>Cliente</td>";
                echo "<td>DirCliente</td>";
                echo "<td>NumTelefono</td>";
                echo "<td>FechaInicial</td>";
                echo "<td>FechaFinal</td>";
                echo "<td>MontoPago</td>";
                echo "<td>FechaEntrega</td>";
                echo "<td>Direccion</td>";
                echo "<td>Chofer</td>";
                echo "</tr>";

                while ($reserva = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$reserva['Cliente']}</td>";
                    echo "<td>{$reserva['DirCliente']}</td>";
                    echo "<td>{$reserva['NumTelefono']}</td>";
                    echo "<td>{$reserva['FechaInicial']}</td>";
                    echo "<td>{$reserva['FechaFinal']}</td>";
                    echo "<td>{$reserva['MontoPago']}</td>";
                    echo "<td>{$reserva['FechaEntrega']}</td>";
                    echo "<td>{$reserva['Direccion']}</td>";
                    echo "<td>{$reserva['Chofer']}</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
                echo "<form method='post' action='informacionRe.php'>";
                echo "<input type='submit' value='Regresar a la sección del cliente'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
            } else {
                // Si no se ha enviado el formulario, mostrar el formulario de selección
                echo "<h1><font face=”Cambria” size=6>Selecciona un cliente:</font></h1>";
                echo "<form method='post' action='informacionRe.php'>";
                echo "<label for='cliente'>Selecciona un cliente:</label>";
                echo "<select name='cliente'>";
                // Mostrar opciones de representantes
                foreach ($clientes as $clientesRe) {
                    echo "<option value='{$clientesRe['codigo']}'>{$clientesRe['nombreCompleto']}</option>";
                }
                echo "</select>";
                echo "<br>";
                echo "<input type='submit' value='Mostrar Clientes'>";
                echo "</form>";
                
            }
        ?>
    </main>
</body>
</html>