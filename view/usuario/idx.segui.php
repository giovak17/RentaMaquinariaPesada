<?php
include('../../data/config.php');
//include('global/conexion.php');
include('carrito.php');
include('templates/cabecera.php');
?>
<br>
	<br>
    <br>
    <br>
	<div class="container-fluid">
		
    
<div class="container-fluid"> 
    <h1> Detalles de la reserva</h1>   
    <div class="container">

    <div class="table table-dark table-striped-columns">
            <table class="table">
                <tr class="table-dark">
                    <td>Fecha de reserva</td>
                    <td>Numero del pedido</td>
                    <td>Total</td>

                </tr>

                <?php
                include_once('../../data/segui.php');
                $obj = new seguimiento();
                //$nick ='annita56';
                $dataset = $obj->getAllDetallesReserva($_SESSION['id']);
                if ($dataset != 'wrong') {
                    while ($rs = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $rs['Fecha de reserva'] . "</td>";
                        echo "<td>" . $rs['Numero del pedido'] . "</td>";
						echo "<td>" . $rs['Total de la reserva'] . "</td>";

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
include('idx.segui2.php');
include('idx.segui3.php');
include('templates/pie.php');
?>