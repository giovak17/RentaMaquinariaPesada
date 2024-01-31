<?php
//include('../../data/config.php');
//include('global/conexion.php');
include('carrito.php');
include('templates/cabecera.php');
?>
     

     
	<div class="container-fluid">

	<div class="container-fluid"> 
    <h1>Reservas entregadas en curso</h1>   
    <div class="container">
     
		

            <table class="table">
                <tr class="table-dark">
                    <td>Fecha</td>
					<td>Nombre</td>
                    <td>Descripcion</td>
					<td>Direccion</td>
					<td>Estado</td>
                   
                </tr>

                <?php
                include('../../data/hist.php');
                $obj = new historial();
                $dataset = $obj->getAllHistorialC($_SESSION['id']);
                if ($dataset != 'wrong') {
                    while ($rs = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $rs['Fecha'] . "</td>";
                        echo "<td>" . $rs['Nombre'] . "</td>";
						echo "<td>" . $rs['Descripcion'] . "</td>";
                        echo "<td>" . $rs['Direccion'] . "</td>";
						echo "<td>" . $rs['Estado'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No hay reservas " .$_SESSION['id']. "registradas.";
                }
                ?>
            </table>
		</div>


     
<?php
 include('templates/pie.php');
 ?>