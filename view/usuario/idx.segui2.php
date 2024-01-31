
<div class="container-fluid">
<div class="container-fluid"> 
    <h1> Detalles del envío</h1>   
    <div class="container">

    <div class="table table-dark table-striped-columns">
            <table class="table">
                <tr class="table-dark">
                    <td>Estado </td>
                    <td>Modelo</td>
                    <td>Precio por día</td>

                </tr>
                
                <?php
                include_once('../../data/segui.php');
                $obj = new seguimiento();
                //$nick ='annita56';
                $dataset = $obj->getAllDetallesEnvio ($_SESSION['id']);
                if ($dataset != 'wrong') {
                    while ($rs = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $rs['Estatus'] . "</td>";
                        echo "<td>" . $rs['Modelo'] . "</td>";
						echo "<td>" . $rs['PrecioPorDia'] . "</td>";

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