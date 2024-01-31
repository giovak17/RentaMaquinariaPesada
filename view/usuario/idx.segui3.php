
<div class="container-fluid">
<div class="container-fluid"> 
    <h1> Dirección de envío</h1>   
    <div class="container">

    <div class="table table-dark table-striped-columns">
            <table class="table">
                <tr class="table-dark">
                    <td>Direccion </td>

                </tr>
                
                <?php
                include_once('../../data/segui.php');
                $obj = new seguimiento();
                //$nick ='annita56';
                $dataset = $obj->getAllDireccion($_SESSION['id']);
                if ($dataset != 'wrong') {
                    while ($rs = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $rs['Direccion'] . "</td>";

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