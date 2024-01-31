<?php
require '../../data/conexionDB.php';
require '../../data/estatusreserva.php';

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibió un nuevo estado válido
    if (isset($_POST['nuevo_estado']) && !empty($_POST['nuevo_estado'])) {
        $nuevoEstado = $_POST['nuevo_estado'];
        $idReserva = $_POST['folio_reserva'];

     
        $actualizarEstado = "UPDATE reservas SET estatusR = '$nuevoEstado' WHERE folio = $idReserva";

        if (mysqli_query($conn, $actualizarEstado)) {
           // echo "Estado actualizado correctamente.";
        } else {
            echo "Error al actualizar el estado: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Nuevo estado no válido.";
    }
}

// Obtener la lista de reservas
$query = "SELECT * FROM reservas";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
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
        <h1><font face=”Cambria” size=6> Confirmación de las reservas</font></h1>

        <div class="flex-container">
            <div class="container" style="margin:0;">
                <br>
                <br>
                <div class="row">
                    <table class="table">
                        <tr class="table-dark">
                            <td>Folio</td>
                            <td>Fecha Solicitud</td>
                            <td>Costo transporte</td>
                            <td>Descripcion</td>
                            <td>Subtotal</td>
                            <td>Iva</td>
                            <td>Total</td>
                            <td>Cliente</td>
                            <td>Representante renta</td>
                            <td>Almacen </td>
                            <td>Estatus Reserva</td>
                            <td>Actualizar Estado</td>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["folio"]; ?></td>
                                <td><?php echo $row["fechaSolicitud"]; ?></td>
                                <td><?php echo $row["costoTransporte"]; ?></td>
                                <td><?php echo $row["descripcion"]; ?></td>
                                <td><?php echo $row["subtotal"]; ?></td>
                                <td><?php echo $row["iva"]; ?></td>
                                <td><?php echo $row["total"]; ?></td>
                                <td><?php echo $row["cliente"]; ?></td>
                                <td><?php echo $row["rep_rtas"]; ?></td>
                                <td><?php echo $row["almacen"]; ?></td>
                                <td><?php echo $row["estatusR"]; ?></td>
                                <td>
                                    <form method="post" action="confirmacion.php" class="d-flex align-items-end">
                                    <select name="nuevo_estado" class="listDeploy me-2" required>
                                        <option value="" selected disabled>-- Seleccione un Estado</option>
                                        <?php
                                        $miEstatusReserva = new estatusreserva();
                                        $dataSet = $miEstatusReserva->getEstados();

                                        if ($dataSet != 'wrong') {
                                            while ($rs = mysqli_fetch_assoc($dataSet)) {
                                        ?>
                                                <option value="<?php echo $rs['codigo']; ?>"><?php echo $rs['descripcion']; ?></option>
                                        <?php
                                            }
                                        } else {
                                            echo "Error al recuperar datos";
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="folio_reserva" value="<?php echo $row['folio']; ?>">
                                    <button class="btn btn-sm btn-primary" type="submit">Enviar</button>
                                </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </main>
</body>
</html>
