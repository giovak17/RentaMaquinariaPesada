<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>prueba</title>
</head>
<body>
<form method = "post" action="../../app/addMaquinas.php" enctype="multipart/form-data">
                    <!--<label>Codigo</label> <input type="text" name="txtCodigo"> Por si se ocupa-->
                    <br>
                    <label>NumSerie</label> <input type="text" name="txtNumSerie" required>
                    <br>
                    <label>Almacenes</label>
                    <select name="txtAlmacen" class="listDeploy" required>
                        <option value="" selected disabled>-- Seleccione un almacen</option>
                        <?php
                            include('../../data/almacenes.php');
                            $miAlmacen = new almacenes();
                            $dataSet = $miAlmacen->getAllAlmacenes();

                            if ($dataSet != 'wrong') {
                                while ($rs = mysqli_fetch_assoc($dataSet)) {
                                    //$numModelo = $rs['almacen'];
                            ?>
                            
                                <option value="<?php echo $rs['codigo']; ?>"><?php echo $rs['nombre']; ?></option>
                           
                            <?php
                                }
                            } else {
                                echo "error datos";
                            }
                        ?>
                    </select>
                    <br>
                    <label>Modelo</label>
                    <select name="txtModelo" class="listDeploy" required>
                        <option value="" selected disabled>-- Seleccione un Modelo</option>
                        <?php
                            include('../../data/modelos.php');  
                            $miModelo = new modelos();
                            $dataSet = $miModelo->getAllModelos();

                            if ($dataSet != 'wrong') {
                                while ($rs = mysqli_fetch_assoc($dataSet)) {
                                    //$numModelo = $rs['numModelo'];
                            ?>
                                <option value="<?php echo $rs['numModelo']; ?>"><?php echo $rs['nombreModelo']; ?></option>
                            <?php
                                }
                            } else {
                                echo "Error al recuperar datos";
                            }
                        ?>
                    </select>
                   <br><br>
                    <button type="submit" >Enviar</button><button type = "reset">reset</button>
                    <!-- class="btnClose" se usaba para cerrar el modal dialog-->
                </form>
       
</body>
</html>
