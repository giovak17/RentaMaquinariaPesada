<?php
include('../../data/config.php');
//include('global/conexion.php');
include('carrito.php');
include('templates/cabecera.php');
?>
       
    
    <div class="container-fluid"> 
        <h1>Adeudos pendientes</h1>
        <div class="container-fluid"> 
        <h1>Pagos Pendientes</h1>   
        <div class="container">
        <!--<h1>Pagos Pendientes</h1>     -->
        <br>
        <br>
        <div class="table table-dark table-striped-columns">
            <table class="table">
                <tr class="table-dark">
                    <td>Cliente</td>
                    <td>Folio Reserva</td>
                    <td>Fecha</td>
                    <td>Monto Total</td>
                    <td>Saldo restante</td>
                    <td></td>
                   
                </tr>

                <?php
                include_once('../../data/reservas.php');
                $obj = new reservas();
                $dataset = $obj->getReservasConAdeudo($_SESSION['id']);
                if ($dataset != 'wrong') {
                    while ($rs = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $rs['Cliente'] . "</td>";
                        echo "<td>" . $rs['NumReserva'] . "</td>";
                        echo "<td>" . $rs['Fecha'] . "</td>";
                        echo "<td>" . $rs['MontoTotal'] . "</td>";
                        echo "<td>" . $rs['saldoRestante'] . "</td>";
                        echo '<td><a href="idxAbonos.php?folio='.$rs['NumReserva'].'"><img src="../../img/icons/cash.svg" style="padding-bottom:1px" ></a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "No hay datos que consultar";
                }
                ?>
            </table>
        </div>
    </div>   
   
     
 <?php
 include('templates/pie.php');
 ?>