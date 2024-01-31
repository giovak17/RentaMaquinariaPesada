<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <script defer src="popModal.js"></script>
</head>
<body>
    
<header>
<h1 class="letraHeader"><font face=”Cambria” size=5>Administrador</font></h1>
        <nav id="aveces">
            <ul>
            <li><a href="#">Dashboard</a>
                    <ul style="--cantidad-items: 2">
                        <li><a href="estadisticas.php"><font face=”Cambria” size=4>Estadisticas</font></a></li>
                        <li><a href="maquinasAlmacenadas.php"><font face=”Cambria” size=4>MaquinasPorAlmacen</font></a></li>
                    </ul>
                </li>
                <li><a href="#"><font face=”Cambria” size=4>Maquinaria</font></a>
                    <ul style="--cantidad-items: 6.5">
                       
                        <li><a href="categoria.php"><font face=”Cambria” size=4>Categorias</font></a></li>
                        <li><a href="dispo.php"><font face=”Cambria” size=4 >Disponibilidad</font></a></li>
                        <li><a href="mantenimiento.php"><font face=”Cambria” size=4>Mantenimiento</font></a></li>
                        <li><a href="agregarm.php"><font face=”Cambria” size=4>Agregar maquina</font></a></li>
                        <li><a href="agregarmarca.php"><font face=”Cambria” size=4>Agregar marca</font></a></li>
                        <li><a href="agregarmodelo.php"><font face=”Cambria” size=4>Agregar modelo</font></a></li>
                    </ul>
                </li>
                <li id="reservas"><a href="#">Reservas</a>
                    <ul style="--cantidad-items: 8">
                        <li><a href="confirmacion.php">Confirmacion de reservas</a></li>
                        <li><a href="maquinasReservadas.php">Maquinas reservadas</a></li>
                        <li><a href="reservasRep.php">Reservas de representantes</a></li>
                        <li><a href="informacionRe.php">Informacion de reservas por cliente</a></li>
                        <li><a href="pagosRe.php">Pagos por reservas</a></li>
                        <li><a href="estatusRe.php">Estatus de reservas</a></li>
                    </ul>
                </li>
                <li><a href="#"><font face=”Cambria” size=4>Choferes</font></a>
                    <ul style="--cantidad-items: 2.5">
                        <li><a href="agregarch.php"><font face=”Cambria” size=4>Agregar Choferes</font></a></li>
                        <li><a href="entrega.php"><font face=”Cambria” size=4>Entregas de maquinaria</font></a></li>
                    </ul>
                    <li><a href="verRepresentantes.php"><font face=”Cambria” size=4>Representantes</font></a>
                    <li><a href="../../app/login.php"><font face=”Cambria” size=4>Cerrar Sesion</font></a>
            </ul>
        </nav>
    </header>
    <main>
        <h1><font face=”Cambria” size=4>Agregar almacen</font></h1> 
        <section>
 
        <form method="post" action="../../app/addAlmacenes.php" enctype="multipart/form-data">
        <br>
    <label>Codigo</label> <input type="text" name="txtCodigo" required>
    <br>
    <label>Nombre</label> <input type="text" name="txtNombre" required>
    <br>
    <label>Número de Teléfono</label> <input type="text" name="txtNumTel" required>
    <br>
    <label>Colonia</label> <input type="text" name="txtColonia" required>
    <br>
    <label>Número</label> <input type="number" name="Num" required>
    <br>
    <label>Calle</label> <input type="text" name="txtCalle" required>
    <br>
    <label>Ciudad</label>
    <select name="txtCiudad" class="listDeploy" required>
        <option value="" selected disabled>-- Seleccione una ciudad</option>
        <?php
        include('../../data/ciudades.php');
        $miCiudades = new ciudades();
        $dataSet = $miCiudades->getAllCiudades();

        if ($dataSet != 'wrong') {
            while ($rs = mysqli_fetch_assoc($dataSet)) {
                echo $rs['codigo'];
                echo 'hola';
        ?>
     <option value="<?php echo $rs['codigo']; ?>"><?php echo $rs['nombre']; ?></option>
           
        <?php
            }
        } else {
            echo "Error al recuperar datos";
        }
        ?>
    </select>
    <br><br>
    <button type="submit">Enviar</button><button type="reset">Reset</button>
</form>

    </main>
    <div>
        
    </div>
    
</body>
</html>

