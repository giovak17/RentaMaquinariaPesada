<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquinas Reservadas</title>
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

        // Verificar si se ha enviado el formulario
        if (isset($_POST['codigoCliente'])) {
            $codigoClienteSeleccionado = $_POST['codigoCliente'];

            // Obtener las máquinas reservadas del cliente seleccionado
            $query ="SELECT
            r.folio AS 'Folio de la reserva',
            CONCAT(c.nombre, ' ', c.apPat, ' ', COALESCE(c.apMat, '')) AS 'Nombre completo del cliente',
            ma.numSerie AS 'Número de serie de la máquina',
            mc.nombre AS 'Nombre de la marca',
            modelo.nombre AS 'Nombre del modelo',
            cat.nombre AS 'Categoría del modelo',
            modelo.anoFabricacion AS 'Año',
            rm.cantDias AS 'Días de reserva de la máquina',
            (rm.cantDias * ma.precioDia) AS 'ImporteRenta'
        FROM
            re_maq rm
        JOIN reservas r ON rm.reserva = r.folio
        JOIN maquinas ma ON rm.maquina = ma.codigo
        JOIN modelos modelo ON ma.modelo = modelo.num
        inner join categorias as cat on modelo.categoria = cat.codigo
        JOIN marcas mc ON modelo.marca = mc.codigo
        JOIN clientes c ON r.cliente = c.codigo
        where c.codigo =$codigoClienteSeleccionado";

            $result = $conexionDB->execquery($query);

            // Mostrar las máquinas reservadas
            echo "<h2>Maquinas del Cliente $codigoClienteSeleccionado</h2>";
            echo "<div class='flex-container'>";
            echo "<div class='container' style='margin:0;'>";
            echo "<br><br>";
            echo "<div class='row'>";
            echo "<table class='table'>";
            echo "<tr class='table-dark'>";
            echo "<td>Folio de la Reserva</td>";
            echo "<td>Nombre del Cliente</td>";
            echo "<td>Número de serie de la máquina</td>";
            echo "<td>Nombre de la Marca</td>";
            echo "<td>Nombre del Modelo</td>";
            echo "<td>Categoría del Modelo</td>";
            echo "<td>Año</td>";
            echo "<td>Días de Reserva</td>";
            echo "<td>Importe de Renta</td>";
            echo "</tr>";

            while ($maquina = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$maquina['Folio de la reserva']}</td>";
                echo "<td>{$maquina['Nombre completo del cliente']}</td>";
                echo "<td>{$maquina['Número de serie de la máquina']}</td>";
                echo "<td>{$maquina['Nombre de la marca']}</td>";
                echo "<td>{$maquina['Nombre del modelo']}</td>";
                echo "<td>{$maquina['Categoría del modelo']}</td>";
                echo "<td>{$maquina['Año']}</td>";
                echo "<td>{$maquina['Días de reserva de la máquina']}</td>";
                echo "<td>{$maquina['ImporteRenta']}</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";

            // Botón para volver a la selección del cliente
            echo "<form method='post' action='maquinasReservadas.php'>";
            echo "<input type='submit'  value='Volver a la Selección del Cliente'>";
            echo "</form>";

            echo "</div>";
            echo "</div>";
            echo "<br>";
        } else {
            // Si no se ha enviado el formulario, mostrar el formulario de selección
            $queryClientes = "SELECT codigo, CONCAT(nombre, ' ', apPat, ' ', COALESCE(apMat, '')) AS nombreCompleto FROM clientes";
            $resultClientes = $conexionDB->execquery($queryClientes);

            $clientes = array();

            // Obtener los datos de los clientes
            while ($row = mysqli_fetch_assoc($resultClientes)) {
                $clientes[] = $row;
            }

            echo "<h1><font face=”Cambria” size=6>Seleccione un cliente:</font></h1>";
            echo "<form method='post' action='maquinasReservadas.php'>";
            echo "<select name='codigoCliente' class='form-select'>";
            foreach ($clientes as $cliente) {
                echo "<option value='{$cliente['codigo']}'>{$cliente['nombreCompleto']}</option>";
            }
            echo "</select>";
            echo "<input type='submit'  value='Mostrar Maquinas Reservadas'>";
            echo "</form>";
        }
        ?>
    </main>
</body>
</html>
