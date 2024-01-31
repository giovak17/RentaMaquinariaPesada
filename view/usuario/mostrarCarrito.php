<?php
include('../../data/config.php');
include('carrito.php');
include('templates/cabecera.php');





// Verificar si hay datos en la sesión y utilizarlos
$fechaInicio = isset($_SESSION['fechaInicio']) ? $_SESSION['fechaInicio'] : '';
$fechaFinal = isset($_SESSION['fechaFinal']) ? $_SESSION['fechaFinal'] : '';
?>
 
<br>
<div class="container-sm">
    <br>
    <h3>Lista del carrito</h3>
    <?php if (!empty($_SESSION['carrito'])) { ?>

        <table class="table table-light table-bordered">
            <tbody>
                <tr>
                    <th width="40%">Descripcion</th>
                    <!--<th width="15%" class="text-center">Cantidad Dias</th>-->
                    <th width="20%" class="text-center">Precio por Dia</th>
                    <!--<th width="20%" class="text-center">Total</th>-->
                    <th width="5%"></th>
                </tr>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['carrito'] as $indice => $producto) { ?>
                    <tr>
                        <td width="40%"><?php echo $producto['nombre'] ?></td>
                        <!--<td id="resultado">La diferencia aparecerá aquí.</td>-->
                        <!--<td width="15%" class="text-center"><?php echo $producto['cantidad'] ?></td>-->
                        <td width="20%" class="text-center"><?php echo $producto['precio'] ?></td>
                        <!--<td width="20%" class="text-center"><?php echo number_format($producto['precio'] * $producto['cantidad'], 2) ?></td>-->
                        <td width="5%">
                            <form action="" method="post"><input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>"><button class="btn btn-primary" type="submit" name="btnAccion" value="eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total = $total + ($producto['precio'] * $producto['cantidad']); ?>
                <?php } ?>
                <!--<tr>
                    <td colspan="3" align="right"><h3>Total</h3></td>
                    <td align="right"><h3>$<?php echo number_format($total, 2) ?></h3></td>
                    <td></td>
                </tr>-->

                <tr>
                    <td colspan="10">

                        <form action="../../app/almacenarFechas.php" method="post"  enctype="multipart/form-data">
                            <div class="alert alert-success">
                                <div class="form-group">
                                    <?php
                                        $fechaActual = new DateTime();
                                        $fechaActual->modify('+2 days');
                                        $fechaMin = $fechaActual->format('Y-m-d');
                                    ?>
                                    
                                    <label for="txtFechaInicio">Fecha de Inicio:</label>
                                    <input id="txtFechaInicio" name="txtFechaInicio" class="form-control" type="date" min="<?php echo $fechaMin; ?>" required value="<?php echo $fechaInicio; ?>">
                                </div>
                            
                                <div class="form-group">
                                    <?php
                                        $fechaAct = new DateTime();
                                        $fechaAct->modify('+2 days');
                                        $fechaAct->modify('+6 months');
                                        $fechaMAX= $fechaAct->format('Y-m-d');
                                    ?>
                                    <label for="txtFechaFinal">Fecha Final:</label>
                                    <input id="txtFechaFinal" name="txtFechaFinal" class="form-control" type="date" max="<?php echo $fechaMAX; ?>" required value="<?php echo $fechaFinal; ?>">
                                </div>
                                <br>
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="insertar">Continuar >></button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    
<?php } else { ?>
    <div class="alert alert-success">
        No hay nada en el carrito...
    </div>
<?php } ?>
    </div>
<?php
include('templates/pie.php');
?>