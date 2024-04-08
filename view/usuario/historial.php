<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('../../data/config.php');
include('carrito.php');
include('templates/cabecera.php');

?>

	<br>
	<br>
	<br>
    <br>
    <br>
	<div class="container-fluid">

	<div class="container-fluid"> 
      <br>

    <?php
			include('../../data/hist.php');
      $obj = new historial();
      $dataset = $obj->getAllHistorial($_SESSION['id']);
      $rs = mysqli_fetch_assoc($dataset);
    ?>
      <h3>
        <?php 
            if ($rs == null) {
                echo "<h1>No hay historial de reservas registradas. </h1>";
            }else { 
                echo "    <h1>Historial de las reservas entregadas</h1>   ";
            echo "Cliente: " . $rs['Cliente']; 
            };
            ?></h3>   
      <br>
    <div class="container">
                <?php
                //Added
                if ($rs != null) {
                    echo 
                    '<table class="table">
                        <tr class="table-dark">
                            <td>Folio</td>
                            <td>Fecha</td>
                            <td> Hora </td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                            <td>Direccion</td>
                            <td>Estado</td>
                            <td>Detalles</td>
                        
                        </tr>';
                }


                $obj = new historial();
                //$nick ='annita56';
                $dataset = $obj->getAllHistorial($_SESSION['id']);
                if ($dataset != 'wrong') {
                    while ($rs = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $rs['FolioReserva'] . "</td>";
                        echo "<td>" . $rs['Fecha'] . "</td>";
						echo "<td>" . $rs['Hora'] . "</td>";
                        echo "<td>" . $rs['Nombre'] . "</td>";
						echo "<td>" . $rs['Descripcion'] . "</td>";
                        echo "<td>" . $rs['Direccion'] . "</td>";
						echo "<td>" . $rs['Estado'] . "</td>";
                        echo '<td><a href="idx.segui.php?">Ver mas</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "No hay reservas " .$_SESSION['id']. "registradas.";
                }
                ?>
            </table>
		</div>
	</div>
</div>

<?php
 include('templates/pie.php');
 ?>
