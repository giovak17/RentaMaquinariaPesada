<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>prueba</title>
</head>
<body>
   
    <?php
        include_once('../data/maquinas.php');
        $miMaquina = new maquinas();
        $id = 1;//editar despues
        $dataSet = $miMaquina->getAutoSetform($id);

        if ($dataSet != 'wrong') {
            $rs = mysqli_fetch_array($dataSet);
            echo'
            <form method = "post" action="../app/updateMaquinas.php" enctype="multipart/form-data">
            <label>Codigo Maquina</label> <input type="text" value="'.$rs['mqCodigo'].'" name="txtmqCodigo"><br>
            <label>NumSerie</label> <input type="text" value="'.$rs['mqNumSerie'].'" name="txtmqNumSerie"><br>
    <label>Almacen</label>
    <select name="txtalmCodigo" class="listDeploy" required>
        <option value="'.$rs['almCodigo'].'" selected>'.$rs['almNombre'].'</option>';
        }

    ?>
    <?php
         include('almacenes.php');
         $miAlmacen = new almacenes();
         $dataSet = $miAlmacen->getAllAlmacenes();

         if ($dataSet != 'wrong') {
             while ($rs = mysqli_fetch_assoc($dataSet)) {
                 //$numModelo = $rs['almacen'];
             echo $rs['codigo'];
         ?>
            <option value="<?php echo $rs['codigo']; ?>"><?php echo $rs['nombre']; ?></option>
         <?php
              echo 'fuck';
             }
         } else {
             echo "error datos";
         }
    ?>
    <?php  
        include_once('../data/maquinas.php');
        $miMaquina = new maquinas();
        $id = 1;//editar despues
        $dataSet = $miMaquina->getAutoSetform($id);

        if ($dataSet != 'wrong') {
            $rs = mysqli_fetch_array($dataSet); 
        echo'    
        </select>
        <br>
        <label>Modelo</label>
        <select name="txtmdNumModelo" class="listDeploy" required>
            <option value="'.$rs['mdNumModelo'].'" selected>'.$rs['mdNombreModelo'].'</option>  <!--agregar otro-->';
        }
        ?>
        <?php
             include_once('modelos.php');  
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
        

        <?php
            include_once('almacenes.php');
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
                                echo $rs['codigo'];
                            ?>
                               <option value="<?php echo $rs['codigo']; ?>"><?php echo $rs['nombre']; ?></option>
                            <?php
                                 echo 'fuck';
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
                    <button type="submit" >Enviar </button>
                    <button type = "reset">reset </button>
                    <!-- class="btnClose" se usaba para cerrar el modal dialog-->
                </form>
            <!--<button class="btnOpen">Open</button>--> 

            <?php
        include('ciudades.php');
        $miCiudades = new ciudades();
        $dataSet = $miCiudades->getAllCiudades();

        if ($dataSet != 'wrong') {
            while ($rs = mysqli_fetch_assoc($dataSet)) {
                echo $rs['codigo'];
                echo 'hola';
        
            }
        } else {
            echo "Error al recuperar datos";
        }
        ?>

        
    
   
</body>
</html>
