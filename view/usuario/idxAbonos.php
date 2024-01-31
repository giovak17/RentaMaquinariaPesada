<?php
include('../../data/config.php');
//include('global/conexion.php');
include('carrito.php');
include('templates/cabecera.php');
?>
       
    
<div class="container-fluid"> 
    <h1>Pagos Pendientes</h1>   
    <div class="container">
     
        <div class="table table-dark table-striped-columns">
            <table class="table">
                <tr class="table-dark">
                    <td>Fecha de Pago</td>
                    <td>Cantidad Abonada</td>
                    <td>Saldo Restante</td>
                </tr>

                <?php
                include_once('../../data/pagos.php');
                $obj = new pagos();
                //$nick ='annita56';
                $dataset = $obj->getPagos($_GET['folio'],$_SESSION['id']);
                
                if ($dataset != 'wrong' && mysqli_num_rows($dataset) > 0) {
                    while ($rs = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $rs['FechaPago'] . "</td>";
                        echo "<td>" . $rs['cantPago'] . "</td>";
                        echo "<td>" . $rs['saldoRestante'] . "</td>";
                        
                        echo "</td></tr>";
                        echo "</tr>";

                        //echo $rs['pagoMAX'];
                    }
                } else {
                    echo "<tr><td colspan='3'align='center'>Sin Pagos realizados aun</td></tr>";
                }
                ?>
                <tr><td colspan='3'align='center'>
                        <form action="pagar.php?cod=<?php echo $_GET['folio']; ?>" method="post">
                            <div class="alert alert-success">
                                <div class="form-group">
                                    <label for="abono">Abonar:</label>
                                    <input id="abono" name="abono" class="form-control" type="number" step="0.01" placeholder="Ingresa la cantidad a abonar" max="<?php 
                                                                                                                                                                    include_once('../../data/pagos.php');
                                                                                                                                                                    $obj = new pagos();
                                                                                                                                                                    //$nick ='annita56';
                                                                                                                                                                    $dataset = $obj->getPagoMAX($_GET['folio'],$_SESSION['id']);
                                                                                                                                                                    
                                                                                                                                                                    if ($dataset != 'wrong' && mysqli_num_rows($dataset) > 0) {
                                                                                                                                                                        while ($rs = mysqli_fetch_assoc($dataset)) {
                                                                                                                                                                            if ($rs['pagoMAX'] === NULL) {
                                                                                                                                                                                echo $rs['totalMAX'];
                                                                                                                                                                            } else {
                                                                                                                                                                                echo $rs['pagoMAX'];
                                                                                                                                                                            }
                                                                                                                                                                        }
                                                                                                                                                                    }
                                                                                                                                                                
                                                                                                                                                                ?>" min="1"required>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">Proceder a pagar >></button>
                        </form>
                        
            </table>
        </div>
    </div>
</div>