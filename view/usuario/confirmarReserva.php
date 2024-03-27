<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('../../data/config.php');
include('carrito.php');
include('templates/cabecera.php');
?>
<?php
    session_start();

    $FechaInicioObj = new DateTime($_SESSION['fechaInicio']);
    $fechaFinalObj = new DateTime($_SESSION['fechaFinal']);

    $diferencia = $FechaInicioObj->diff($fechaFinalObj);
    $numDias = $diferencia->days; //dias
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
                    <th width="15%" class="text-center">Cantidad Dias</th>
                    <th width="20%" class="text-center">Precio por Dia</th>
                    <th width="20%" class="text-center">Total</th>
                    <th width="5%"></th>
                </tr>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['carrito'] as $indice => $producto) { ?>
                    <tr>
                        <td width="40%"><?php echo $producto['nombre'] ?></td>
                        <td id="resultado"><?php echo $numDias?></td>
                        <!--<td width="15%" class="text-center"><?php echo $producto['cantidad'] ?></td>-->
                        <td width="20%" class="text-center"><?php echo $producto['precio'] ?></td>
                        <td width="20%" class="text-center"><?php echo number_format($producto['precio'] * $numDias, 2) ?></td>
                        <td width="5%">
                            <form action="" method="post"><input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>"><button class="btn btn-primary" type="submit" name="btnAccion" value="eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total = $total + ($producto['precio'] * $numDias); ?>
                <?php } ?>
                <tr>
                    <td colspan="3" align="right"><h3>Total</h3></td>
                    <td align="right"><h3>$<?php echo number_format($total, 2) ?></h3></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="10">
                        <h4>Informacion entrega</h4>
                        <form action="../../app/addReserva.php" method="post"  enctype="multipart/form-data">
                            <div class="alert alert-success">
                                <input type="hidden" name="FechaSolicitud" value="<?php echo $fecha_actual = date('Y-m-d'); ?>">
                                <input type="hidden" name="FechaInicio" value="<?php echo  $_SESSION['fechaInicio']; ?>">
                                <input type="hidden" name="FechaFinal" value="<?php echo $_SESSION["fechaFinal"]; ?>">
                                <input type="hidden" id="cliente" name="idCl"  placeholder="Numero del cliente" required value="<?php echo $clCod;?>">
                                <input type="hidden" name="cantDias" value="<?php echo $numDias; ?>">
                             
                               
                                <h4>Receptor</h4>
                                <div class="form-group">
                                    <label for="descripcion">Nombre:</label>
                                    <input id="descripcion" name="txtNombre" class="form-control soloLetra" type="text" placeholder="Escribe una descripción" required pattern="[a-zA-Z\s]+">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Apellido Paterno:</label>
                                    <input id="descripcion" name="txtApPa" class="form-control soloLetra" type="text" placeholder="Escribe una descripción" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Apellido Mataterno:</label>
                                    <input id="descripcion" name="txtApMa" class="form-control soloLetra" type="text" placeholder="Escribe una descripción" required>
                                </div>
                                 <div class="form-group">
                                    <label for="descripcion">Numero Telefono:</label>
                                    <input id="descripcion" name="txtTelefono" class="form-control numTel" type="text" max = 10 placeholder="Escribe una descripción" required>
                                </div>
                                 <h4>Direccion</h4>
                                <div class="form-group">
                                    <label for="descripcion">Colonia:</label>
                                    <input id="descripcion" name="txtColonia" class="form-control" type="text" placeholder="Escribe una descripción" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Calle:</label>
                                    <input id="descripcion" name="txtCalle" class="form-control" type="text" placeholder="Escribe una descripción" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Numero:</label>
                                    <input id="descripcion" name="txtNum" class="form-control " type="text" placeholder="Escribe una descripción" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Codigo Postal:</label>
                                    <input id="descripcion" name="txtCP" class="form-control soloNum soloCP" type="text" placeholder="Escribe una descripción" required>
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripción de la reserva:</label>
                                    <input id="descripcion" name="txtDes" class="form-control" type="text" placeholder="Escribe una descripción" required>
                                </div>
                                
                                <br>
                                <!--<p><?php echo $clCod;?></p>-->
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="insertar" >Confirmar Reserva</button>
                            </div>
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


<script>
    var soloLetrasInputs  = document.querySelectorAll('.soloLetra');
    
    soloLetrasInputs .forEach(function(input) {
            input.addEventListener('input', function () {
                this.value = this.value.replace(/[^A-Za-z\s]/g, ''); // Solo permite letras y espacios
            });
        });

        var phoneInputs = document.querySelectorAll('.numTel');

        phoneInputs.forEach(function(input) {
            input.addEventListener('input', function (e) {
                var formattedNumber = e.target.value.replace(/\D/g, '').slice(0, 10);
                var formattedOutput = formattedNumber.replace(/(\d{0,3})(\d{0,3})(\d{0,4})/, function(match, p1, p2, p3) {
                    if (!p2) {
                        return p1;
                    }
                    var areaCode = '(' + p1 + ')';
                    var prefix = p2;
                    var suffix = p3 ? '-' + p3 : '';
                    return areaCode + ' ' + prefix + suffix;
                });
                e.target.value = formattedOutput;
            });
        });

    // Obtener todos los elementos con la clase 'soloNum'
    var numberInputs = document.querySelectorAll('.soloNum');

    // Iterar sobre cada elemento
    numberInputs.forEach(function(input) {
        input.addEventListener('input', function (e) {
            var formattedNumber = e.target.value.replace(/\D/g, '');

            // Asignar el valor formateado al campo de entrada
            e.target.value = formattedNumber;
        });
    });

    // Obtener todos los elementos con la clase 'soloCP'
    var cpInputs = document.querySelectorAll('.soloCP');

    cpInputs.forEach(function(input) {
        input.addEventListener('input', function (e) {
            var formattedNumber = e.target.value.replace(/\D/g, '').slice(0, 5);

            // Asignar el valor formateado al campo de entrada
            e.target.value = formattedNumber;
        });
    });

</script>